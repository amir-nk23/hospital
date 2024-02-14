@extends('layout.master')



@section('content')

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>ویرایش نقش</h2>

        </div>

        <form method="post" action="{{route('doctor.role.update',$doctorRole->id)}}">
            @method('patch')

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

                <div class="col-6 form-group">

                    <label  class="label">نام نقش</label>
                    <span style="color: red">*</span>

                    <input type="text" value="{{$doctorRole->title}}" name="title" class="form-control">

                </div>


                <div class="col-6 form-group">

                    <label class="label">وضعیت</label>
                    <span style="color: red">*</span>

                    <select name="status" class="form-control">

                        <option {{$doctorRole->status==1 ? 'selected' :''}} value="1">فعال</option>
                        <option {{$doctorRole->status==0 ? 'selected' :''}} value="0">غیر فعال</option>

                    </select>

                </div>


                <div class="col-6 form-group">

                    <label class="label">الزامی بودن</label>
                    <input type="checkbox" name="required">

                </div>

                <div  class="col-12">

                    <div class="mt-5 ml-5" style="text-align: left;">

                        <button class="btn btn-warning">ویرایش</button>


                    </div>

                </div>


            </div>


        </form>

    </div>

@endsection













