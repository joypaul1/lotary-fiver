<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenFooter extends Model
{
    use AutoTimeStamp;

    protected $guarded = ['id'];
}
