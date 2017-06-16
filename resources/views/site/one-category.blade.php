@extends('site.master')
@extends('site.right-content')
@extends('site.left-content')


@section('main_content')
  <div class="card w-100">
    <div class="card-header align-items-center">
      <div class="row text-muted no-gutters" style="margin-bottom:auto">
        <div class="col-md-12 text-center">
            <img src="../media/article_title_images/original/{!! $article->picture_name !!}" alt="">
        </div>
      </div>
      <hr>
      <div class="row text-muted" style="margin-bottom:auto">
        <div class="col-md-4 text-left text-muted">
           Kategori: <b>{{ $article->Menu->value }} - {{ $article->Category->category_name }} </b>
        </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-4 text-right text-muted">
          <b>{{ $article->created_at->diffForHumans() }}</b>
        </div>
      </div>
      <hr>
      <div class="row text-muted" style="margin-bottom:auto">
        <div class="col-md-12 text-center text-muted">
          <h3> {{ $article->title }} </h3>
        </div>
      </div>
    </div>
    <div class="card-block">
      <div class="row" style="margin-bottom:auto">
        <div class="col-md-12">
          <div class="card-text">
            {!! $article->content !!}
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="row text-muted align-items-center" style="margin-bottom:auto">
        <div class="col-md-4 text-left text-muted">
          Yazar: <b>{{ $article->User->name }} </b>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
        </div>
      </div>
    </div>
  </div>
@endsection
