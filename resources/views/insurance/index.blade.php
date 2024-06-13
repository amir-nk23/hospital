@extends('layout.master')

@section('content')

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">لیست بیمه</h3>
                            <div class="page-leftheader mr-md-auto">
                                <div class="btn btn-success d-flex align-items-end flex-wrap my-auto right-content">
                                    <a href="{{route('insurance.create')}}"  class="text-white">ثبت بیمه</a>
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
                                <th class="text-white">نام بیمه</th>
                                <th class="text-white">نوع بیمه</th>
                                <th class="text-white">درصد تخقیف</th>
                                <th class="text-white">وضعیت</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($insurances as $insurance)

                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$insurance->name}}</td>
                                        <td>{{__('custom.'.$insurance->type)}}</td>
                                        <td>{{$insurance->percentage}}%</td>
                                        <td>
                                        @if($insurance->status==1)
                                                <span class="mt-2 badge badge-success">غیر فعال</span>
                                        @endif
                                        @if($insurance->status==0)
                                            <span class="mt-2 badge badge-danger">غیر فعال</span>
                                        @endif
                                        </td>
                                        <td>
                                            @can('update insurance')
                                            <a href="{{route('insurance.edit',$insurance->id)}}" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            @endcan

                                            @can('delete insurance')

                                                <form style="display: inline" action="{{route('insurance.destroy',$insurance->id)}}" method="post">

                                                    @csrf
                                                    @method('delete')
                                                    <button  class="btn btn-danger">
                                                        <i class="feather feather-trash"></i>
                                                    </button>
                                                </form>

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

                                {{$insurances->onEachSide(3)->links()}}

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













