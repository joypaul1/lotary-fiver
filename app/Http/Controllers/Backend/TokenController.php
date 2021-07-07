<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Name;
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.tokenSection.edit',['data' =>TokenLeft::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token' , '_method');
        TokenLeft::whereId($id)->update($data);
        return back()->with('message', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TokenLeft::whereId($id)->delete();
        return back()->with('message', 'Data deleted successfully.');
    }

    public function rightIndex (){
        return view('backend.tokenSection.right', ['data' => TokenRight::first() ]);
    }
    public function rightStore(Request $request)
    {
        TokenRight::updateorcreate(['id'=>1], ['footer_text'=>$request->footer_text, 'description'=> $request->description]);
        return back()->with('message', 'Data Updated Successfully.');
    }
}
