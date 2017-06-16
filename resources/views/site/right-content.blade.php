@section('right_content')


@if ($articlec > 0)
  <div class="card" style="width:90%">
    <div class="card-header align-items-center">
      <div class="row text-muted" style="margin-bottom:auto">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center text-muted">
          Rastgele Yazılar
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
    <div class="card-block" >
      <div class="card-text" >
      @foreach ($articler as $article)
        <div class="row">
          <div class="col-md-12" >
            @if ($article->checked != '1')
              <a href="/yazi/{{ $article->slug }}"><i class="fa fa-arrow-circle-right"></i> {{ $article->title }}</a>
            @endif
            <br>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>
@endif
  <div class="card" style="width:90%">
    <div class="card-header align-items-center">
      <div class="row text-muted" style="margin-bottom:auto">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center text-muted">
          Site Versiyon
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
    <div class="card-block">
      <div class="row" style="margin-bottom:auto">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 text-center text-muted">
          <div class="card-text">
            v{{ $setting->version }}
          </div>
        </div>
        <div class="col-md-2">
        </div>
      </div>
    </div>
  </div>

  <div class="card" style="width:90%">
    <div class="card-block">
      <div class="row" style="margin-bottom:auto">
        <div class="col-md-1"></div>
        <div class="col-md-10 text-center text-muted">
          {{ $setting->footer }} <i class="fa fa-copyright"></i> {{ date('Y') }}
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
  </div>
@endsection
