@extends('layout.master')

@section('content')

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">

                    <div class="col-12" style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                        <div class="card">
                            <div class="card-header text-center" style="border-bottom: 2px; border-bottom-style:groove;"><h2> مشخصات صورتحساب</h2></div>

                            <div class="card-body">

                                <div class="col-12">

                                    <table class="table card-table table-vcenter text-nowrap table-primary mb-0">
                                        <thead class="bg-primary text-white">
                                        <tr>
                                            <th class="text-white">ردیف</th>
                                            <th class="text-white"> نام پزشک </th>
                                            <th class="text-white">مبلغ صورتحساب</th>
                                            <th class="text-white">توضیحات</th>
                                            <th class="text-white">تاریخ ثبت</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{$invoice->doctors->name}}</td>
                                                <td>{{number_format($invoice->amount)}}</td>
                                                <td>{{$invoice->description}}</td>
                                                <td>{{$invoice->jalaliDate()}}</td>
                                            </tr>

                                        </tbody>
                                    </table>



                                </div>



                            </div>


                    </div>




                </div>
            </div>
        </div>


            <div class="col-md-12 col-lg-12 mt-5">

                <div class="col-12" style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                    <div class="card">
                        <div class="card-header text-center" style="border-bottom: 2px; border-bottom-style:groove;"><h2> عمل ها</h2></div>

                        <div class="card-body">

                            <div class="col-12">

                                <table class="table card-table table-vcenter text-nowrap table-primary mb-0">
                                    <thead class="bg-primary text-white">
                                    <tr>
                                        <th class="text-white">ردیف</th>
                                        <th class="text-white"> نام بیمار </th>
                                        <th class="text-white">کد ملی</th>
                                        <th class="text-white">شماره پرونده</th>
                                        <th class="text-white">مبلغ(تومان)</th>
                                        <th class="text-white">تاریخ ثبت</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($invoice->surgery as $surgery)

                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$surgery->patient_name}}</td>
                                        <td>{{$surgery->patient_national_code}}</td>
                                        <td>{{$surgery->document_number}}</td>
                                        <td>{{number_format($surgery->getDoctorQuotaInvoice($surgery->pivot->doctor_role_id))}}</td>
                                        <td>{{$surgery->jalaliDate()}}</td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>
    </div>


@endsection













