<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Market;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\Market\StoreRequest;
use App\Http\Requests\Market\UpdateRequest;
use App\Models\Name;
use NabilAnam\SimpleUpload\SimpleUpload;

class MarketController extends Controller
{

    public function name()
    {
        $name = Name::whereId(3)->first();
        return view('backend.marktetSection.name', ['name' =>$name]);
    }

    public function nameStore(Request $request)
    {
        Name::updateOrCreate(['id'=>3], ['name' => $request->name, 'id' => 3]);
        return back()->with('message', 'Data Created Successfully.');
    }
    public function index()
    {
        $datas = Market::paginate(10);

        return view('backend.marktetSection.index',compact('datas'));
    }

    public function create(Request $request)
    {

        return view('backend.marktetSection.create');
    }

    public function store(StoreRequest $request)
    {
        $data           = $request->all();
        $data['image']  = (new SimpleUpload)
                            ->file($request->image)
                            ->dirName('market')
                            // ->resizeImage(420, 420)
                            ->save();

        Market::create($data);

        return back()->with('message', 'Data Created successfully!');

    }

    public function edit($id)
    {
        return view('backend.marktetSection.edit', ['data' => Market::whereId($id)->first()]);
    }

    public function update(UpdateRequest $request, $id)
    {
        // dd($id);
        $data           = $request->except('_token');

        if ($request->image) {
            $data['image']  = (new SimpleUpload)
                                ->file($request->image)
                                ->dirName('market')
                                // ->resizeImage(420, 420)
                                ->save();
        }

        Market::whereId($id)->update($data);

        return back()->with('message', 'Data Updated successfully!');
    }

    public function destroy($id)
    {
        $page = Market::find($id);
        $page->delete();
       return back()->with('error', 'Data deleted Successfully!.');
    }
}
