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

        Social::updateOrCreate(
            ['id' => 1],
            [
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'telegram' => $request->telegram,
                'reddit' => $request->reddit,
                'discord' => $request->discord,
            ]);

        return back()->with('message', 'Data Created Successfully.');
    }
}
