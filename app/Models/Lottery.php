<?php

namespace App\Models;

use App\Traits\AutoDeleteFile;
use App\Traits\AutoTimeStamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

class Lottery extends Model
{
    use AutoTimeStamp, AutoDeleteFile;

    protected $guarded = ['id'];

    public function getShortDescriptionAttribute()
    {
        $data = substr($this->description, 0,250);

        return new HtmlString($data.' .....');
    }

    private static function autoDeleteFileConfig()
    {
        return [
            'disk' => 'simpleupload',
            'attribute' => 'path'
        ];
    }
}
