<?php $__env->startSection('content'); ?>

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">تخصص</h3>
                            <div class="page-leftheader mr-md-auto">
                                <div class="btn btn-success d-flex align-items-end flex-wrap my-auto right-content">
                                    <a href="<?php echo e(route('speciality.create')); ?>"  class="text-white">ثبت تخصص</a>
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
                                <th class="text-white">نام تخصص</th>
                                <th class="text-white">وضعیت</th>
                                <th class="text-white">تاریخ ثبت</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speciality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <tr>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <td><?php echo e($speciality->title); ?></td>
                                        <td class="">
                                        <?php if($speciality->status==1): ?>
                                                <span class="badge badge-success">غیرفعال</span>
                                        <?php endif; ?>
                                        <?php if($speciality->status==0): ?>
                                                <span  class="badge badge-danger">غیرفعال</span>
                                        <?php endif; ?>
                                        </td>
                                        <td><?php echo e($speciality->created_at); ?></td>
                                        <td>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update specialities')): ?>

                                            <a href="<?php echo e(route('speciality.edit',$speciality->id)); ?>" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete specialities')): ?>
                                            <a href="<?php echo e(route('speciality.destroy',$speciality->id)); ?>" class="btn btn-danger">
                                                <i class="feather feather-trash"></i>
                                            </a>

                                                <?php endif; ?>
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














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/speciality/index.blade.php ENDPATH**/ ?>