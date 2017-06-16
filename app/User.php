<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dateofbirth', 'gender', 'job', 'profile_picture', 'picture_name', 'about', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function Article()
    {
      return $this->hasMany('App\Article', 'user_id', 'id');
    }

    public function Category()
    {
      return $this->hasMany('App\Category', 'user_id', 'id');
    }

    public function Setting()
    {
      return $this->hasMany('App\Setting', 'user_id', 'id');
    }


}
