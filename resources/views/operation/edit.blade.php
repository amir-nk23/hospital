@extends('layout.master')



@section('content')

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>ثبت عمل</h2>

        </div>

        <form method="post" action="{{route('operation.update',$operation->id)}}">

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

                    <label  class="label">اسم عمل</label>
                    <span style="color: red">*</span>

                    <input type="text" value="{{$operation->name}}" name="name" class="form-control">

                </div>

                <div class="col-6 form-group">

                    <label  class="label">قیمت</label>
                    <span style="color: red">*</span>

                    <input type="text" id="price" oninput="conertToToman('price','result')" value="{{$operation->price}}" name="price" class="form-control">

                    <div class="bold" id="result">


                    </div>

                </div>


                <div class="col-6 form-group">

                    <label class="label">وضعیت</label>
                    <span style="color: red">*</span>

                    <select name="status" class="form-control">

                        <option {{$operation->status == 1 ? 'selected':""}} value="1">فعال</option>
                        <option {{$operation->status == 0 ? 'selected':""}} value="0">غیر فعال</option>

                    </select>

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













