@extends('layout.master')

@section('content')

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between border-bottom-0">


                        <h3 class="text-muted">  <span class=""> گزارش بیمه :</span>  "{{$name}}"از تاریخ <span dir = rtl>{{$startDateshow}}</span>  تا تاریخ <span dir = rtl>{{$endDateshow}}</span></h3>

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
                                    <th>کد ملی بیمار</th>
                                    <th>عمل ها</th>
                                    <th>ملبغ(تومان)</th>
                                    <th>سهم بیمه(تومان)</th>
                                    <th>تاریخ تریخیص</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($surgeries as $surgery)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$surgery->patient_name}}</td>
                                    <td>{{$surgery->patient_national_code}}</td>
                                    <td>@foreach($surgery->operation as $operation){{$operation->name}}-@endforeach</td>
                                    <td>{{number_format($surgery->getTotalPrice())}}</td>
                                    <td class="text">{{number_format($surgery->getDoctorInsuranceAmount($id))}}</td>
                                    <td class="text">{{$surgery->jalaliDate('released_at')}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div><!-- bd -->


                    </div><!-- bd -->

                </div>
                <div class="col-12 inline d-flex">


                        <div class="col-4"> جمع کل عمل ها(تومان) :  {{number_format($totalPrice)}}</div>

                        <div class="col-4 ">   جمع کل پرداختی بیمه(تومان) : {{number_format(\App\Models\Surgery::getTotalInsuranceAmount($id,$totalPrice))}}</div>


                </div>
                </div>
            </div>
        </div>
        </div>

    @endsection













