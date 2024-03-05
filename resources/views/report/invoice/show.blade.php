@extends('layout.master')





		<div class="page">
			<div class="page-main">


				<div class="app-content main-content">
					<div class="side-app">

						<!-- Row-->
						<div class="row">
							<div class="col-md-12">
								<div class="card overflow-hidden">
									<div class="card-body">

                                        <figure class="image-container text-center">

                                            <div>

                                                <img src="{{asset('storage/'.\App\Helpers\Helpers::setting('img')->value)}}" height="50" width="50">

                                            </div>

                                        </figure>

										<h2 class="text-muted font-weight-bold">صورت حساب</h2>
										<div class="">
											<h5 class="mb-1"><strong>{{$invoice->doctors->name}}</strong></h5>
										</div>

										<div class="card-body pl-0 pr-0">
											<div class="row">
												<div class="col-sm-6">
													<span>تاریخ صدور</span><br>
													<strong>{{$invoice->jalaliDate()}}</strong>
												</div>
												<div class="col-sm-6 inline text-left">
													<span>وضعیت پرداخت :</span><br>
													<strong class="text-danger">
                                                    @if($invoice->status == 0)

                                                        غیر فعال

                                                        @endif

                                                    </strong>
                                                    <strong class="text-success">
                                                        @if($invoice->status == 1)

                                                             فعال

                                                        @endif

                                                    </strong>
												</div>
											</div>
										</div>

                                        <div class="table-responsive push mt-3">

                                            <h6 class="text-muted font-weight-bold">لیست جراحی ها</h6>

                                            <table class="table table-bordered text-nowrap">
                                                <tr class=" ">
                                                    <th class="text-center " style="width: 1%">ردیف</th>
                                                    <th class="text-center" style="width: 1%">نام عمل(ها)</th>
                                                    <th class="text-center" style="width: 1%">قمیت</th>
                                                </tr>

                                                @foreach($invoice->surgeries as $surgery)




                                                        <tr>
                                                            <td class="text-center">{{$loop->index +1 }}</td>
                                                            <td class="text-center">
                                                                <p class="font-weight-semibold mb-1">@foreach($surgery->operation as $operation) {{$operation->name}} @endforeach</p>
                                                                <div class="text-muted"></div>
                                                            </td>

                                                            <td class="text-center text-success">{{number_format($surgery->pivot->amount)}}</td>
                                                        </tr>


                                                @endforeach



                                            </table>
                                        </div>

                                    </div>



                                    <div class="table-responsive push mt-3">

                                        <h6 class="text-muted font-weight-bold">لیست پرداختی</h6>

                                        <table class="table table-bordered text-nowrap">
                                            <tr class=" ">
                                                <th class="text-center " style="width: 1%">ردیف</th>
                                                <th class="text-center" style="width: 1%">قیمت</th>
                                                <th class="text-center" style="width: 1%">نوع پرداختی</th>
                                                <th class="text-center" style="width: 1%">تاریخ پرداخت</th>
                                            </tr>

                                            @foreach($invoice->payments as $payment)


                                                @if($payment->status == 1)
                                                <tr>
                                                    <td class="text-center">{{$loop->index +1 }}</td>

                                                    <td class="text-center text-success">{{number_format($surgery->pivot->amount)}}</td>

                                                    <td class="text-center">
{{--                                                        <p class="font-weight-semibold mb-1"></p>--}}
                                                        <div class="text-muted">{{__('custom.'.$payment->pay_type)}}</div>
                                                    </td>


                                                    <td class="text-center">
                                                        <div class="">{{$payment->jalaliDate()}}</div>
                                                    </td>
                                                </tr>
                                                @endif

                                            @endforeach



                                        </table>
                                    </div>




                                    <div class="table-responsive push mt-5">


                                        <table class="table table-bordered text-nowrap">




                                                    <tr>


                                                        <td class="text-center">جمع کل صورتحساب</td>

                                                        <td class="text-center">

                                                            <div class="bold"> {{number_format($invoice->Surgeries->sum('pivot.amount'))}} </div>
                                                        </td>


                                                    </tr>


                                            <tr>


                                                <td class="text-center">جمع پرداختی ها</td>

                                                <td class="text-center">

                                                    <div class="bold text-success">{{number_format($invoice->payments->sum('amount')).' '.'(تومان)'}} </div>
                                                </td>


                                            </tr>



                                            <tr>


                                                <td class="text-center">باقیمانده</td>

                                                <td class="text-center">

                                                    <div class="bold text-danger">{{number_format($invoice->Surgeries->sum('pivot.amount')-$invoice->payments->sum('amount')).' '.'(تومان)'}} </div>
                                                </td>


                                            </tr>


                                            <td colspan="5" class="text-left">

                                                <button class="btn btn-info" onclick="javascript:window.print();"><i class="si si-printer"></i> پرینت صورتحساب</button>
                                            </td>



                                        </table>
                                    </div>

                                </div>



                            </div>
							</div>
						</div>
						<!-- End row-->

					</div>
				</div><!-- end app-content-->
			</div>

            @section('content')


@endsection
