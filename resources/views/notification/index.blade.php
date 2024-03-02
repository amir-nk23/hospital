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
                                <th class="text-white"> تیتر </th>
                                <th class="text-white">متن</th>
                                <th class="text-white">دیده شده در تاریخ</th>
                                <th class="text-white">فرستاده شدن در تاریخ</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($notifs as $notif)

                                    <tr>
                                        <th scope="row">{{$loop->index+1}}</th>
                                        <td>{{$notif->title}}</td>
                                        <td>{{$notif->body}}</td>
                                        @if($notif->viewed_at == null)

                                            <td></td>

                                        @else

                                            <td>{{verta($notif->viewed_at)}}</td>

                                        @endif

                                        <td>{{$notif->jalaliDate('created_at')}}</td>
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













