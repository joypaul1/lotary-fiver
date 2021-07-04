<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HeaderSection;
use App\Models\Lottery;
use App\Models\Market;
use App\Models\Protocol;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $headerSection =  HeaderSection::first(['title','logo', 'background_image','coin_gif', 'person_gif']);
        $protocal      = Protocol::select('title', 'logo', 'description', 'highlight', 'image')->get();
        $market        = Market::select('title', 'image', 'description')->get();
        $lottery        = Lottery::select('title', 'description')->get();
        return view('frontend.home',compact('headerSection', 'protocal', 'market', 'lottery'));
    }
}
