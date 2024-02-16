@extends('layout.master')

@section('content')

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title"> لیست عمل ها ی دکتر {{$doctor_surgeries[0]->doctors->name}}</h3>
{{--                            <div class="page-leftheader mr-md-auto">--}}
{{--                                <div class="btn btn-success d-flex align-items-end flex-wrap my-auto right-content">--}}
{{--                                    <a href="{{route('surgery.create')}}" class="text-white">ثبت جراحی</a>--}}
{{--                                    <i class="feather feather-plus fs-15 my-auto mr-2"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                    <form method="get">

                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap table-primary mb-0">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-white">/</th>
                                    <th class="text-white">ردیف</th>
                                    <th class="text-white">تاریخ عمل</th>
                                    <th class="text-white">تاریخ ترخیص</th>
                                    <th class="text-white">عمل ها</th>
                                    <th class="text-white">جمع قیمت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                $total = 0;

                                @endphp
                                @foreach($doctor_surgeries as $DR)



                                    <tr>
                                        <td><input type="checkbox" name="invoice_id[]" value="{{$DR->id}}"></td>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$DR->surgery->surgeried_at}}</td>
                                        <td>{{$DR->surgery->released_at}}</td>
                                        <td>@foreach($DR->surgery->operation as $operation) {{$operation->name.','}} @endforeach</td>
                                        <td>{{number_format($DR->getDoctorQuotaAmount())}}</td>
                                    </tr>

                                    @php

                                    $total += $DR->getDoctorQuotaAmount()
                                        @endphp
                                @endforeach

                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <th>جمع کل</th>
                                <td>{{number_format($total)}}</td>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center mt-5">

                            <button type="submit" class="btn btn-warning">تسویه</button>

                        </div>

                    </form>


                    <!-- table-responsive -->
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection













