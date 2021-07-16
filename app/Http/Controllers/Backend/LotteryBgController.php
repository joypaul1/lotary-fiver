<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LotteryBg;
use App\Models\Name;
use Illuminate\Http\Request;
use NabilAnam\SimpleUpload\SimpleUpload;

class LotteryBgController extends Controller
{

    public function name()
    {
        $name = Name::whereId(4)->first();
        return view('backend.lottarySection.name', ['name' =>$name]);
    }

    public function nameStore(Request $request)
    {
        Name::updateOrCreate(['id'=>4], ['name' => $request->name, 'id' => 4]);
        return back()->with('message', 'Data Created Successfully.');
    }

    public function index(Request $request)
    {
        $data =  LotteryBg::first();
        return view('backend.lottarySection.bg', compact('data'));
    }

    public function store(Request $request)
    {


        if ($request->image) {
            $data = (new SimpleUpload)->file($request->image)
            ->dirName('market')
            // ->resizeImage(700, 400)
            ->save();
        }

        LotteryBg::updateOrCreate(['id'=> 1], ['image' => $data]);
        return back()->with('message', 'Data Updated successfully!');
    }
}
