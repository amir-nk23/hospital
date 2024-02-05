@extends('layout.master')



@section('content')

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>ثبت بیمه</h2>

        </div>

        <form method="post" action="{{route('insurance.store')}}">

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

                    <label  class="label">نام بیمه</label>
                    <span style="color: red">*</span>

                    <input type="text" value="{{old('name')}}" name="name" class="form-control">

                </div>


                <div class="col-6 form-group">

                    <label class="label">نوع بیمه</label>
                    <span style="color: red">*</span>

                    <select name="type" class="form-control">

                        <option value="basic">پایه</option>
                        <option value="supplementary">تکمیلی</option>

                    </select>

                </div>

                <div class="col-6 form-group">

                    <label  class="label">درصد تخفیف</label>
                    <span style="color: red">*</span>

                    <input type="text" value="{{old('percentage')}}" name="percentage" class="form-control">

                </div>


                <div class="col-6 form-group">

                    <label class="label">وضعیت</label>
                    <span style="color: red">*</span>

                    <select name="status" class="form-control">

                        <option value="1">فعال</option>
                        <option value="0">غیر فعال</option>

                    </select>

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













