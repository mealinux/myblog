<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use Intervention\Image\ImageManagerStatic as Image;
use App\User;
use File;
use Auth;

class ProfileController extends Controller
{
    public function ProfileGet()
    {
      return view('admin.profile');
    }

    public function ProfilePost(ProfileRequest $request)
    {
      $profile = Auth::user();
      $image = $request->profile_picture;
      if (($image != '') || ($image != null))
      {
        if ((($profile->profile_picture != '') || ($profile->profile_picture != null)) && ($profile->profile_picture != "user.png"))
        {
          $image_name =  $profile->picture_name;
          $path = public_path('media/profile_images/'. $image_name);
          File::delete($path);
        }

        $filename = time()."-".str_slug($request->name, "-")."-"."profil".".".$image->getClientOriginalExtension();
        $path = public_path('media/profile_images/'. $filename);
        Image::make($image->getRealPath())->fit(250, 250)->save($path);

        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->dateofbirth = $request->birth;
        $profile->gender = $request->gender;
        $profile->profile_picture = $filename;
        $profile->picture_name = $filename;
        $profile->job = $request->job;
        $profile->about = $request->about;
        if (($request->password != null) || ($request->password != ''))
        {
          $profile->password = bcrypt($request->password);
        }
      }
      elseif (((($profile->profile_picture != '') || ($profile->profile_picture != null)) && ($profile->profile_picture != "user.png")))
      {
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->dateofbirth = $request->birth;
        $profile->gender = $request->gender;
        $profile->job = $request->job;
        $profile->about = $request->about;
        if (($request->password != null) || ($request->password != ''))
        {
          $profile->password = bcrypt($request->password);
        }
      }
      else
      {
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->dateofbirth = $request->birth;
        $profile->gender = $request->gender;
        $profile->profile_picture = "user.png";
        $profile->picture_name = "user.png";
        $profile->job = $request->job;
        $profile->about = $request->about;
        if (($request->password != null) || ($request->password != ''))
        {
          $profile->password = bcrypt($request->password);
        }
      }

      $profile->save();
      return redirect()->back()->with('message', 'Başarılı');

    }
}
