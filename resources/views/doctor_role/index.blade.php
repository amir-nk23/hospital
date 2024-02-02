@extends('layout.master')

@section('content')

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">نقش دکتر</h3>
                            <div class="page-leftheader mr-md-auto">
                                <div class="btn btn-success d-flex align-items-end flex-wrap my-auto right-content">
                                    <a href="{{route('doctor.role.create')}}"  class="text-white">ثبت نقش</a>
                                    <i class="feather feather-plus fs-15 my-auto mr-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap table-primary mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white">ردیف</th>
                                <th class="text-white">نام نقش</th>
                                <th class="text-white">وضعیت</th>
                                <th class="text-white">تاریخ ثبت</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($DRs as $DR)


                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$DR->title}}</td>
                                        @if($DR->status==1)
                                            <td class="mt-2 badge badge-success">فعال</td>
                                        @endif
                                        @if($DR->status==0)
                                            <td class="mt-2 badge badge-danger">غیر فعال</td>
                                        @endif
                                        <td>{{$DR->created_at}}</td>
                                        <td>

                                            @can('update doctor_role')
                                            <a href="{{route('doctor.role.edit',$DR->id)}}" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            @endcan

                                            @can('delete doctor_role')
                                            <a href="{{route('doctor.role.destroy',$DR->id)}}" class="btn btn-danger">
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
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection













