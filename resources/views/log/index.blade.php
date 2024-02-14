@extends('layout.master')

@section('content')

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title"> لیست فعالیت</h3>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap table-primary mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white">ردیف</th>
                                <th class="text-white">عملیات</th>
                                <th class="text-white">دربخش</th>
                                <th class="text-white">توسط</th>
                                <th class="text-white">تاریخ ثبت</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($activities as $activity)

                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{__('custom.'.$activity->description)}}</td>
                                        <td>{{ __('custom.'.$activity->subject_type)}}</td>
                                        <td>{{$activity->causer->name}}</td>
                                        <td>{{$activity->created_at}}</td>

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













