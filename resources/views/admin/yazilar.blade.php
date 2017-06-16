@extends('admin.master')

@section('content')
  @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
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
              <th>Yazan Kullanıcı</th>
              <th>Kategori</th>
              <th>Başlık</th>
              <th>Slug</th>
              <th>İçerik</th>
              <th>Başlık Resmi</th>
              <th>Özel Not</th>
              <th>Keywrods</th>
              <th>Description</th>
              <th>İşlemler</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($articles as $article)
              <tr>
                <td>{{ $article->User->name }}</td>
                <td>{{ $article->Category->category_name }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->slug }}</td>
                <td> {{ str_limit($article->content, 130)  }}</td>
                <td><img src="../media/article_title_images/{!! $article->picture_name !!}" alt=""> </td>
                <td>{{ str_limit($article->special_note, 130)  }}</td>
                <td>{{ $article->keywords }}</td>
                <td>{{ $article->descriptions }}</td>
                <td>
                <a href="/admin/yazilar/önizleme/{{ $article->id }}" target="_blank"><button type="submit" name="btn_show"  class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Önizleme</button></a>
                <a href="{{$article->checked == '1' ? '/admin/yazilar/düzenle/b/'.$article->id : '/admin/yazilar/düzenle/'.$article->id}}"><button type="submit" name="btn_edit" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> Düzenle</button></a>
                <a href="/admin/yazilar/sil/{{ $article->id }}"><button type="submit" name="btn_edit" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> Sil</button></a>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
    </div>
  </div>
@endsection
