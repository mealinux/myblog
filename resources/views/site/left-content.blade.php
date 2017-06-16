@section('left_content')

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <div class="card" style="width:18rem;height:535px">
       <img class="card-img-top" src="../media/profile_images/{!! $admin->picture_name !!}">
      <div class="card-block">
          <h4 class="card-title"> <font size="5">{{ $admin->name }}</font><br/> <font size="3" color="gray"></font></h4>
      </div>
      <ul class="list-group list-group-flush">
        <a href="#"><li class="list-group-item" style="background-color:SlateBlue">
          <h3 style="color:white">{{ $admin->email }} <i class="fa fa-paper-plane text-right"></i></h3>
        </li></a>
        <a href="{{ $setting->github }}" target="_blank"><li class="list-group-item" style="background-color:Lavender">
          <h3 style="color:DimGray">GitHub <i class="fa fa-github-square text-right"></i></h3>
        </li></a>
        <a href="{{ $setting->linkedin }}" target="_blank"><li class="list-group-item" style="background-color:DodgerBlue">
          <h3 style="color:white">Linkedin <i class="fa fa-linkedin-square text-right"></i></h3>
        </li></a>
        <a href="{{ $setting->bitbucket }}" target="_blank"><li class="list-group-item" style="background-color:RoyalBlue">
          <h3 style="color:white">BitBucket <i class="fa fa-bitbucket-square text-right"></i></h3>
        </li></a>
        <a href="{{ $setting->google }}" target="_blank"><li class="list-group-item" style="background-color:LightCoral">
          <h3 style="color:white">Google+ <i class="fa fa-google-plus-square text-right"></i></h3>
        </li></a>
        <a href="{{ $setting->teknoseyir }}" target="_blank"><li class="list-group-item" style="background-color:LightBlue">
          <h3 style="color:white">Twitter <i class="fa fa-twitter text-right"></i></h3>
        </li></a>
      </ul>
    </div>
  </div>
  <div class="col-md-1"></div>
</div>

@endsection
