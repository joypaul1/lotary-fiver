<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(Request $request)
    {

        return view('backend.social.index', ['social' =>Social::first() ]);
    }

    public function store(Request $request)
    {
        Social::first()->update($request->all());
        return back()->with('message', 'Data Created Successfully.');
    }
}
