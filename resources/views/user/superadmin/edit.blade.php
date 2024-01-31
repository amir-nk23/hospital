@extends('layout.master')



@section('content')

    <div class="card-body mt-5" style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">

        <div>

            <h2>ویرایش ادمین</h2>

        </div>

        <form method="post" action="{{route('superadmin.update',$user->id)}}">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @method('put')
            @csrf
            <div class="row">

                <div class="col-4 form-group">

                    <label  class="label">نام و نام خانوادگی</label>
                    <span style="color: red">*</span>

                    <input type="text" value="{{$user->name}}" name="name" class="form-control">

                </div>


                <div class="col-4 form-group">

                    <label class="label">تلفن</label>
                    <span style="color: red">*</span>

                    <input name="mobile" value="{{$user->mobile}}" type="text" class="form-control">

                </div>



                <div class="col-4 form-group">

                    <label class="label">ایمیل</label>

                    <input name="email" value="{{$user->email}}" type="text" class="form-control">

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


            </div>


            <div  class="mt-3">

                <label>مجوزها</label>
                <span style="color: red">*</span>


                <div style="display: flex;flex-wrap: wrap;">


                    @foreach($permissions as $permission)


                        <div  style="flex-basis: 16.66%">
                            <label>{{$permission->label}}</label>
                            <input type="checkbox" name="permissions[]" value="{{$permission->name}}" {{in_array($permission->name,array_column($userPermissions,'name')) ? 'checked' : ''}} class="box-content">
                        </div>
                    @endforeach

                </div>


                <div class="mt-5 ml-5" style="text-align: left;">

                    <button class="btn btn-warning">ویرایش</button>

                </div>

            </div>


        </form>

    </div>

@endsection













