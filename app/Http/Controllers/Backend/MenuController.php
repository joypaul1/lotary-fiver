<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menus;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\False_;

class MenuController extends Controller
{
    public function index()
    {
        $datas = Menus::paginate(10);

        return view('backend.menuSection.index',compact('datas'));
    }

    public function create(Request $request)
    {
        return view('backend.menuSection.create');
    }

    public function store(Request $request)
    {
        $data                           = $request->all();
        $data['is_token_menu']          = $request->is_token_menu == 'on'?True: False;
        $data['mobile_menu']            = $request->mobile_menu == 'on'?True: False;
        $data['header_mobile_menu']     = $request->header_mobile_menu == 'on'?True: False;
        $data['header_menu']            = $request->header_menu == 'on'?True: False;
        Menus::create($data);
        return back()->with('message', 'Data Created successfully!');

    }

    public function edit($id)
    {
        return view('backend.menuSection.edit', ['data' => Menus::whereId($id)->first()]);
    }

    public function update(Request $request, $id)
    {
        $data                           = $request->except('_token');
        $data['is_token_menu']          = $request->is_token_menu == 'on'?True: False;
        $data['mobile_menu']            = $request->mobile_menu == 'on'?True: False;
        $data['header_mobile_menu']     = $request->header_mobile_menu == 'on'?True: False;
        $data['header_menu']            = $request->header_menu == 'on'?True: False;
        Menus::whereId($id)->update($data);

        return back()->with('message', 'Data Updated successfully!');
    }

    public function destroy($id)
    {
        $page = Menus::find($id);
        $page->delete();
       return back()->with('error', 'Data deleted Successfully!.');
    }
}
