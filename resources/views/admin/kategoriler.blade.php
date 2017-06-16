@extends('admin.master')

@section('content')
  @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
  @endif
  <div class="x_panel">
    <div class="x_title">
        <h2>Kategoriler <small>Tüm Kategoriler</small></h2>
        <div class="clearfix"></div>
      </div>
    <div class="x_content">
      <p class="text-muted font-13 m-b-30">
        </p>
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Ekleyen Kullanıcı</th>
              <th>Kategori İsmi</th>
              <th>Bağlı Olduğu Menü</th>
              <th>Slug</th>
              <th>Oluşturulduğu Tarih</th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($categories as $category)
              <tr>
                <td>{{ $category->User->name }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->Menu->value }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                <a href="/admin/kategoriler/düzenle/{{ $category->id }}"><button type="submit" name="btn_show"  class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> DÜzenle</button></a>
                <a href="/admin/kategoriler/sil/{{ $category->id }}"><button type="submit" name="btn_show"  class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Sil</button></a>
              </tr>
            @endforeach

          </tbody>
        </table>
    </div>
  </div>
@endsection
