@extends('layout.master')



@section('content')

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>پرداخت</h2>

        </div>

        <form method="post" action="{{route('payment.store')}}" enctype="multipart/form-data">

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

                    <label  class="label">مقدار پرداختی</label>
                    <span style="color: red">*</span>

                    <input type="text" oninput="conertToToman('amount','result')" id="amount" value="{{old('amount')}}" name="amount" class="form-control">

                    <div class="bold" id="result">


                    </div>

                </div>



                    <input type="text" value="{{$id}}" name="invoice_id" hidden class="form-control">




                <div class="col-6 form-group">

                    <label class="label">نوع پرداخت</label>
                    <span style="color: red">*</span>

                    <select name="pay_type" id="pay_type"  onchange="checkoption()" class="form-control">

                        <option value="cheque">چک</option>
                        <option value="cash">نقدی</option>

                    </select>

                </div>


                <div class="col-6 form-group">

                    <label class="label">تاریح سرسید چک</label>
                    <span style="color: red">*</span>

                    <input type="text" class="form-control fc-datepicker"   id="due_date_show" name="due_date">

                    <input type="text" class="form-control fc-datepicker"  hidden id="due_date" name="due_date">

                </div>



                <div class="col-12 form-group">

                    <label  class="label">عکس رسید</label>
                    <span style="color: red">*</span>

                    <input type="file"  name="receipt"  id="cheque" class="form-control">

                    <div class="bold" id="result">


                    </div>

                </div>


                <div  class="col-12">

                    <div class="mt-5 ml-5" style="text-align: left;">

                        <button class="btn btn-success">پرداخت</button>


                    </div>

                </div>


            </div>





        </form>

    </div>

@endsection













