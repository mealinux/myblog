<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use App\Setting;
use App\Article;
use App\Category;
use App\User;
use App\Menu;

class SiteController extends Controller
{
    public function HomeGet()
    {
      return view('site.home', [
        'setting' => Setting::find(1),
        'article' => Article::orderBy('created_at', 'desc')->paginate(6),
        'admin' => User::where('user_type', 'admin')->first()
      ]);
    }

    public function AllCategoryGet()
    {
      return view('site.all-category', [
        'setting' => Setting::find(1),
        'admin' => User::where('user_type', 'admin')->first()
      ]);
    }

    public function OneCategoryGet($slug)
    {
      return view('site.one-category', [
          'article' => Article::where('slug', $slug)->first(),
          'articles' => Article::where('slug', $slug)->first(),
          'admin' => User::where('user_type', 'admin')->first(),
          'setting' => Setting::find(1),
          'articler' => Article::all()->random(2),
          'articlec' => Article::count(),
          'menu' => Menu::all()
      ]);
    }

    public function EachCategoryGet($slug)
    {
        $menu = Menu::where('slug', $slug)->first();
        $article = Article::where('menu_id', $menu->id)->first();

        if ($article->checked == '1')
        {
          return view('site.one-page-category', [
              'articles' => Article::where('menu_id', $menu->id)->first(),
              'admin' => User::where('user_type', 'admin')->first(),
              'setting' => Setting::find(1),
              'articler' => Article::all()->random(2),
              'articlec' => Article::count(),
              'menu' => Menu::all()
          ]);
        }
        else
        {
          return view('site.each-category', [
              'article' => Article::where('menu_id', $menu->id)->paginate(6),
              'admin' => User::where('user_type', 'admin')->first(),
              'setting' => Setting::find(1),
              'articler' => Article::all()->random(2),
              'articlec' => Article::count(),
              'menu' => Menu::all()
          ]);
        }

    }

    //---------------menu---------------------------------------
    public function AllMenuGet()
    {
      return view('site.home', [
          'menu' => Menu::all(),
          'article' => Article::orderBy('created_at', 'desc')->paginate(6),
          'admin' => User::where('user_type', 'admin')->first(),
          'articlec' => Article::count(),
          'articler' => Article::all()->random(2),
          'setting' => Setting::find(1)
      ]);
    }
}
