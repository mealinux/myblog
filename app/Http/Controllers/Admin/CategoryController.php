<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use App\Category;
use App\Article;
use App\Menu;
use Auth;
use File;

class CategoryController extends Controller
{
    public function allCategoryGet()
    {
      return view('admin.kategoriler', [
        'categories' => Category::all()
      ]);
    }

    public function addCategoryGet()
    {
      return view('admin.kategori-ekle', [
         'menu' => Menu::all()
      ]);
    }

    public function addCategoryPost(CategoryRequest $request)
    {

      $menud = Menu::where('value', $request->menu)->first();

      $category = Category::create([
          'user_id' => Auth::user()->id,
          'menu_id' => $menud->id,
          'category_name' => $request->category_name
      ]);

      $category->save();

      return redirect()->action('Admin\CategoryController@allCategoryGet')->with('message', 'Başarılı');
    }

    public function CategoryUpdateGet($id)
    {
      return view('admin.kategori-düzenle',[
          'category' => Category::find($id),
          'menu' => Menu::all()
      ]);
    }

    public function CategoryUpdatePost(CategoryUpdateRequest $request, $id)
    {
      $category = Category::find($id);
      $menu = Menu::where('value', $request->menu_sname)->first();
      $image = $request->addCategory_picture;

      if (($image != null) || ($image != ''))
      {
        $image_name = $category->picture_name;
        $path = public_path('media/category_title_images/'. $image_name);
        File::delete($path);


        $filename = time()."-".str_slug($request->addCategory_name, "-").".".$image->getClientOriginalExtension();
        $path = public_path('media/category_title_images/'. $filename);
        Image::make($image->getRealPath())->resize(150, 80)->save($path);

        $category->category_name = $request->addCategory_name;
        $category->menu_id = $menu->id;
        $category->category_picture = '<img src="../media/category_title_images/'. $filename.'" >';
        $category->picture_name = $filename;
        $category->slug = null;
        $category->update([$category->category_name => $request->addCategory_name]);
      }
      else
      {
        $category->category_name = $request->addCategory_name;
        $category->menu_id = $menu->id;
        $category->slug = null;
        $category->update([$category->category_name => $request->addCategory_name]);
      }

      $category->save();
      return redirect()->action('Admin\CategoryController@allCategoryGet')->with('message', 'Başarılı');
    }

    public function CategoryDeleteGet($id)
    {
      $category = Category::find($id);
      $imagename = $category->picture_name;
      if ($category->picture_name)
      {
        $path = public_path("media/category_title_images/". $imagename);
        File::delete($path);
      }

      $category->delete();
      return redirect()->back()->with('message', 'Başarılı');
    }


}
