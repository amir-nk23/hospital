<?php $__env->startSection('content'); ?>

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">لیست بیمه</h3>
                            <div class="page-leftheader mr-md-auto">
                                <div class="btn btn-success d-flex align-items-end flex-wrap my-auto right-content">
                                    <a href="<?php echo e(route('insurance.create')); ?>"  class="text-white">ثبت بیمه</a>
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
                                <th class="text-white">نام بیمه</th>
                                <th class="text-white">نوع بیمه</th>
                                <th class="text-white">درصد تخقیف</th>
                                <th class="text-white">وضعیت</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $insurances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insurance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <td><?php echo e($insurance->name); ?></td>
                                        <td><?php echo e(__('custom.'.$insurance->type)); ?></td>
                                        <td><?php echo e($insurance->percentage); ?></td>
                                        <?php if($insurance->status==1): ?>
                                            <td class="mt-2 badge badge-success">فعال</td>
                                        <?php endif; ?>
                                        <?php if($insurance->status==0): ?>
                                            <td class="mt-2 badge badge-danger">غیر فعال</td>
                                        <?php endif; ?>
                                        <td>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update insurance')): ?>
                                            <a href="<?php echo e(route('insurance.edit',$insurance->id)); ?>" class="btn btn-warning">
                                                <i class="feather feather-edit"></i>
                                            </a>
                                            <?php endif; ?>

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete insurance')): ?>
                                            <a href="<?php echo e(route('insurance.destroy',$insurance->id)); ?>" class="btn btn-danger">
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














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/insurance/index.blade.php ENDPATH**/ ?>