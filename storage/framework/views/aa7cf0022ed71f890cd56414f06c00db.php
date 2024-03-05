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

                                                <img src="<?php echo e(asset('storage/'.\App\Helpers\Helpers::setting('img')->value)); ?>" height="50" width="50">

                                            </div>

                                        </figure>

										<h2 class="text-muted font-weight-bold">صورت حساب</h2>
										<div class="">
											<h5 class="mb-1"><strong><?php echo e($invoice->doctors->name); ?></strong></h5>
										</div>

										<div class="card-body pl-0 pr-0">
											<div class="row">
												<div class="col-sm-6">
													<span>تاریخ صدور</span><br>
													<strong><?php echo e($invoice->jalaliDate()); ?></strong>
												</div>
												<div class="col-sm-6 inline text-left">
													<span>وضعیت پرداخت :</span><br>
													<strong class="text-danger">
                                                    <?php if($invoice->status == 0): ?>

                                                        غیر فعال

                                                        <?php endif; ?>

                                                    </strong>
                                                    <strong class="text-success">
                                                        <?php if($invoice->status == 1): ?>

                                                             فعال

                                                        <?php endif; ?>

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

                                                <?php $__currentLoopData = $invoice->surgeries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surgery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>




                                                        <tr>
                                                            <td class="text-center"><?php echo e($loop->index +1); ?></td>
                                                            <td class="text-center">
                                                                <p class="font-weight-semibold mb-1"><?php $__currentLoopData = $surgery->operation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($operation->name); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
                                                                <div class="text-muted"></div>
                                                            </td>

                                                            <td class="text-center text-success"><?php echo e(number_format($surgery->pivot->amount)); ?></td>
                                                        </tr>


                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



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

                                            <?php $__currentLoopData = $invoice->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                                <?php if($payment->status == 1): ?>
                                                <tr>
                                                    <td class="text-center"><?php echo e($loop->index +1); ?></td>

                                                    <td class="text-center text-success"><?php echo e(number_format($surgery->pivot->amount)); ?></td>

                                                    <td class="text-center">

                                                        <div class="text-muted"><?php echo e(__('custom.'.$payment->pay_type)); ?></div>
                                                    </td>


                                                    <td class="text-center">
                                                        <div class=""><?php echo e($payment->jalaliDate()); ?></div>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                        </table>
                                    </div>




                                    <div class="table-responsive push mt-5">


                                        <table class="table table-bordered text-nowrap">




                                                    <tr>


                                                        <td class="text-center">جمع کل صورتحساب</td>

                                                        <td class="text-center">

                                                            <div class="bold"> <?php echo e(number_format($invoice->Surgeries->sum('pivot.amount'))); ?> </div>
                                                        </td>


                                                    </tr>


                                            <tr>


                                                <td class="text-center">جمع پرداختی ها</td>

                                                <td class="text-center">

                                                    <div class="bold text-success"><?php echo e(number_format($invoice->payments->sum('amount')).' '.'(تومان)'); ?> </div>
                                                </td>


                                            </tr>



                                            <tr>


                                                <td class="text-center">باقیمانده</td>

                                                <td class="text-center">

                                                    <div class="bold text-danger"><?php echo e(number_format($invoice->Surgeries->sum('pivot.amount')-$invoice->payments->sum('amount')).' '.'(تومان)'); ?> </div>
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

            <?php $__env->startSection('content'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/report/invoice/show.blade.php ENDPATH**/ ?>