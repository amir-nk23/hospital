<?php $__env->startSection('content'); ?>

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                         <?php if($doctor_surgeries[0]): ?> <h3 class="card-title"> لیست عمل ها ی دکتر <?php echo e($doctor_surgeries[0]->doctors->name); ?></h3> <?php endif; ?>






                        </div>
                    </div>

                    <form method="post" action="<?php echo e(route('invoice.store')); ?>">

                        <?php echo csrf_field(); ?>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap table-primary mb-0">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-white">/</th>
                                    <th class="text-white">ردیف</th>
                                    <th class="text-white">نام بیمار</th>
                                    <th class="text-white">تاریخ عمل</th>
                                    <th class="text-white">تاریخ ترخیص</th>
                                    <th class="text-white">عمل ها</th>
                                    <th class="text-white">جمع قیمت</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $total = 0;

                                ?>
                                <?php $__currentLoopData = $doctor_surgeries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DR): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                    <tr>
                                        <input hidden name="doctor_id"  value="<?php echo e($DR->doctor_id); ?>">
                                        <td><input type="checkbox" class="record-checkbox" name="doctor_surgery_id[]" value="<?php echo e($DR->id); ?>"></td>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <th scope="row"><?php echo e($DR->surgery->patient_name); ?></th>
                                        <td><?php echo e($DR->surgery->surgeried_at); ?></td>
                                        <td><?php echo e($DR->surgery->released_at); ?></td>
                                        <td><?php $__currentLoopData = $DR->surgery->operation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($operation->name.','); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                                        <td><?php echo e(number_format($DR->amount)); ?></td>
                                    </tr>




                                    <?php

                                    $total += $DR->amount
                                        ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <td></td>
                                <td></td>
                                <th> جمع گرینه ها انتخاب شده (تومان)</th>
                                <td id="total-amount-f"></td>
                                <th>جمع کل (تومان)</th>
                                <td><?php echo e(number_format($total)); ?></td>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center mt-5">

                            <button type="submit" class="btn btn-warning">تسویه</button>

                        </div>

                    </form>


                    <!-- table-responsive -->
                </div>
            </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/preinvoice/show.blade.php ENDPATH**/ ?>