<?php

namespace App\Models;

use App\Traits\AutoTimeStamp;
use Illuminate\Database\Eloquent\Model;

class TokenFooter extends Model
{
    use AutoTimeStamp;

    protected $guarded = ['id'];
}
