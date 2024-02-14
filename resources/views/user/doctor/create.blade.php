@extends('layout.master')



@section('content')

    <div class="card-body mt-5" style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">


        <div>

            <h2>ثبت دکتر</h2>

        </div>

        <form method="post" action="{{route('doctor.store')}}">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @csrf
            <div class="row">

                <div class="col-4 form-group">

                    <label  class="label">نام و نام خانوادگی</label>
                    <span style="color: red">*</span>

                    <input type="text" value="{{old('name')}}" name="name" class="form-control">

                </div>


                <div class="col-4 form-group">

                    <label class="label">شماره تلفن</label>
                    <span style="color: red">*</span>

                    <input name="mobile" value="{{old('mobile')}}" type="text" class="form-control">

                </div>

                <div class="col-4 form-group">

                    <label class="label">تخصص</label>
                    <span style="color: red">*</span>
                    <select class="form-control"  name="speciality_id">
                        @foreach($specialities as $speciality)

                            <option value="{{$speciality->id}}" >{{$speciality->title}}</option>

                        @endforeach

                    </select>

                </div>

                <div class="col-4 form-group">

                    <label class="label">نقش</label>
                    <span style="color: red">*</span>
                    <select class="form-control js-example-basic-multiple-limit" multiple name="doctor_roles[]">
                        @foreach($doctorRoles as $DR)

                            <option value="{{$DR->id}}" >{{$DR->title}}</option>

                        @endforeach

                    </select>

                </div>


                <div class="col-4 form-group">

                    <label class="label">کد ملی</label>

                    <input name="national_code" value="{{old('national_code')}}" type="text" class="form-control">

                </div>





                <div class="col-4 form-group">

                    <label class="label">کد نظام پزشکی</label>

                    <input name="medical_number" value="{{old('medical_number')}}" type="text" class="form-control">

                </div>





                <div class="col-4 form-group">

                    <label class="label">رمز عبور</label>
                    <span style="color: red">*</span>

                    <input name="password" type="password" class="form-control">

                </div>

                <div class="col-4 form-group">

                    <label class="label">تکرار رمز عبور</label>
                    <span style="color: red">*</span>

                    <input name="password_confirmation" type="password" class="form-control">

                </div>


                <div class="col-4 form-group">

                    <label class="label">وضعیت</label>
                    <span style="color: red">*</span>
                    <select class="form-control" name="status">
                        <option value="1">فعال</option>
                        <option value="0">غیر فعال</option>

                    </select>

                </div>

                <div class="col-4 form-group">

                    <label class="label">ایمیل</label>
                    <input type="email" class="form-control" name="email">

                </div>

                <div  class="col-12">

                    <div class="mt-5 ml-5" style="text-align: left;">

                        <button class="btn btn-success">ثبت و ذخیره</button>


                    </div>

                </div>




            </div>

        </form>

    </div>

@endsection













