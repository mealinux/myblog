<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
  use Sluggable;

  protected $fillable = [
    'user_id', 'value', 'slug', 'icon'
  ];


  public function sluggable()
 {
     return [
         'slug' => [
             'source' => 'value'
         ]
     ];
 }

  public function User()
  {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function Category()
  {
    return $this->hasMany('App\Category', 'category_id', 'id');
  }

  public function Article()
  {
    return $this->hasMany('App\Article', 'article_id', 'id');
  }
}
