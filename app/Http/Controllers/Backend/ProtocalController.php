<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Name;
use App\Models\PCDescription;
use App\Models\Protocol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use NabilAnam\SimpleUpload\SimpleUpload;

class ProtocalController extends Controller
{
    // private $dir = 'backend.protocal';

    public function name()
    {
        $name = Name::whereId(1)->first();

        return view('backend.protocalSection.name', ['name' =>$name]);
    }

    public function nameStore(Request $request)
    {

        Name::updateOrCreate(['id'=>1], ['name' => $request->name, 'id'=>1]);
        return back()->with('message', 'Data Created Successfully.');
    }

    public function index()
    {
        $protocols = Protocol::select('id', 'title', 'logo','image', 'highlight')->paginate(15);

        return view('backend.protocalSection.index', ['protocols' =>$protocols]);
    }
    public function create()
    {
        return view('backend.protocalSection.create', );
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $data['logo']  = $this->imageUpload($request->file('logo'),'50' ,'50');
        $data['image'] = $this->imageUpload($request->file('image'),'120' ,'135');

        $protocol = Protocol::create([
            'highlight' => $request->highlight,
            'title' => $request->title,
            'logo' => $data['logo'],
            'image' => $data['image'],
        ]);
        foreach ($request->description as $key => $des) {
            $protocol->descriptions()->create(['description' =>$des, 'style' => $request->style[$key] ]);
        }
        return back()->with('message', 'Data Created Successfully.');
    }

    public function imageUpload($requestImage,$width,$height, $image =null)
    {

        $image = (new SimpleUpload)
                ->file($requestImage)
                ->dirName('image')
                ->deleteIfExists($image)
                ->resizeImage($width, $height)
                ->save();
        return $image;
    }

    public function edit(Protocol $protocol,$id )
    {
        $data = $protocol->whereId($id)->With('descriptions')->first();
        return view('backend.protocalSection.edit', ['data' =>$data]);
    }
    public function update(Request $request,$id )
    {
        $deletableData  = null;
        $protocol       = Protocol::find($id);
        $data           = $request->except('_token', '_method');
        // dd($data);
        if ($request->logo) {
            $data['logo']  = (new SimpleUpload)->file($request->logo)
                                ->dirName('logo')
                                ->deleteIfExists($protocol->logo)
                                ->resizeImage(50,50)
                                ->save();
        }
        if ($request->image) {
            $data['image'] = (new SimpleUpload)
                        ->file($request->image)
                        ->dirName('image')
                        ->deleteIfExists($protocol->image)
                        ->resizeImage(120,135)
                        ->save();
        }
      try {
        if ($request->description) {
            $existId      = array_keys($data['description']);
            // $existId      = array_keys($data['style']);
            $existValue   = array_values($data['description']);
            $styleValue   = array_values($data['style']);
            // dd($styleValue);
            foreach ($existId as $key => $data) {
                $v = PCDescription::where('id', $existId[$key])->first();
                $v->update(['description' =>$existValue[$key], 'style' =>$styleValue[$key] ]);
            }
            $deletableData = PCDescription::where('protocol_id', $protocol->id)->whereNotIn('id',$existId)->get();
            if ($deletableData) {
                foreach ($deletableData as $key => $delete) {
                    $delete->delete();
                }
            }
        }

        if ($request->new_description) {
            foreach ($request->new_description as $key => $des) {
                $protocol->descriptions()->create(['description' =>$des,'style' => $request->new_style[$key] ]);
            }
        }

        $protocol->update([
            'highlight' => $request->highlight,
            'title'     => $request->title,
        ]);


    } catch (\Exception $ex) {
        dd($ex->getMessage());
    }
        return redirect()->route('backend.protocalSection.index')->with('message', 'Data Updated Successfully.');
    }
    public function destroy (Protocol $protocol, $id)
    {
        $deletableData =  PCDescription::where('protocol_id',  $id)->get();
        foreach ($deletableData as $key => $data) {
            $data->delete();
        }
        Protocol::where('id', $id)->delete();
        return redirect()->route('backend.protocalSection.index')->with('message', 'Data Delated Successfully.');
    }
}
