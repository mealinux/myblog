@extends('admin.master')

@section('content')
  @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
  @endif
  <div class="x_panel">
    <div class="x_title">
        <h2>Kategori Güncelle</h2>
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
                  <h4>Kategori Girin:</h4>
                </div>
                <div class="col-md-9">

                     <input type="text" name="addCategory_name" class="form-control" value="{{ $category->category_name }}" placeholder="örnek:laravel">
                </div>
              </div>
            </div>
            <div class="col-md-2">

            </div>
          </div>
    </div>
  </div>

    <div class="x_panel">
      <div class="x_title">
          <h2>Menü Ekle</h2>
          <div class="clearfix"></div>
        </div>
      <div class="x_content">
        <p class="text-muted font-13 m-b-30">
          </p>
            <div class="row">
              <div class="col-md-2">

              </div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-3 text-right">
                    <h4>Menü:</h4>
                  </div>
                  <div class="col-md-9">

                      <select class="form-control" name="menu_sname">
                        <option></option>
                         @foreach ($menu as $menus)

                           <option {{ ($menus->id == $category->menu_id) ? 'selected' : ''}}>{{ $menus->value }} </option>

                         @endforeach

                       </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="admin/kategoriler/düzenle/{{ $category->id }}"><button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Güncelle</button></a>
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
