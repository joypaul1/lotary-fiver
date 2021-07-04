<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LotteryBg;
use Illuminate\Http\Request;
use NabilAnam\SimpleUpload\SimpleUpload;

class LotteryBgController extends Controller
{
    public function index(Request $request)
    {
        $data =  LotteryBg::first();
        // dd($data);
        return view('backend.lottarySection.bg', compact('data'));
    }

    public function store(Request $request)
    {
        $lottery = LotteryBg::first();

        if ($request->image) {
            $data = (new SimpleUpload)->file($request->image)
            ->dirName('market')
            ->resizeImage(700, 400)
            ->save();
        }

        LotteryBg::firstOrCreate(['id'=> 1], ['image' => $data]);
        return back()->with('message', 'Data Updated successfully!');
    }
}
