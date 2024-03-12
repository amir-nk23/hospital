@extends('layout.master')



@section('content')

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>ویرایش صورتحساب</h2>

        </div>

        <form method="post" action="{{route('invoice.update',$invoice->id)}}">

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

                <div class="col-12 form-group">

                    <label  class="label">توضیحات</label>
                    <span style="color: red">*</span>

                    <textarea class="form-control" rows="10" name="description">{{$invoice->description}}</textarea>

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













