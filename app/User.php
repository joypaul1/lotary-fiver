<?php

namespace App;

use App\Traits\AutoTimeStamp;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\Recursive;

class User extends Authenticatable
{


    public function getParentKeyName()
    {
        return 'user_id'; // or anything
    }

    use Notifiable, AutoTimeStamp, SoftDeletes, Recursive;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    // recursive relationship
    public function childItems()
    {
        return $this->hasMany(User::class, 'user_id')->with('items');
    }
}
