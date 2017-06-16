@extends('admin.master')

@section('content')
@if (Session::has('message'))
  <div class="alert alert-success">
      {{ Session::get('message') }}
  </div>
@endif
<div class="x_panel">
  <div class="x_title">
      <h2>Kategori Ekle</h2>
      <div class="clearfix"></div>
    </div>
  <div class="x_content">
    <p class="text-muted font-13 m-b-30">
      <form action="" method="post">
      </p>
        <div class="row">
          <div class="col-md-2">

          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-3 text-right">
                <h4>Kategori Yazın:</h4>
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-12">
                      <input type="text" name="category_name" class="form-control" value="" placeholder="örnek:laravel" >
                  </div>
                </div>

              </div>
            </div>
            <br>

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
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
              <div class="row">
                <div class="col-md-3 text-right">
                  <h4>Menü Seçin:</h4>
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-12">
                      <select class="form-control" name="menu">
                        <option></option>
                         @foreach ($menu as $menus)

                           <option>{{ $menus->value }} </option>

                         @endforeach

                       </select>
                    </div>
                  </div>
                  <br>
                </div>
              </div>
                <div class="row">
                  <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Ekle</button>
                </div>
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
