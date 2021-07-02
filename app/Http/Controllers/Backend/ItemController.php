<?php /** @noinspection ALL */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Items\StoreRequest;
use App\Http\Requests\Items\UpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Item;
use App\Models\Origin;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use NabilAnam\SimpleUpload\SimpleUpload;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with('origin', 'brand', 'category');

        if ($request->name) {
            $query->where('name', $request->name);
        }

        if ($request->origin) {
            $query->where('origin_id', $request->origin);
        }

        if ($request->brand) {
            $query->where('brand_id', $request->brand);
        }

        if ($request->category) {
            $category_id = null;
            $subcategory_id = null;

            $catSub = explode('-', $request->category);
            if (count($catSub) === 2) {
                $query->where('category_id', $catSub[0])
                    ->where('subcategory_id', $catSub[1]);
            } else {
                $query->where('category_id', $catSub[0]);
            }
        }

        $items = $query->latest()->paginate(5);
        $origins = Origin::get(['id', 'name']);
        $brands = Brand::get(['id', 'name']);
        $categories = Category::with('sub_categories')->get(['id', 'title']);

        return view('backend.items.index', compact('items', 'origins', 'brands', 'categories'));
    }

    public function create()
    {
        $categories = Category::with('sub_categories')->get();
        $units = Unit::all();
        $origins = Origin::all();
        $brands = Brand::all();

        return view('backend.items.create', compact('categories', 'origins', 'brands', 'units'));
    }

    public function store(StoreRequest $request)
    {
        $upload = (new SimpleUpload)->dirName('items');
        $all = $request->all();

        $all['current_stock'] = $request->opening_balance;
        $all['feature_image'] = $upload->file($request->feature_image)->save();

        $catSub = explode('-', $request->category_id);
        if (count($catSub) === 2) {
            $all['category_id'] = $catSub[0];
            $all['subcategory_id'] = $catSub[1];
        }

        $images = $all['images'] ?? [];
        unset($all['images']);
        $item = Item::create($all);
        foreach ($images as $image) {
            $item->images()->create([
                'path' => $upload->file($image)->save()
            ]);
        }

        return redirect()
            ->route('backend.product.items.index')
            ->with('message', 'Item Added Successfully!');
    }

    public function edit($id)
    {
        $categories = Category::with('sub_categories')->get();
        $units = Unit::all();
        $origins = Origin::all();
        $brands = Brand::all();
        $item = Item::with('category', 'subcategory', 'unit', 'origin', 'brand', 'images')
            ->where('id', $id)
            ->first();

        return view('backend.items.edit', compact('categories', 'units', 'origins', 'brands', 'item'));
    }

    public function update(UpdateRequest $request, Item $item)
    {
        $upload = (new SimpleUpload)->dirName('items');
        $all = $request->all();

        $all['current_stock'] = $request->opening_balance;
        if ($request->feature_image) {
            $all['feature_image'] = $upload->file($request->feature_image)
                ->deleteIfExists($item->feature_image)
                ->save();
        }

        $catSub = explode('-', $request->category_id);
        if (count($catSub) === 2) {
            $all['category_id'] = $catSub[0];
            $all['subcategory_id'] = $catSub[1];
        }

        $images = $all['images'] ?? [];
        unset($all['images']);
        foreach ($images as $image) {
            $item->images()->create([
                'path' => $upload->file($image)->save()
            ]);
        }
        $item->update($all);

        return redirect()
            ->route('backend.product.items.index')
            ->with('message', 'Item updated successfully!');
    }

    public function destroy($id)
    {
        try {
            $item = Item::with('images')->where('id', $id)->first();

            Image::whereIn('id', $item->images->pluck('id'))->delete();

            $item->delete();
        } catch (\Exception $e) {
            return redirect()
                ->route('backend.product.items.index')
                ->with('error', 'Item is referenced in another place!');
        }

        return redirect()
            ->route('backend.product.items.index')
            ->with('message', 'Item Deleted Successfully!');
    }

    public function updateFeatureImage(Request $request, Item $item)
    {
        $item->update([
            'feature_image' => (new SimpleUpload)
                ->file($request->feature_image)
                ->dirName('items')
                ->deleteIfExists($item->feature_image)
                ->save()
        ]);

        return back()->with('message', 'Feature image updated successfully');
    }

    public function updateOtherImage(Request $request, $item_id, $image_id)
    {
        $image = Image::where('imageable_id', $item_id)->where('id', $image_id)->first();

        $image->update([
            'path' => (new SimpleUpload)
                ->file($request->image)
                ->dirName('items')
                ->deleteIfExists($image->path)
                ->save()
        ]);

        return back()->with('message', 'Item image updated successfully');
    }

    public function deleteFeatureImage(Item $item)
    {
        Storage::disk('simpleupload')->delete($item->feature_image);
        $item->feature_image = null;
        $item->save();

        return back()->with('message', 'Feature image deleted successfully!');
    }

    public function deleteOtherImage($item_id, $image_id)
    {
        Image::where('imageable_id', $item_id)->where('id', $image_id)->delete();

        return back()->with('message', 'Item image deleted successfully!');
    }
}
