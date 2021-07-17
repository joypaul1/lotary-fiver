<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HeaderSection;
use App\Models\Lottery;
use App\Models\LotteryBg;
use App\Models\Market;
use App\Models\Menus;
use App\Models\Name;
use App\Models\Protocol;
use App\Models\TokenFooter;
use App\Models\TokenLeft;
use App\Models\TokenRight;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $headerSection  = HeaderSection::first(['title','logo', 'background_image','coin_gif', 'person_gif']);
        $protocal       = Protocol::select('title', 'logo', 'highlight', 'image', 'id')->with('descriptions')->get();
        $market         = Market::select('title', 'image', 'description')->get();
        $lottery        = Lottery::select('title', 'description')->get();
        $lotteryBg      = LotteryBg::first();
        $tokenLeft      = TokenLeft::get(['percent', 'title']);
        $tokenRight     = TokenRight::get(['title', 'amount']);
        $sectionName    = Name::orderBy('id')->get();
        $tokenFooter    = TokenFooter::first();
        $cusMenus       = Menus::get(['link', 'name', 'is_token_menu','header_mobile_menu','header_menu', 'id', 'mobile_menu']);
        return view('frontend.home',compact('headerSection', 'protocal', 'market', 'lottery', 'lotteryBg', 'tokenLeft', 'tokenRight', 'sectionName', 'cusMenus', 'tokenFooter'));
    }
}
