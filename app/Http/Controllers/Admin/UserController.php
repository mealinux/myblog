<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\UserController;
use App\User;
use Auth;

class UserController extends Controller
{
    public function loginFormGet()
    {
        return view('admin.login');
    }

    public function loginFormPost(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
          return redirect('admin/yazilar');
        }
        return redirect()->back()->with('message', 'Giriş bilgilerini kontrol edin ve tekrar deneyin!');
    }

    public function logoutPost()
    {
      Auth::logout();
      return redirect('admin/master-loginasform');
    }
}
