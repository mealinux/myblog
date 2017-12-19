@extends('admin.master')

@section('content')
  @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
  @endif
  <div class="x_panel">
    <div class="x_title">
        <h2>Logo</h2>
        <div class="clearfix"></div>
      </div>
    <div class="x_content">
      <p class="text-muted font-13 m-b-30">
        </p>
        <div class="row">
        <div class="col-md-4">
        <a href="http://www.alikilic.com.tr" target="_blank"> <img src="../media/logo_images/{{ (($setting->logo == '') || ($setting->logo == null)) ? '' :  $setting->logo }}" alt=""></a>
        <form method="post" action="" enctype="multipart/form-data">
          {{ csrf_field() }}

        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="col-md-12">
              <input type="file" name="logo" accept="image/*">
              <p class="help-block">Şu boyuttaa</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
        </div>
        </div>
  </div>
</div>
  <div class="x_panel">
    <div class="x_title">
        <h2>Sosyal Medya Linkleri</h2>
        <div class="clearfix"></div>
      </div>
    <div class="x_content">
      <p class="text-muted font-13 m-b-30">
        </p>
            <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
              <div class="input-group">
                <span class="input-group-addon"></i></span>
                <input type="text" name="teknoseyir" value="{{ (($setting->teknoseyir == '') || ($setting->teknoseyir == null)) ? '' : $setting->teknoseyir }}" class="form-control" placeholder="">
                <span class="input-group-addon">Twitter</span>
              </div>
            </div>
            <div class="col-md-1">

            </div>
            </div>
            <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
              <div class="input-group">
                <span class="input-group-addon"></i></span>
                <input type="text" class="form-control"  value="{{ (($setting->linkedin == '') || ($setting->linkedin == null)) ? '' : $setting->linkedin }}" name="linkedin" placeholder="">
                <span class="input-group-addon"><i class="fa fa-linkedin"></i> Linkedin </span>
              </div>
            </div>
            <div class="col-md-1">

            </div>
            </div>
            <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
              <div class="input-group">
                <span class="input-group-addon"></i></span>
                <input type="text" class="form-control"  value="{{ (($setting->github == '') || ($setting->github == null)) ? '' : $setting->github }}" name="github" placeholder="">
                <span class="input-group-addon"><i class="fa fa-github"></i> GitHub </span>
              </div>
            </div>
            <div class="col-md-1">

            </div>
            </div>
            <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
              <div class="input-group">
                <span class="input-group-addon"></i></span>
                <input type="text" class="form-control" value="{{ (($setting->bitbucket == '') || ($setting->bitbucket == null)) ? '' : $setting->bitbucket }}" name="bitbucket" placeholder="">
                <span class="input-group-addon"><i class="fa fa-bitbucket"></i> BitBucket </span>
              </div>
            </div>
            <div class="col-md-1">

            </div>
            </div>
            <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
              <div class="input-group">
                <span class="input-group-addon"></i></span>
                <input type="text" class="form-control" value="{{ (($setting->google == '') || ($setting->google == null)) ? '' : $setting->google }}" name="google" placeholder="">
                <span class="input-group-addon"> <i class="fa fa-google-plus"></i> Google+ </span>
              </div>
            </div>
            <div class="col-md-1">

            </div>
            </div>

            </div>
          </div>
          <div class="x_panel">
            <div class="x_title">
                <h2>Versiyon</h2>
                <div class="clearfix"></div>
              </div>
            <div class="x_content">
              <p class="text-muted font-13 m-b-30">
                </p>

                <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon">v.</span>
                    <input type="text" class="form-control" value="{{ (($setting->version == '') || ($setting->version == null)) ? '' : $setting->version }}" name="version" placeholder="" data-inputmask="'mask': '9.9.99'">
                    <span class="input-group-addon"> <i class="fa fa-level-up"></i></span>
                  </div>
                </div>
                <div class="col-md-4">

                </div>
                </div>

            </div>
          </div>
          <div class="x_panel">
            <div class="x_title">
                <h2>Footer</h2>
                <div class="clearfix"></div>
              </div>
            <div class="x_content">
              <p class="text-muted font-13 m-b-30">
                </p>

                <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="text" class="form-control" value="{{ (($setting->footer == '') || ($setting->footer == null)) ? '' : $setting->footer }}" name="footer" placeholder="">
                    <span class="input-group-addon"><i class="fa fa-copyright"></i></span>
                  </div>
                </div>
                <div class="col-md-3">

                </div>
                </div>

            </div>
          </div>
          <div class="x_panel">
            <div class="x_content">
              <p class="text-muted font-13 m-b-30">
                </p>

                <div class="row">
                <div class="col-md-4">
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Kaydet</button>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">

                </div>
                </div>
              </form>
          </div>
</div>
@endsection
