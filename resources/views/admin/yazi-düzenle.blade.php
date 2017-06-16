@extends('admin.master')

@section('content')
  @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
  @endif
  <div class="x_panel">
    <div class="x_title">
        <h2>Yazı Ekle</h2>
        <div class="clearfix"></div>
      </div>
    <div class="x_content">
      <p class="text-muted font-13 m-b-30">
        </p>
        <div class="container">
          <form method="post" action="" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-1">
                <h3>Başlık</h3>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" name="title" value="{{ $articles->title }}" placeholder="örnek:laravel" required="required">
              </div>
              <div class="col-md-1">

              </div>
            </div>
            <!--------------------------------------------->
            <div class="form-group"></div>
              <!--------------------------------------------->
            <div class="form-group"></div>
            <div class="row">
              <div class="col-md-2" style="margin-right:-50px">
                <h3>Kategori:</h3>
              </div>
              <div class="col-md-4">
                <select class="form-control" name="article_category">
                  <option></option>
                  @foreach ($menus as $value)

                    <optgroup label="{{ $value->value }}">

                      @foreach ($categories as $name)

                        @if ($value->id == $name->menu_id)
                          <option {{ $catid ==  $name->id ? 'selected' : ''}}>{{ ($name->category_name == 'Home') ? '' : $name->category_name }} </option>
                        @endif

                      @endforeach

                    </optgroup>

                  @endforeach
                </select>
              </div>
              <div class="col-md-6">

              </div>
            </div>
            <!--------------------------------------------->
            <div class="form-group"></div>
            <div class="row">
              <div class="col-md-2">
                <h3>Başlık Resmi</h3>
              </div>
              <div class="col-md-4">
                <div class="col-md-5">
                  <input type="file" name="title_picture" accept="image/*">
                  <p class="help-block">Şu boyutta</p>
                </div>
              </div>
              <div class="col-md-6">
              </div>
            </div>
            <!--------------------------------------------->
            <div class="form-group"></div>
            <div class="row">
              <div class="col-md-8">
                <h3>İçerik</h3>
                 <textarea name="content" class="form-control my-editor">{!! $articles->content !!}</textarea>
              </div>
              <div class="col-md-4">
              </div>
            </div>
            <br>
            <!--------------------------------------------->
            <div class="form-group"></div>
            <div class="row">
              <div class="col-md-2">
                <h3>Keywords</h3>
              </div>
              <div class="col-md-6">
                 <input type="text" required="required" name="keywords" value="{{ $articles->keywords }}" class="form-control" placeholder="kelimeleri virgül(,) ile ayrınız">
              </div>
              <div class="col-md-4">

              </div>
            </div>
            <!--------------------------------------------->
            <div class="form-group"></div>
            <div class="row">
              <div class="col-md-2">
                <h3>Descriptions</h3>
              </div>
              <div class="col-md-6">
                <input type="text" required="required" size="50" name="descriptions" value="{{ $articles->descriptions }}" class="form-control" placeholder="kelimeleri virgül(,) ile ayrınız">
              </div>
              <div class="col-md-4">

              </div>
            </div>
            <!--------------------------------------------->
            <div class="form-group"></div>
            <div class="row">
              <div class="col-md-2">
                <h3>Özel Not</h3>
              </div>
              <div class="col-md-6">
                <textarea required="required" class="form-control" name="special_note" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100">{{ $articles->special_note }}</textarea>
              </div>
              <div class="col-md-4">

              </div>
            </div>
            <!--------------------------------------------->
            <div class="form-group"></div>

              <div class="row">
                  <div class="col-md-10">
                    <div class="form-group"></div>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-lg">Güncelle</button>
                  </div>
              </div>
          </form>
        </div>

      </div>
    </div>

@endsection
