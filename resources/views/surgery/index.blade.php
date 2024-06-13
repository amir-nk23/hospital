@extends('layout.master')

@section('content')

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">لیست جراحی</h3>
                            <div class="page-leftheader mr-md-auto">
                                <div class="btn btn-success d-flex align-items-end flex-wrap my-auto right-content">
                                    <a href="{{route('surgery.create')}}" class="text-white">ثبت جراحی</a>
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
                                <th class="text-white">نام و نام خانوادگی</th>
                                <th class="text-white">کد ملی بیمار</th>
                                <th class="text-white">بیمه تکمیلی</th>
                                <th class="text-white">بیمه پایه</th>
                                <th class="text-white">شماره پرونده</th>
                                <th class="text-white">هزینه عمل (تومان)</th>
                                <th class="text-white">توضیحات</th>
                                <th class="text-white">تاریخ عمل</th>
                                <th class="text-white">تاریخ ترخیص</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($surgeries as $surgery)


                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$surgery->patient_name}}</td>
                                        <td>{{$surgery->patient_national_code}}</td>
                                        <td>@if($surgery->suppInsurance != null){{$surgery->suppInsurance->name}}@endif</td>
                                        <td>{{$surgery->basicInsurance->name}}</td>
                                        <td>{{$surgery->document_number}}</td>
                                        <td>

                                                {{number_format($surgery->operation->sum('pivot.amount'))}}

                                        </td>
                                        <td>{{$surgery->description}}</td>
                                        <td>{{$surgery->jalaliDate('surgeried_at')}}</td>
                                        <td>{{$surgery->jalaliDate('released_at')}}</td>
                                        <td>

                                                <a href="{{route('surgery.edit',$surgery->id)}}"  class="btn btn-warning">
                                                    <i class="feather feather-edit"></i>
                                                </a>

                                            <form style="display: inline" action="{{route('surgery.destroy',$surgery->id)}}" method="post">

                                                @method('delete')
                                                @csrf
                                                <button  class="btn btn-danger">
                                                    <i class="feather feather-trash"></i>
                                                </button>

                                            </form>



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

                                {{$surgeries->onEachSide(3)->links()}}

                            </ul>
                        </nav>
                        <!-- pagination-wrapper -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection













