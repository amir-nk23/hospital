<?php $__env->startSection('content'); ?>

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">پزشک ها</h3>
                            <div class="page-leftheader mr-md-auto">
                                <div class="btn btn-success d-flex align-items-end flex-wrap my-auto right-content">
                                    <a href="<?php echo e(route('doctor.create')); ?>" class="text-white">ثبت پزشک</a>
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
                                <th class="text-white">تخصص</th>
                                <th class="text-white">کد ملی</th>
                                <th class="text-white">کد نظام پزشکی</th>
                                <th class="text-white">موبایل</th>
                                <th class="text-white">وضعیت</th>
                                <th class="text-white">تاریخ ثبت</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <tr>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <td><?php echo e($doctor->name); ?></td>
                                        <td><?php echo e($doctor->speciality->title); ?></td>
                                        <td><?php echo e($doctor->national_code); ?></td>
                                        <td><?php echo e($doctor->medical_number); ?></td>
                                        <td><?php echo e($doctor->mobile); ?></td>
                                        <?php if($doctor->status==1): ?>
                                            <td class="mt-2 badge badge-success">فعال</td>
                                        <?php endif; ?>
                                        <?php if($doctor->status==0): ?>
                                            <td class="mt-2 badge badge-danger">غیر فعال</td>
                                        <?php endif; ?>
                                        <td><?php echo e($doctor->created_at); ?></td>
                                        <td>

                                            <a href="<?php echo e(route('doctor.edit',$doctor->id)); ?>" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>

                                            <a href="<?php echo e(route('doctor.destroy',$doctor->id)); ?>" class="btn btn-danger">
                                                <i class="feather feather-trash"></i>
                                            </a>


                                        </td>
                                    </tr>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
                </div>
            </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hospital\resources\views/user/doctor/index.blade.php ENDPATH**/ ?>