<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Name;
use App\Models\TokenFooter;
use App\Models\TokenLeft;
use App\Models\TokenRight;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Parser\Token;

class TokenController extends Controller
{


    public function name()
    {
        $name = Name::whereId(2)->first();
        return view('backend.tokenSection.name', ['name' =>$name]);
    }

    public function nameStore(Request $request)
    {
        $name = Name::whereId(2)->first();
        if($name){
            $name =$name->update(['name'=>$request->name]);
        }else{
            Name::create(['id'=>2, 'name'=> $request->name]);
        }

        return back()->with('message', 'Data Created Successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = TokenLeft::paginate(10);
        return view('backend.tokenSection.index',['datas' =>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tokenSection.create');
        // dd(33);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        TokenLeft::create($request->all());
        return back()->with('message', 'Data added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('backend.tokenSection.edit',['data' =>TokenLeft::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token' , '_method');
        TokenLeft::whereId($id)->update($data);
        return back()->with('message', 'Data updated successfully.');
    }


    public function destroy($id)
    {
        TokenLeft::whereId($id)->delete();
        return back()->with('message', 'Data deleted successfully.');
    }




    public function rightIndex (){

        return view('backend.tokenSection.right', ['datas' => TokenRight::paginate(10) ]);
    }
    public function rightCreate  (){

        return view('backend.tokenSection.rightCreate');
    }
    public function rightStore(Request $request)
    {
        TokenRight::create($request->all());
        return back()->with('message', 'Data Updated Successfully.');
    }

    public function rightEdit($id)
    {
        return view('backend.tokenSection.editRight',['data' =>TokenRight::find($id)]);
    }

    public function rightUpdate(Request $request, $id)
    {
        $data = $request->except('_token' , '_method');
        TokenRight::whereId($id)->update($data);
        return back()->with('message', 'Data updated successfully.');
    }


    public function rightDestroy($id)
    {
        TokenRight::whereId($id)->delete();
        return back()->with('message', 'Data deleted successfully.');
    }

    public function footerText(Request $request)
    {
        if ($request->description) {
            TokenFooter::updateOrCreate(['id'=>1], ['description' => $request->description]);
        }
        return view('backend.tokenSection.footerText', ['data' => TokenFooter::first()]);
    }

    // public function FunctionName(Type $var = null)
    // {
    //     # code...
    // }
}
