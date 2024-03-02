<?php $__env->startSection('content'); ?>

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">ادمین</h3>
                            <div class="page-leftheader mr-md-auto">
                                <div class="btn btn-success d-flex align-items-end flex-wrap my-auto right-content">
                                    <a href="<?php echo e(route('superadmin.create')); ?>" class="text-white">ثبت ادمین</a>
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
                                <th class="text-white">ادرس ایمیل</th>
                                <th class="text-white">تاریخ ثبت</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($user->id != \Illuminate\Support\Facades\Auth::id()): ?>

                                    <tr>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->created_at); ?></td>
                                        <td>

                                            <a href="<?php echo e(route('superadmin.edit',$user->id)); ?>" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>

                                            <a href="<?php echo e(route('superadmin.destroy',$user->id)); ?>" class="btn btn-danger">
                                                <i class="feather feather-trash"></i>
                                            </a>


                                        </td>
                                    </tr>

                                <?php endif; ?>


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














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/user/superadmin/index.blade.php ENDPATH**/ ?>