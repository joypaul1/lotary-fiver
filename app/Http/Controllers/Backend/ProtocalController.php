<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Protocol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use NabilAnam\SimpleUpload\SimpleUpload;

class ProtocalController extends Controller
{
    // private $dir = 'backend.protocal';
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
        Protocol::create($data);
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
        $data = $protocol->whereId($id)->first();
        return view('backend.protocalSection.edit', ['data' =>$data]);
    }
    public function update(Request $request, Protocol $protocol,$id )
    {

        $data = $request->except('_token', '_method');
        if ($request->filled('logo')) {
            $data['logo']  = $this->imageUpload($request->file('logo'),'50' ,'50');
        }
        if ($request->filled('image')) {
            $data['image'] = $this->imageUpload($request->file('image'),'120' ,'135');
        }
        $protocol->whereId($id)->update($data);


        return redirect()->route('backend.protocalSection.index')->with('message', 'Data Updated Successfully.');
    }
    public function destroy (Protocol $protocol, $id)
    {
        $data = $protocol->whereId($id)->first();
        Storage::disk('simpleupload')->delete($data->logo);
        Storage::disk('simpleupload')->delete($data->image);
        $data->delete();
        return redirect()->route('backend.protocalSection.index')->with('message', 'Data Delated Successfully.');
    }
}
