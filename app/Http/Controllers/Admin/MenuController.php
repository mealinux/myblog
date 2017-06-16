<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\MenuRequest;
use App\Http\Requests\Admin\MenuUpdateRequest;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Category;
use Auth;
use DB;

class MenuController extends Controller
{
  public function MenuGet()
  {
    return view('admin.menu-ekle', [
      'categories' => Category::all(),
      'menus' => Menu::all()
    ]);
  }

  public function AllMenuGet()
  {
    return view('admin.menuler', [
       'menu' => Menu::all()
    ]);
  }

  public function MenuPost(MenuRequest $request)
  {
    $menu = Menu::create([
        'user_id' => Auth::user()->id,
        'value' => $request->menu,
        'icon' => $request->icon
    ]);

    $menu->save();
    $menud = Menu::where('value', $request->menu)->first();

    if (($request->category_name == '') && ($request->category_sname != ''))
    {
      $category = Category::create([
      'user_id' => Auth::user()->id,
      'menu_id' => $menud->id,
      'category_name' => $request->category_sname
      ]);
      $category->save();
    }
    elseif (($request->category_name != '') && ($request->category_sname == ''))
    {
      $category = Category::create([
      'user_id' => Auth::user()->id,
      'menu_id' => $menud->id,
      'category_name' => $request->category_name
      ]);
      $category->save();
    }
    elseif (($request->category_name != '') && ($request->category_sname != ''))
    {
      $category = Category::create([
      'user_id' => Auth::user()->id,
      'menu_id' => $menud->id,
      'category_name' => $request->category_sname
      ]);
      $category->save();
    }
    elseif (($request->category_name == '') && ($request->category_sname == '') )
    {
      $category = Category::create([
      'user_id' => Auth::user()->id,
      'menu_id' => $menud->id,
      'category_name' => $request->menu
      ]);
      $category->save();
    }


    return view('admin.menuler', [
        'menu' => Menu::all()

      ])->with('message', 'Başarılı');
  }

  public function MenuUpdateGet($id)
  {
    return view('admin.menu-düzenle', [
        'menu' => Menu::find($id)
    ]);
  }
  public function MenuUpdatePost(MenuUpdateRequest $request, $id)
  {
    $menu = Menu::find($id);
    $menu->user_id = Auth::user()->id;
    $menu->value = $request->menu;
    $menu->icon = $request->icon;
    $menu->slug = null;
    $menu->update([$menu->value => $request->menu]);

    $menu->save();
    return redirect('admin/menuler')->with('message', 'Başarılı');
  }
  public function MenuDelete($id)
  {
    $menu = Menu::find($id);
    $menu->delete();
    return redirect('admin/menuler')->with('message', 'Başarılı');
  }
}
