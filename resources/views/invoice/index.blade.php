@extends('layout.master')

@section('content')

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">لیست صورتحساب</h3>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap table-primary mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white">ردیف</th>
                                <th class="text-white"> نام پزشک </th>
                                <th class="text-white">مبلغ صورتحساب(تومان)</th>
                                <th class="text-white">مبلغ پرداختی(تومان)</th>
                                <th class="text-white">مبلغ مانده(تومان)</th>
                                <th class="text-white">توضیحات</th>
                                <th class="text-white">تاریخ ثبت</th>
                                <th class="text-white">وضعیت</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($invoices as $invoice)

                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$invoice->doctors->name}}</td>
                                        <td>{{number_format($invoice->amount)}}</td>
                                        <td class="text-success">{{number_format($invoice->payments->where('status',1)->sum('amount'))}}</td>
                                        <td class="text-danger">{{number_format($invoice->amount-$invoice->payments->where('status',1)->sum('amount'))}}</td>
                                        <td>{{$invoice->description}}</td>
                                        <td>{{$invoice->jalaliDate()}}</td>
                                        @if($invoice->status==1)
                                            <td class="mt-2 badge badge-success">پرداخت شده</td>
                                        @endif
                                        @if($invoice->status==0)
                                            <td class="mt-2 badge badge-danger">پرداخت نشده</td>
                                        @endif
                                        <td>

                                            @can('update invoice')
                                            <a href="{{route('invoice.edit',$invoice->id)}}" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            @endcan

                                                <a href="{{route('invoice.show',$invoice->id)}}" class="btn btn-info">
                                                    <i class="feather feather-eye"></i>
                                                </a>
                                                <!-- Button trigger modal -->
                                                <a href="{{route('payment.create',$invoice->id)}}" class="btn btn-success">
                                                    <i class="feather feather-dollar-sign"></i>

                                                </a>


{{--                                                <button  id="#myBtn-{{$invoice->id}}" class="btn btn-success">--}}
{{--                                                    <i class="feather feather-dollar-sign"></i>--}}
{{--                                                </button>--}}
                                            @can('delete invoice')


                                            <a @disabled($invoice->isDeletable()) href="{{route('invoice.destroy',$invoice->id)}}" class="btn @if($invoice->isDeletable()) btn-gray  @else btn-danger @endif" >
                                                <i class="feather feather-trash"></i>
                                            </a>

                                                @endcan
                                        </td>
                                    </tr>

                                @endforeach


                                </tbody>
                            </table>

                        </div>
                        <!-- table-responsive -->

                    <div class="card-body">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-success mb-0">

                                {{$invoices->onEachSide(3)->links()}}

                            </ul>
                        </nav>
                        <!-- pagination-wrapper -->
                    </div>

                </div>
            </div>
        </div>
        </div>


    @endsection













