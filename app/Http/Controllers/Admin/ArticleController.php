<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\ArticleRequest;
use App\Http\Requests\Admin\ArticleUpdateRequest;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use App\Article;
use App\Category;
use App\Menu;
use App\Setting;
use DB;
use File;

class ArticleController extends Controller
  {

  public function allArticleGet()
  {
      return view('admin.yazilar', [
        'articles' => Article::orderBy('created_at', 'desc')->get()
      ]);
  }

  public function addArticleGet()
  {
      return view('admin.yazi-ekle', [
        'categories' => Category::all(),
        'menus' => Menu::all()
      ]);
  }
  public function addOneArticleGet()
  {
      return view('admin.bir-yazi-ekle', [
        'categories' => Category::all(),
        'menus' => Menu::all()
      ]);
  }

  public function addArticlePost(ArticleRequest $request)
  {
      $category  = DB::table('categories')->where('category_name', $request->article_category)->first();
      if ($request->label == true)
      {
        $article = Article::create([
          'user_id' => Auth::user()->id,
          'category_id' => $category->id,
          'checked' => '1',
          'menu_id' => $category->menu_id,
          'title' => $request->title,
          'content' => $request->content,
          'keywords' => $request->keywords,
          'descriptions' => $request->descriptions
          ]);
      }
      else
      {
        $image = $request->title_picture;

       if (($image != null) || ($image != ''))
       {
         $filename = time()."-".str_slug($request->title, "-").".".$image->getClientOriginalExtension();
         $path = public_path('media/article_title_images/'. $filename);
         $path2 = public_path('media/article_title_images/original/'. $filename);
         Image::make($image->getRealPath())->resize(175, 90)->save($path);
         Image::make($image->getRealPath())->fit(610, 315)->save($path2);

         $article = Article::create([
           'user_id' => Auth::user()->id,
           'category_id' => $category->id,
           'checked' => '0',
           'menu_id' => $category->menu_id,
           'title' => $request->title,
           'content' => $request->content,
           'picture_name' => $filename,
           'special_note' => $request->special_note,
           'keywords' => $request->keywords,
           'descriptions' => $request->descriptions
         ]);
       }
       else
        {
         $article = Article::create([
           'user_id' => Auth::user()->id,
           'category_id' => $category->id,
           'checked' => '0',
           'menu_id' => $category->menu_id,
           'title' => $request->title,
           'content' => $request->content,
           'special_note' => $request->special_note,
           'keywords' => $request->keywords,
           'descriptions' => $request->descriptions
         ]);
       }
      }

      $article->save();
      return redirect()->back()->with('message', 'Başarılı');
  }


  public function ArticleUpdatePost(ArticleUpdateRequest $request, $id)
  {
      $article = Article::find($id);
      $category  = DB::table('categories')->where('category_name', $request->article_category)->first();

      if ($request->label == true)
      {
        $article->user_id = Auth::user()->id;
        $article->category_id = $category->id;
        $article->checked = '1';
        $article->title = $request->title;
        $article->slug = null;
        $article->update([$article->title => $request->title]);
        $article->content = $request->content;
        $article->special_note = $request->special_note;
        $article->keywords = $request->keywords;
        $article->descriptions = $request->descriptions;
      }
      else
      {
        $image = $request->title_picture;

        if (($image != null) || ($image != ''))
        {
          $image_name = $article->picture_name;
          $path = public_path("media/article_title_images/". $image_name);
          $path2 = public_path("media/article_title_images/original/". $image_name);
          File::delete($path);
          File::delete($path2);

          $filename = time()."-".str_slug($request->title, "-").".".$image->getClientOriginalExtension();
          $path = public_path('media/article_title_images/'. $filename);
          $path2 = public_path('media/article_title_images/original/'. $filename);
          Image::make($image->getRealPath())->resize(175, 90)->save($path);
          Image::make($image->getRealPath())->fit(610, 315)->save($path2);

          $article->user_id = Auth::user()->id;
          $article->category_id = $category->id;
          $article->checked = '0';
          $article->title = $request->title;
          $article->slug = null;
          $article->update([$article->title => $request->title]);
          $article->content = $request->content;
          $article->picture_name = $filename;
          $article->special_note = $request->special_note;
          $article->keywords = $request->keywords;
          $article->descriptions = $request->descriptions;
        }
        else
        {
          $article->user_id = Auth::user()->id;
          $article->category_id = $category->id;
          $article->checked = '0';
          $article->title = $request->title;
          $article->slug = null;
          $article->update([$article->title => $request->title]);
          $article->content = $request->content;
          $article->special_note = $request->special_note;
          $article->keywords = $request->keywords;
          $article->descriptions = $request->descriptions;
        }
      }


      $article->save();

      return redirect()->action('Admin\ArticleController@allArticleGet')->with('message', 'Başarılı');
  }

  public function ArticleUpdateGet($id)
  {
        $cate = Article::find($id);
        if ($cate->checked == '1')
        {
          return view('admin.bir-yazi-ekle-güncelle',[
              'articles' => Article::find($id),
              'catid' => $cate->category_id,
              'menuid' => $cate->menu_id,
              'menus' => Menu::all(),
              'categories' => Category::all()
          ]);
        }
        else
        {
          return view('admin.yazi-düzenle',[
              'articles' => Article::find($id),
              'catid' => $cate->category_id,
              'menuid' => $cate->menu_id,
              'menus' => Menu::all(),
              'categories' => Category::all()
          ]);
        }

  }


  public function ArticleDeleteGet($id)
  {
    $article = Article::find($id);

    if ($article->picture_name)
    {
      $imagename = $article->picture_name;
      $path = public_path("media/article_title_images/". $imagename);
      $path2 = public_path("media/article_title_images/original/". $imagename);
      File::delete($path);
      File::delete($path2);
    }

      $article->delete();
      return redirect()->back()->with('message', 'Başarılı');
  }
  //----------------ayarlar---------------------------------------------


}
