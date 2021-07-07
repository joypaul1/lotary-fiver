<?php

namespace App\Models;

use App\Traits\AutoTimeStamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class TokenRight extends Model
{
    use AutoTimeStamp;


    // public function getSDescriptionAttribute()
    // {
    //     // $data = substr($this->description, 0,250);

    //     // return new HtmlString($this->description);
    // }
    protected $guarded = ['id'];

}
