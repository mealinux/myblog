<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use Sluggable;

    protected $fillable = [
      'user_id', 'menu_id', 'category_id', 'checked', 'title', 'slug', 'content', 'title_picture', 'picture_name', 'special_note', 'keywords', 'descriptions'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function User()
    {
       return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function Category()
    {
      return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function Menu()
    {
      return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }



}
