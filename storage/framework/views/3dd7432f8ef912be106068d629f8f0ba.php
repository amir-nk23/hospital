<?php $__env->startSection('content'); ?>

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between border-bottom-0">

                        <h3 class="text-muted">  <span class=""> گزارش مالی پزشک :</span>  "<?php echo e($DoctorSurgeries[0]->doctors->name); ?>"از تاریخ <span dir = rtl><?php echo e($startDateshow); ?></span>  تا تاریخ <span dir = rtl><?php echo e($endDateshow); ?></span></h3>

                        <div >

                            <button class="btn btn-info"  onclick="javascript:window.print();"><i class="si si-printer"></i></button>


                        </div>


                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped card-table table-vcenter text-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>نام بیمار</th>
                                    <th>بیمه پایه</th>
                                    <th>بیمه تکمیلی</th>
                                    <th>عمل ها</th>
                                    <th>ملبغ(تومان)</th>
                                    <th>صورتحساب</th>
                                    <th>وضعیت تسویه</th>
                                    <th>تاریخ جراحی</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $DoctorSurgeries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctorsurgery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <th scope="row">1</th>
                                    <td><?php echo e($doctorsurgery->surgery->patient_name); ?></td>
                                    <td><?php if($doctorsurgery->surgery->basicInsurance): ?>  <?php echo e($doctorsurgery->surgery->basicInsurance->name); ?> <?php else: ?> <span class="text-danger">ندارد</span> <?php endif; ?></td>
                                    <td><?php if($doctorsurgery->surgery->suppinsurance): ?>  <?php echo e($doctorsurgery->surgery->suppinsurance->name); ?> <?php else: ?> <span class="text-danger">ندارد</span> <?php endif; ?></td>
                                    <td><?php $__currentLoopData = $doctorsurgery->surgery->operation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($operation->name); ?> - <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                    <td class="text"><?php echo e(number_format($doctorsurgery->amount)); ?></td>
                                    <td class="text-success"><?php if($doctorsurgery->doctor_id): ?> <span class="badge badge-success">دارد</span> <?php else: ?> <span class="badge badge-danger">ندارد</span> <?php endif; ?></td>
                                    <td class="text-success"><?php if($doctorsurgery->invoice): ?> <?php if($doctorsurgery->invoice->status ==1): ?> <span class="text-primary">تسویه شده</span> <?php endif; ?> <?php if($doctorsurgery->invoice->status == 0): ?> <span class="text-warning   ">تسویه نشده</span> <?php endif; ?> <?php endif; ?></td>
                                    <td class="text"><?php echo e($doctorsurgery->surgery->jalaliDate('surgeried_at')); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>


                        </div><!-- bd -->


                    </div><!-- bd -->

                </div>
                <div class="col-12 inline d-flex">

                    <div class="col-4"> جمع کل عمل ها(تومان) :  <?php echo e(number_format($DoctorSurgeries->sum('amount'))); ?></div>
                    <div class="col-4 text-success"> جمع کل پرداختی ها(تومان) :  <?php echo e(number_format($pay)); ?></div>
                    <div class="col-4 text-danger"> جمع باقیمانده : <?php echo e(number_format(   $DoctorSurgeries->sum('amount') - $pay)); ?> </div>

                </div>
                </div>
            </div>
        </div>
        </div>

    <?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/report/invoice/index.blade.php ENDPATH**/ ?>