@extends('layout.master')

@section('content')

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">تخصص</h3>
                            <div class="page-leftheader mr-md-auto">
                                <div class="btn btn-success d-flex align-items-end flex-wrap my-auto right-content">
                                    <a href="{{route('speciality.create')}}"  class="text-white">ثبت تخصص</a>
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
                                <th class="text-white">نام تخصص</th>
                                <th class="text-white">وضعیت</th>
                                <th class="text-white">تاریخ ثبت</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($specialities as $speciality)


                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$speciality->title}}</td>
                                        @if($speciality->status==1)
                                            <td class="mt-2 badge badge-success">فعال</td>
                                        @endif
                                        @if($speciality->status==0)
                                            <td class="mt-2 badge badge-danger">غیر فعال</td>
                                        @endif
                                        <td>{{$speciality->created_at}}</td>
                                        <td>

                                            <a href="{{route('speciality.edit',$speciality->id)}}" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>

                                            <a href="{{route('speciality.destroy',$speciality->id)}}" class="btn btn-danger">
                                                <i class="feather feather-trash"></i>
                                            </a>


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













