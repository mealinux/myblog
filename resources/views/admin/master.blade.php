<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ Auth::user()->name }} </title>
    @include('admin.adminLinkCSS')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href=" {{ url('/') }} " target="_blank" class="site_title"><i class="fa fa-codepen"></i> <span>Ali Kılıç </span>-></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../media/profile_images/{!! Auth::user()->profile_picture !!}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hayırla Geldin,</span>
                <h2> {{ Auth::user()->name }} </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <hr>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-th"></i> Menüler ve Kategoriler<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href=" {{ url('admin/menuler') }} "><i class="fa fa-th-list"></i>Menüler</a></li>
                      <li><a href=" {{ url('admin/menu-ekle') }} "><i class="fa fa-indent"></i>Menü Ekle</a></li>
                      <li><a href=" {{ url('admin/kategoriler') }} "><i class="fa fa-bars"></i>Kategoriler</a></li>
                      <li><a href=" {{ url('admin/kategori-ekle') }} "><i class="fa fa-plus-square-o"></i>Kategori Ekle</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-navicon"></i> Yazılar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href=" {{ url('admin/yazilar') }} "><i class="fa fa-list-alt"></i>Yazılar</a></li>
                      <li><a href=" {{ url('admin/liste-yazi-ekle') }} "><i class="fa fa-edit"></i>Liste Yazı Ekle</a></li>
                      <li><a href=" {{ url('admin/bir-yazi-ekle') }} "><i class="fa fa-edit"></i>Tek Sayfa Yazı Ekle</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-gears"></i> Ayarlar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href=" {{ url('admin/ayarlar') }} "><i class="fa fa-gear"></i>Site Ayarları</a></li>
                      <li><a href=" {{ url('admin/profil') }} "><i class="fa fa-user"></i>Profil</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../media/profile_images/{!! Auth::user()->profile_picture !!}" alt="">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ url('admin/profil') }}"> Profil</a></li>
                    <li><a href="{{ url('admin/logout') }}"><i class="fa fa-sign-out pull-right"></i> Çıkış</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="clearfix"></div>
          @include('admin.error')
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright - Reserved Developer By Ali Kılıç
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    @include('admin.adminLinkJS')

  </body>
</html>
