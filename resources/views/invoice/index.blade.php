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
                                <th class="text-white">مبلغ صورتحساب</th>
                                <th class="text-white">توضیحات</th>
                                <th class="text-white">تاریخ ثبت</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($invoices as $invoice)

                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$invoice->doctors->name}}</td>
                                        <td>{{$invoice->amount}}</td>
                                        <td>{{$invoice->description}}</td>
                                        <td>{{$invoice->created_at->format('Y-m-d')}}</td>
                                        <td>

                                            @can('update invoice')
                                            <a href="{{route('invoice.edit',$invoice->id)}}" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            @endcan

                                                <a href="{{route('invoice.show',$invoice->id)}}" class="btn btn-info">
                                                    <i class="feather feather-eye"></i>
                                                </a>
                                            @can('delete invoice')

                                                @if($invoice->status == 0)
                                            <a href="{{route('invoice.destroy',$invoice->id)}}" class="btn btn-danger">
                                                <i class="feather feather-trash"></i>
                                            </a>
                                                @endif
                                                @endcan
                                        </td>
                                    </tr>



                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    <!-- table-responsive -->
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection













