<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ali Kılıç </title>

    <!-- Bootstrap -->
    <link href="{{ url('./vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('./vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('./vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ url('./vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ url('./build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

            <div class="login_wrapper">
              <div class="animate form login_form">
                @if (Session::has('message'))
                  <div class="alert alert-danger">
                      {{ Session::get('message') }}
                  </div>
                @endif
                <section class="login_content">
                  <form method="post" action="">
                    {{ csrf_field() }}
                    <h1>Login Formu</h1>
                    <div>
                      <input type="text"  name="email" class="form-control" placeholder="E-Mail" required />
                    </div>
                    <div>
                      <input type="password"  name="password" class="form-control" placeholder="Şifre" required />
                    </div>
                    <div>
                      <button type="submit" name="button" class="btn btn-default">Giriş</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                      <div class="clearfix"></div>
                      <br />
                    </form>
                      <div>
                        <h1><i class="fa fa-code"></i> Ali KILIÇ - ALINUX</h1>
                        <p>©2017 All Rights Reserved.</p>
                      </div>
                    </div>

                </section>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
