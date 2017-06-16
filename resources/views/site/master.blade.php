<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="{!! Request::is('/') ? App\User::find(1)->name : $articles->descriptions !!}" />
    <meta name="keywords" content="{!! Request::is('/')?  App\User::find(1)->name : $articles->keywords !!}" />
    <meta name="author" content="{!! Request::is('/') ?  App\User::find(1)->name : $articles->User->name !!}" />
    <title>{!! Request::is('/') ?  App\User::find(1)->name : $articles->title !!}</title>
  </head>
  @include('site.adminLinkCSS')
  <body>
    <!---------------------------------------------------------------------------------->
    <div class="ui doubling stackable pointing menu" >
      <div class="header item"><font size="4"> <img src="../media/logo_images/{!! $setting->logo !!}" alt=""> </font></div>
      @foreach ($menu as $menus)
        @if (Request::is('d/'.$menus->slug))
          <a href="/{{ $menus->slug }}" class="item {{ Request::is($menus->slug) ? 'active' : '' }}"><i class="fa fa-{{ $menus->icon }}" style="margin-right:3px"></i> {{ $menus->value }}</a>
        @elseif (($menus->slug == 'home') || ($menus->slug == 'index') || ($menus->slug == 'default') || ($menus->slug == 'anasayfa'))
          <a href="/" class="item {{ Request::is('/') ? 'active' : '' }}"><i class="fa fa-{{ $menus->icon }}" style="margin-right:3px"></i> {{ $menus->value }}</a>
        @elseif ((url('/yazi/{{ $menus->slug }}')) || ($menu->Article->slug == $article->Menu->slug))
          <a href="/{{ $menus->slug }}" class="item {{ Request::is($menus->slug) ? 'active' : '' }}"><i class="fa fa-{{ $menus->icon }}" style="margin-right:3px"></i> {{ $menus->value }}</a>
        @endif

      @endforeach
    </div>
  <!---------------------------------------------------------------------------------->
  <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="../media/logo_images/{!! $setting->logo !!}" alt=""></a>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          @foreach ($menu as $menus)
            <li class="nav-item">
            @if (Request::is('d/'.$menus->slug))
              <a href="/{{ $menus->slug }}" class="item {{ Request::is($menus->slug) ? 'active' : '' }} nav-link"><i class="fa fa-{{ $menus->icon }}" style="margin-right:3px"></i> {{ $menus->value }}</a>
            @elseif (($menus->slug == 'home') || ($menus->slug == 'index') || ($menus->slug == 'default') || ($menus->slug == 'anasayfa'))
              <a href="/" class="item {{ Request::is('/') ? 'active' : '' }} nav-link"><i class="fa fa-{{ $menus->icon }}" style="margin-right:3px"></i><b>{{ $menus->value }}</b> </a>
            @elseif ((url('/yazi/{{ $menus->slug }}')) || ($menu->Article->slug == $article->Menu->slug))
              <a href="/{{ $menus->slug }}" class="item {{ Request::is($menus->slug) ? 'active' : '' }} nav-link"><i class="fa fa-{{ $menus->icon }}" style="margin-right:3px"></i> {{ $menus->value }}</a>
            @endif
            </li>
          @endforeach
        </li>
      </ul>
    </div>
  </nav>
  <!---------------------------------------------------------------------------------->
      <div class="ui three column doubling stackable grid">
        <div class="four wide column">
            @yield('left_content')
        </div>
        <div class="eight wide column">
          @yield('main_content')
        </div>
        <div class="four wide column">
          @yield('right_content')
        </div>
      </div>
  </body>
  @include('site.adminLinkJS')
</html>
