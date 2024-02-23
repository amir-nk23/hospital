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
                                        <td>{{number_format($invoice->amount)}}</td>
                                        <td>{{$invoice->description}}</td>
                                        <td>{{$invoice->jalaliDate()}}</td>
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

                                                @if($invoice->status == 0)
                                            <a href="{{route('invoice.destroy',$invoice->id)}}" class="btn btn-danger">
                                                <i class="feather feather-trash"></i>
                                            </a>
                                                @endif
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













