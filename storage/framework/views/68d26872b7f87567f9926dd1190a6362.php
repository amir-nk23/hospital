<?php $__env->startSection('content'); ?>

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between border-bottom-0">


                        <h3 class="text-muted">  <span class=""> گزارش بیمه :</span>  "<?php echo e($name); ?>"از تاریخ <span dir = rtl><?php echo e($startDateshow); ?></span>  تا تاریخ <span dir = rtl><?php echo e($endDateshow); ?></span></h3>

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
                                    <th>کد ملی بیمار</th>
                                    <th>عمل ها</th>
                                    <th>ملبغ(تومان)</th>
                                    <th>درصد سهم بیمه</th>
                                    <th>سهم بیمه(تومان)</th>
                                    <th>تاریخ تریخیص</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $surgeries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surgery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><?php echo e($surgery->patient_name); ?></td>
                                    <td><?php echo e($surgery->patient_national_code); ?></td>
                                    <td><?php $__currentLoopData = $surgery->operation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($operation->name); ?>-<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                    <td><?php echo e(number_format($surgery->getTotalPrice())); ?></td>

                                        <td><?php echo e($surgery->insurance($insuranceType)->percentage); ?>%</td>
                                    <td class="text"><?php echo e(number_format($surgery->getDoctorInsuranceAmount($id))); ?></td>
                                    <td class="text"><?php echo e($surgery->jalaliDate('released_at')); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>


                        </div><!-- bd -->


                    </div><!-- bd -->

                </div>
                <div class="col-12 inline d-flex">


                        <div class="col-4"> جمع کل عمل ها(تومان) :  <?php echo e(number_format($totalPrice)); ?></div>

                        <div class="col-4 ">   جمع کل پرداختی بیمه(تومان) : <?php echo e(number_format(\App\Models\Surgery::getTotalInsuranceAmount($id,$totalPrice))); ?></div>


                </div>
                </div>
            </div>
        </div>
        </div>

    <?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/report/insurance/index.blade.php ENDPATH**/ ?>