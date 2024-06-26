@extends('layout.master')



@section('content')

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>ویرایش پرداخت</h2>

        </div>

        <form method="post" action="{{route('payment.update',$payment->id)}}" enctype="multipart/form-data">

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

                    <label  class="label">مقدار پرداختی(تومان)</label>
                    <span style="color: red">*</span>

                    <input type="text" oninput="conertToToman('amount','result')" id="amount" value="{{number_format($payment->amount)}}" name="amount" class="form-control">

                    <div class="bold" id="result">


                    </div>

                </div>





                <div class="col-6 form-group">

                    <label  class="label">وضعیت پرداخت</label>
                    <span style="color: red">*</span>


                    <select class="form-control" name="status">

                        <option class="bg-success" value="1">موفق</option>
                        <option class="bg-danger" value="0">ناموفق</option>

                    </select>


                </div>



                <div class="col-6 form-group">

                    <label class="label">نوع پرداخت</label>
                    <span style="color: red">*</span>

                    <select name="pay_type" class="form-control">

                        <option {{$payment->pay_type == 'cheque'?'selected':''}} value="cheque">چک</option>
                        <option {{$payment->pay_type == 'cash'?'selected':''}} value="cash">نقدی</option>

                    </select>

                </div>

                </div>



                <div class="col-12 form-group">

                    <label  class="label">عکس رسید</label>
                    <span style="color: red">*</span>

                    <input type="file"  name="receipt" class="form-control">


                </div>


                <div  class="col-12">

                    <div class="mt-5 ml-5" style="text-align: left;">

                        <button class="btn btn-warning">پرداخت</button>


                    </div>

                </div>


            </div>





        </form>

    </div>

@endsection













