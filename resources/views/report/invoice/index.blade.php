@extends('layout.master')

@section('content')

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between border-bottom-0">

                        <h3 class="text-muted">  <span class=""> گزارش مالی پزشک :</span>  "{{$DoctorSurgeries[0]->doctors->name}}"از تاریخ <span dir = rtl>{{$startDateshow}}</span>  تا تاریخ <span dir = rtl>{{$endDateshow}}</span></h3>

                        <div >

                            <button class="btn btn-info"  onclick="javascript:window.print();"><i class="si si-printer"></i></button>
{{--                            <button class="btn btn-warning"  onclick="javascript:window.print();"><i class="si si-printer"></i></button>--}}

                        </div>


                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped card-table table-vcenter text-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام بیمار</th>
                                    <th>بیمه پایه</th>
                                    <th>بیمه تکمیلی</th>
                                    <th>عمل ها</th>
                                    <th>ملبغ(تومان)</th>
                                    <th>صورتحساب</th>
                                    <th>وضعیت تسویه</th>
                                    <th>تاریخ جراحی</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($DoctorSurgeries as $doctorsurgery)

                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$doctorsurgery->surgery->patient_name}}</td>
                                    <td>@if($doctorsurgery->surgery->basicInsurance)  {{$doctorsurgery->surgery->basicInsurance->name}} @else <span class="text-danger">ندارد</span> @endif</td>
                                    <td>@if($doctorsurgery->surgery->suppinsurance)  {{$doctorsurgery->surgery->suppinsurance->name}} @else <span class="text-danger">ندارد</span> @endif</td>
                                    <td>@foreach($doctorsurgery->surgery->operation as $operation) {{$operation->name}} - @endforeach</td>
                                    <td class="text">{{number_format($doctorsurgery->amount)}}</td>
                                    <td class="text-success">@if($doctorsurgery->doctor_id) <span class="badge badge-success">دارد</span> @else <span class="badge badge-danger">ندارد</span> @endif</td>
                                    <td class="text-success">@if($doctorsurgery->invoice) @if($doctorsurgery->invoice->status ==1) <span class="text-primary">تسویه شده</span> @endif @if($doctorsurgery->invoice->status == 0) <span class="text-warning   ">تسویه نشده</span> @endif @endif</td>
                                    <td class="text">{{$doctorsurgery->surgery->jalaliDate('surgeried_at')}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div><!-- bd -->


                    </div><!-- bd -->

                </div>
                <div class="col-12 inline d-flex">

                    <div class="col-4"> جمع کل عمل ها(تومان) :  {{number_format($DoctorSurgeries->sum('amount'))}}</div>
                    <div class="col-4 text-success"> جمع کل پرداختی ها(تومان) :  {{number_format($pay)}}</div>
                    <div class="col-4 text-danger"> جمع باقیمانده : {{number_format(   $DoctorSurgeries->sum('amount') - $pay)}} </div>

                </div>
                </div>
            </div>
        </div>
        </div>

    @endsection













