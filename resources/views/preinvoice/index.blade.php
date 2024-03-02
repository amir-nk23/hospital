@extends('layout.master')



@section('content')

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>پرداخت پزشک</h2>

        </div>

        <form method="get" action="{{route('preinvoice.search')}}">


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

                    <label  class="label">نام دکتر</label>
                    <span style="color: red">*</span>

                    <select name="doctor_id" class="form-control">

                        <option selected disabled>لطفا نام پزشک را انتخاب کنید</option>
                        @foreach($doctors as $doctor)

                        <option value="{{$doctor->id}}">{{$doctor->name}}</option>

                        @endforeach
                    </select>

                </div>


                <div class="col-6 form-group">

                    <label class="label">تاریخ مبدا</label>
                    <span style="color: red">*</span>

                    <input type="date" class="form-control" name="start_date">


                </div>


                <div class="col-6 form-group">

                    <label class="label">تاریخ ترخیص</label>
                    <span style="color: red">*</span>

                    <input type="date" class="form-control" name="end_date">


                </div>



                <div  class="col-12">

                    <div class="mt-5 ml-5" style="text-align: left;">

                        <button class="btn btn-primary">فیلتر</button>


                    </div>

                </div>


            </div>





        </form>

    </div>

@endsection













