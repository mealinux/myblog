<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use Intervention\Image\ImageManagerStatic as Image;
use App\User;
use App\Setting;
use Auth;
use File;

class SettingController extends Controller
{
  public function AyarlarGet()
  {
    return view('admin.ayarlar', [
      'setting' => Setting::find(1)
    ]);
  }

public function AyarlarPost(SettingRequest $request)
  {
    $setting = Setting::find(1);
    $logo = $request->logo;
      if (($logo != '') || ($logo != null))
      {
        if (($setting->logo != '') || ($setting->logo != null))
        {
          $image_name =  $setting->logo;
          $path = public_path('media/logo_images/'. $image_name);
          File::delete($path);
        }

      $filename = time()."-".str_slug(Auth::user()->name, "-")."-"."logo".".".$logo->getClientOriginalExtension();
      $path = public_path('media/logo_images/'. $filename);
      Image::make($logo->getRealPath())->resize(30, 22)->save($path);

      $setting->user_id = Auth::user()->id;
      $setting->logo = $filename;
      $setting->teknoseyir = $request->teknoseyir;
      $setting->google = $request->google;
      $setting->github = $request->github;
      $setting->bitbucket = $request->bitbucket;
      $setting->linkedin = $request->linkedin;
      $setting->version = $request->version;
      $setting->footer = $request->footer;

    }
    else
    {
      $setting->user_id = Auth::user()->id;
      $setting->teknoseyir = $request->teknoseyir;
      $setting->google = $request->google;
      $setting->github = $request->github;
      $setting->bitbucket = $request->bitbucket;
      $setting->linkedin = $request->linkedin;
      $setting->version = $request->version;
      $setting->footer = $request->footer;
    }

    $setting->save();
    return redirect()->action('Admin\SettingController@AyarlarGet')->with('messeage', 'Başarılı');


  }

}
