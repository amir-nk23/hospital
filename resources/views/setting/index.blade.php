@extends('layout.master')
@section('content')
  <div class="col-12 d-flex mt-5">


{{--      <div class="col-6">--}}
{{--          <div class="card-s shadow overflow-hidden  bg-transparent position-relative">--}}
{{--              <a href="{{ route('admin.setting.general')}}" style="cursor: pointer">--}}

{{--                  <div class="card-body p-0 ">--}}

{{--                      <figure class="m-0 overflow-hidden general-container w-100 rounded-3"  style="width:516px;height:400px;">--}}


{{--                          <img class="w-100 h-100 general rounded-3" src="{{asset('/setting/gear.jpg')}}"   alt="">--}}

{{--                      </figure>--}}

{{--                  </div>--}}
{{--                  <span class="card-footer-s position-absolute p-0 m-0 d-flex justify-content-center align-items-center"> <h2  class="h3 display-2">عمومی</h2></span>--}}
{{--              </a>--}}
{{--          </div>--}}
{{--      </div>--}}



{{--      <div class="col-6 " >--}}
{{--        <div class="card-s shadow rounded-2 overflow-hidden">--}}
{{--          <a href="{{ route('admin.setting.social')}}" style="cursor: pointer">--}}

{{--              <div class="card-body p-0">--}}

{{--                  <figure class="m-0 overflow-hidden social-container  w-100" style="width:516px;height:400px;">--}}


{{--                      <img class="w-100 h-100 social"  src="{{asset('/setting/social.jpg')}}" alt="">--}}

{{--                  </figure>--}}

{{--              </div>--}}
{{--              <span class="card-footer-s position-absolute p-0 m-0 d-flex justify-content-center align-items-center"> <h4  class="h3 display-2">شبکه اجتماعی</h4></span>--}}
{{--          </a>--}}
{{--        </div>--}}
{{--      </div>--}}

{{--  </div>--}}



  <div class="col-6">
          <div class="card shadow overflow-hidden  bg-transparent position-relative" >
              <a href="{{ route('setting.general')}}" style="cursor: pointer">

                  <div class="card-body bg bg-success" style="height:300px;text-align: center">

                      <h1 class="text-white"><i><img height="40px" src="{{asset('image/exclamation.ico')}}"></i></h1>
                      <h1 class="text-white display-3">تنظیمات عمومی</h1>

                  </div>

              </a>
          </div>
      </div>


      <div class="col-6">
          <div class="card shadow overflow-hidden  bg-transparent position-relative" >
              <a href="{{ route('setting.social')}}" style="cursor: pointer">

                  <div class="card-body bg bg-warning" style="height:300px;text-align: center">

                      <h1 class="text-white"><i><img height="40px" src="{{asset('image/exclamation.ico')}}"></i></h1>
                      <h1 class=" text-white display-3">شبکه اجتماعی</h1>

                  </div>

              </a>
          </div>
      </div>

  </div>

@endsection
