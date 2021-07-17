<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index(Request $request)
    {
        $footer = Footer::first();
        return view('backend.footer.create', compact('footer'));
    }


    public function store(Request $request)
    {
        if ($request->description) {

            Footer::find(1)->update(['description' => $request->description]);
        }
        return back()->with('message', 'Data updated successfully.');
    }
}
