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
        return view('backend.lottery.bg', [$data =  LotteryBg::first()]);
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

        $lottery->update($data);
        return back()->with('message', 'Data Updated successfully!');
    }
}
