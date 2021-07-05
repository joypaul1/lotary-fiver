<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Lottery;
use App\Models\Name;
use Illuminate\Http\Request;

class LotteryController extends Controller
{


    // public function name()
    // {
    //     $name = Name::whereId(2)->first();

    //     return view('backend.protocalSection.name', ['name' =>$name]);
    // }

    // public function nameStore(Request $request)
    // {

    //     Name::firstorCreate(['id'=>2], ['name' => $request->name]);
    //     return back()->with('message', 'Data Created Successfully.');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Lottery::paginate(10);
        return view('backend.lottarySection.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.lottarySection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Lottery::create($data);
        return back()->with('message', 'Data Created successfully!');

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
        $data       = Lottery::whereId($id)->first();
        return view('backend.lottarySection.edit',compact('data'));
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
        $lottery = Lottery::whereId($id)->first();
        $data    = $request->except('-token');
        $lottery->update($data);
        return back()->with('message', 'Data Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Lottery::find($id);
        $page->delete();
       return back()->with('error', 'Data deleted Successfully!.');
    }


}
