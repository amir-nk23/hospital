@extends('layout.master')

@section('content')

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">لیست پرداختی</h3>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap table-primary mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white">ردیف</th>
                                <th class="text-white">نام دکتر</th>
                                <th class="text-white"> نام عمل </th>
                                <th class="text-white">مبلغ پرداختی(تومان)</th>
                                <th class="text-white">نوع پرداخت</th>
                                <th class="text-white">عکس رسید</th>
                                <th class="text-white">تاریخ سررسید</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($payments as $payment)

                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$payment->invoices->doctors->name}}</td>
                                        <td>@foreach($payment->invoices->surgeries as $surgery)
                                                @foreach($surgery->operation as $operation)

                                                    {{$operation->name}}

                                                @endforeach

                                            @endforeach
                                        </td>
                                        <td>{{number_format($payment->amount)}}</td>
                                        <td>{{__('custom.'.$payment->pay_type)}}</td>
                                        <td><img width="100px" height="100px" src="{{asset('storage/'.$payment->receipt)}}" alt=""></td>
                                        <td>{{$payment->due_date}}</td>
                                        <td>
                                            @can('update payment')
                                            <a href="{{route('invoice.edit',$payment->id)}}" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            @endcan

                                        </td>
                                    </tr>


{{--                                    			<!--Change password Modal -->--}}
{{--                                    <!-- The Modal -->--}}
{{--                                    <div id="myModal{{}}" class="modal">--}}

{{--                                        <!-- Modal content -->--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header" >--}}
{{--                                                <h2 class="text">پرداخت</h2>--}}
{{--                                                <span class="close">&times;</span>--}}

{{--                                            </div>--}}
{{--                                            <div class="modal-body">--}}
{{--                                                <form>--}}

{{--                                                    <div class="form-group">--}}
{{--                                                        <label>مبلغ :</label>--}}
{{--                                                        <input class="form-control">--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group">--}}
{{--                                                        <label>مبلغ :</label>--}}
{{--                                                        <textarea class="form-control" name="description"></textarea>--}}
{{--                                                    </div>--}}



{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    			<!-- End Change password Modal  -->--}}


                                @endforeach

                                </tbody>
                            </table>

                        </div>
                        <!-- table-responsive -->

                </div>
            </div>
        </div>
        </div>


        <script>

            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

        </script>
    @endsection













