@extends('layout.master')



@section('content')

    <div class="row d-flex justify-content-around">

        <div class="col-xl-3 col-lg-6 mt-3 col-md-12">
            <div class="card" style=" box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);height:230px;">
                <div class="card-body">
                    <i class="mdi mdi-account-multiple-outline card-custom-icon icon-dropshadow-secondary text-secondary fs-60"></i>
                    <p class="bold text-over">تعداد پرسنل :</p>
                    <h2 class="mb-1 font-weight-bold">{{$doctors}}</h2>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 mt-3 col-md-12" >
            <div class="card" style=" box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);height: 230px">
                <div class="card-body">
                    <svg class="card-custom-icon text-primary icon-dropshadow-success mt-3" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                        <path opacity=".0" d="M3.31,11 L5.51,19.01 L18.5,19 L20.7,11 L3.31,11 Z M12,17 C10.9,17 10,16.1 10,15 C10,13.9 10.9,13 12,13 C13.1,13 14,13.9 14,15 C14,16.1 13.1,17 12,17 Z"></path>
                        <path d="M22,9 L17.21,9 L12.83,2.44 C12.64,2.16 12.32,2.02 12,2.02 C11.68,2.02 11.36,2.16 11.17,2.45 L6.79,9 L2,9 C1.45,9 1,9.45 1,10 C1,10.09 1.01,10.18 1.04,10.27 L3.58,19.54 C3.81,20.38 4.58,21 5.5,21 L18.5,21 C19.42,21 20.19,20.38 20.43,19.54 L22.97,10.27 L23,10 C23,9.45 22.55,9 22,9 Z M12,4.8 L14.8,9 L9.2,9 L12,4.8 Z M18.5,19 L5.51,19.01 L3.31,11 L20.7,11 L18.5,19 Z M12,13 C10.9,13 10,13.9 10,15 C10,16.1 10.9,17 12,17 C13.1,17 14,16.1 14,15 C14,13.9 13.1,13 12,13 Z"></path>
                    </svg>
                    <p class="bold text-over">مقدار صورتحساب بسته شده :</p>
                    <h2 class="mb-1 font-weight-bold">{{number_format($invoice)}}</h2>
                    <span class="mb-1 text-muted"><span class="text-success"></span> از ماه گذشته</span>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 mt-3 col-md-12">
            <div class="card" style=" box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);height: 230px">
                <div class="card-body">
                    <i class="mdi mdi-cash-multiple text-success card-custom-icon icon-dropshadow-secondary fs-60    "></i>
                    <p class="bold text-over">مقدار پرداختی :</p>
                    <h2 class="mb-1 font-weight-bold">{{number_format($payment)}}</h2>
                    <span class="mb-1 text-muted"><span class="text-success"></span> از ماه گذشته</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 mt-3 col-md-12">
            <div class="card" style=" box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);height: 230px">
                <div class="card-body">
                    <i class="mdi mdi-heart-outline card-custom-icon icon-dropshadow-success text-danger fs-60"></i>
                    <p class="bold text-over">تعداد جراحی  :</p>
                    <h2 class="mb-1 font-weight-bold">{{$surgery}}</h2>
                    <span class="mb-1 text-muted"><span class="text-success"></span> از ماه گذشته</span>
                </div>
            </div>
        </div>
    </div>



    <div class="row">


        <div class="card-body col-8 p-6">
            <div class="inbox-body">
                <div class="row">
                    <div class="col col-auto mb-4">
                        <div class="btn-group hidden-phone">
                            <a data-toggle="dropdown" href="#" class="btn btn-white" aria-expanded="false">
                                لیست پرداختی ها اخیر
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-inbox table-hover text-nowrap mb-0">

                        <thead>
                        <th>نام دکتر</th>
                        <th>نام عمل</th>
                        <th>مبلغ پرداختی</th>
                        <th>نوع پرداخت</th>
                        <th>تاریخ پرداخت</th>

                        </thead>

                        <tbody>

                        @foreach($paymentsDash as $pdash)

                            <tr class="">
                                <td class="view-message">{{$pdash->invoices->doctors->name}}</td>
                                <td class="view-message">@foreach($pdash->invoices->surgeries as $surgery)
                                        @foreach($surgery->operation as $operation)

                                            {{$operation->name}}-

                                        @endforeach

                                    @endforeach</td>
                                <td class="view-message text-right font-weight-semibold">
                                    {{number_format($pdash->amount)}}
                                </td>
                                <td class="view-message text-right font-weight-semibold">
                                    {{__('custom.'.$pdash->pay_type)}}
                                </td>
                                <td class="view-message text-right font-weight-semibold">
                                    {{$pdash->jalaliDate()}}
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


        <div class="list-group list-group-transparent mb-0 col-4 mail-inbox pb-3">
            <div class="mt-4 mb-4 ml-4 mr-4 text-center">
                <title href="#" class="badge badge-primary btn-block">اخرین فعالیت ها</title>
            </div>
            @foreach($logs as $log)
            <div  class="list-group-item list-group-item-action d-flex align-items-center">
                {{$log->description}}
            </div>

            @endforeach
        </div>


    </div>






@endsection













