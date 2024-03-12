<?php $__env->startSection('content'); ?>

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">لیست جراحی</h3>
                            <div class="page-leftheader mr-md-auto">
                                <div class="btn btn-success d-flex align-items-end flex-wrap my-auto right-content">
                                    <a href="<?php echo e(route('surgery.create')); ?>" class="text-white">ثبت جراحی</a>
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
                                <th class="text-white">نام و نام خانوادگی</th>
                                <th class="text-white">کد ملی بیمار</th>
                                <th class="text-white">بیمه تکمیلی</th>
                                <th class="text-white">بیمه پایه</th>
                                <th class="text-white">شماره پرونده</th>
                                <th class="text-white">هزینه عمل (تومان)</th>
                                <th class="text-white">توضیحات</th>
                                <th class="text-white">تاریخ عمل</th>
                                <th class="text-white">تاریخ ترخیص</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $surgeries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surgery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <tr>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <td><?php echo e($surgery->patient_name); ?></td>
                                        <td><?php echo e($surgery->patient_national_code); ?></td>
                                        <td><?php if($surgery->suppInsurance != null): ?><?php echo e($surgery->suppInsurance->name); ?><?php endif; ?></td>
                                        <td><?php echo e($surgery->basicInsurance->name); ?></td>
                                        <td><?php echo e($surgery->document_number); ?></td>
                                        <td>

                                                <?php echo e(number_format($surgery->operation->sum('pivot.amount'))); ?>


                                        </td>
                                        <td><?php echo e($surgery->description); ?></td>
                                        <td><?php echo e($surgery->jalaliDate('surgeried_at')); ?></td>
                                        <td><?php echo e($surgery->jalaliDate('released_at')); ?></td>
                                        <td>

                                            <a href="<?php echo e(route('surgery.edit',$surgery->id)); ?>" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>

                                            <a href="<?php echo e(route('surgery.destroy',$surgery->id)); ?>" class="btn btn-danger">
                                                <i class="feather feather-trash"></i>
                                            </a>


                                        </td>
                                    </tr>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->

                    <div class="card-body">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-success mb-0">

                                <?php echo e($surgeries->onEachSide(3)->links()); ?>


                            </ul>
                        </nav>
                        <!-- pagination-wrapper -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/surgery/index.blade.php ENDPATH**/ ?>