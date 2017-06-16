<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'user_id', 'logo', 'teknoseyir', 'google', 'github', 'bitbucket', 'linkedin', 'version', 'footer'
    ];


    public function User()
    {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
