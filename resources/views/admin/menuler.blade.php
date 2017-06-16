@extends('admin.master')

@section('content')

  @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
  @endif
  @if (Session::has('message2'))
    <div class="alert alert-danger">
        {{ Session::get('message2') }}
    </div>
  @endif
  <div class="x_panel">
    <div class="x_title">
        <h2>Yazılar <small>Tüm Yazılar</small></h2>
        <div class="clearfix"></div>
      </div>
    <div class="x_content">
      <p class="text-muted font-13 m-b-30">
        </p>
        <table id="datatable-buttons" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Ekleyen Kullanıcı</th>
              <th>Menü Adı</th>
              <th>İcon</th>
              <th>Ayarlar</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($menu as $menus)
              <tr>
                <td>{{ $menus->User->name }}</td>
                <td>{{ $menus->value }}</td>
                <td><i class="fa fa-{{ $menus->icon }}"></i> ({{ $menus->icon }})</td>
                <td>
                <a href="/admin/menuler/düzenle/{{ $menus->id }}"><button type="submit" name="btn_edit" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> Düzenle</button></a>
                <a href="/admin/menuler/sil/{{ $menus->id }}"><button type="submit" name="btn_edit" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Sil</button></a>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
    </div>
  </div>

@endsection
