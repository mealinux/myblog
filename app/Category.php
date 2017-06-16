<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    protected $fillable = [
      'user_id', 'menu_id', 'category_name', 'category_picture', 'picture_name', 'slug'
    ];


    public function sluggable()
        {
            return [
                'slug' => [
                    'source' => 'category_name'
                ]
            ];
        }



    public function User()
    {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function Menu()
    {
      return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }

    public function Article()
    {
      return $this->hasMany('App\Article', 'article_id', 'id');
    }


}
