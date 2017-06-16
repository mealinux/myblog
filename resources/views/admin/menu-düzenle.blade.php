@extends('admin.master')

@section('content')
  @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
  @endif
  <div class="x_panel">
    <div class="x_title">
        <h2>Menü Ekle</h2>
        <div class="clearfix"></div>
      </div>
    <div class="x_content">
      <p class="text-muted font-13 m-b-30">
        </p>
        <form method="post" action="" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-3 text-right">
                  <h4>Yeni Menü:</h4>
                </div>
                <div class="col-md-9">
                  <input type="text" name="menu" class="form-control" value="{{ $menu->value }}" placeholder="örnek:laravel" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-3 text-right">
                  <h4>Yeni İcon:</h4>
                </div>
                <div class="col-md-9">
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">fa fa-</span>
                    <input type="text" name="icon" class="form-control" value="{{ $menu->icon }}" placeholder="http://fontawesome.io/icons/ adresinden bir adet icon ismi yazın" aria-describedby="basic-addon1" >
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12 text-right">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Güncelle</button>
              </div>
            </div>
            </div>
            <div class="col-md-2">

            </div>
          </div>
          </form>
          </div>
    </div>

@endsection
