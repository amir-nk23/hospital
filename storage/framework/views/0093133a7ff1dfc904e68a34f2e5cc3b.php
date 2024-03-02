<?php $__env->startSection('content'); ?>

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create operation')): ?>
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">عمل ها</h3>
                            <div class="page-leftheader mr-md-auto">
                                <div class="btn btn-success d-flex align-items-end flex-wrap my-auto right-content">
                                    <a href="<?php echo e(route('operation.create')); ?>"  class="text-white">ثبت عمل</a>
                                    <i class="feather feather-plus fs-15 my-auto mr-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap table-primary mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white">ردیف</th>
                                <th class="text-white">نام عمل</th>
                                <th class="text-white">قیمت</th>
                                <th class="text-white">وضعیت</th>
                                <th class="text-white">تاریخ ثبت</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $OPs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $OP): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                    <tr>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <td><?php echo e($OP->name); ?></td>
                                        <td><?php echo e(number_format($OP->price)); ?></td>
                                        <?php if($OP->status==1): ?>
                                            <td class="mt-2 badge badge-success">فعال</td>
                                        <?php endif; ?>
                                        <?php if($OP->status==0): ?>
                                            <td class="mt-2 badge badge-danger">غیر فعال</td>
                                        <?php endif; ?>
                                        <td><?php echo e($OP->created_at); ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update operation')): ?>
                                            <a href="<?php echo e(route('operation.edit',$OP->id)); ?>" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete operation')): ?>
                                            <a href="<?php echo e(route('operation.destroy',$OP->id)); ?>" class="btn btn-danger">
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














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hospital\resources\views/operation/index.blade.php ENDPATH**/ ?>