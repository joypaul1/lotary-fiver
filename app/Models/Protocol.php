<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AutoDeleteFile;
use App\Traits\AutoTimeStamp;

class Protocol extends Model
{
    use AutoTimeStamp, AutoDeleteFile;

    protected $guarded = ['id'];


    public function descriptions()
    {
        return $this->hasMany(PCDescription::class, 'protocol_id', 'id');
    }
    private static function autoDeleteFileConfig()
    {
        return [
            'disk' => 'simpleupload',
            'attribute' => 'image'
        ];
    }
}
