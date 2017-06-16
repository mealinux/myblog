@extends('admin.master')

@section('content')
  @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
  @endif
  <div class="x_panel">
    <div class="x_title">
      <h2>Profil Sayfası <small>Kullanıcı profili</small></h2>
      <ul class="nav navbar-right panel_toolbox">
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
        <div class="profile_img">
          <div id="crop-avatar">
            <!-- Current avatar -->
            <img class="img-responsive avatar-view" src="../media/profile_images/{!! Auth::user()->profile_picture !!}" alt="Avatar" title="Change the avatar">
          </div>
        </div>
        <h3> {{ Auth::user()->name }} </h3>
        <br />
        <form action="" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="col-md-2 text-right">
          <h5>Fotoğraf:</h5>
          </div>
          <div class="">
            <input type="file" name="profile_picture" accept="image/*">
            <p class="help-block">Şu boyutta</p>
          </div>
      </div>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="profile_title">
          <div class="col-md-6">
            <h2>Detaylar</h2>
          </div>
        </div>
        <br />
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="input-group">
            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }} " aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon1">Ad Soyad</span>
          </div>
          <div class="input-group">
            <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }} " aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon1">E-Mail</span>
          </div>
          <div class="input-group">
            <input type="text" name="birth" class="form-control" value="{{ Auth::user()->dateofbirth }} " data-inputmask="'mask': '99/99/9999'" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon1">Doğum Tarihi</span>
          </div>
          <div class="input-group">
              <select class="form-control" name="gender">
                <option>Bayan</option>
                @if (Auth::user()->gender == "Bay")
                  <option selected="selected">Bay</option>
                @elseif(Auth::user()->gender != "Bay")
                  <option>Bay</option>
                @endif
              </select>
            <span class="input-group-addon"  id="basic-addon1">Cinsiyet</span>
          </div>
          <div class="input-group">
            <input type="text" name="job" class="form-control" value="{{ Auth::user()->job }} " aria-describedby="basic-addon2">
            <span class="input-group-addon"  id="basic-addon1">Meslek</span>
          </div>
          <div class="input-group">
            <textarea class="form-control" name="about" rows="5" cols="80" aria-describedby="basic-addon2">{{ Auth::user()->about }}</textarea>
            <span class="input-group-addon" id="basic-addon1">Hakkında</span>
          </div>
          <div class="input-group">
            <input type="text" name="type" class="form-control" value="{{ Auth::user()->user_type }} " readonly="readonly" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon1">Kullanıcı Tipi</span>
          </div>
          <div class="input-group">
            <hr>
          </div>
          <div class="input-group">
            <input type="password" name="password" placeholder="Değiştirmeyecekseniz boş bırakın" class="form-control" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon1">Şifre</span>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
      <button type="submit" class="btn btn-success"><i class="fa fa-check m-right-xs"></i> Profili Güncelle</button>
      </form>
    </div>
  </div>

@endsection
