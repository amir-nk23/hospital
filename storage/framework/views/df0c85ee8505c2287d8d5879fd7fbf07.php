<?php $__env->startSection('content'); ?>

    <div class="card-body mt-5" style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">

        <div>

            <h2>ویرایش ادمین</h2>

        </div>

        <form method="post" action="<?php echo e(route('superadmin.update',$user->id)); ?>">

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>


            <?php echo method_field('put'); ?>
            <?php echo csrf_field(); ?>
            <div class="row">

                <div class="col-4 form-group">

                    <label  class="label">نام و نام خانوادگی</label>
                    <span style="color: red">*</span>

                    <input type="text" value="<?php echo e($user->name); ?>" name="name" class="form-control">

                </div>


                <div class="col-4 form-group">

                    <label class="label">تلفن</label>
                    <span style="color: red">*</span>

                    <input name="mobile" value="<?php echo e($user->mobile); ?>" type="text" class="form-control">

                </div>



                <div class="col-4 form-group">

                    <label class="label">ایمیل</label>

                    <input name="email" value="<?php echo e($user->email); ?>" type="text" class="form-control">

                </div>

                <div class="col-4 form-group">

                    <label class="label">رمز عبور</label>
                    <span style="color: red">*</span>

                    <input name="password" type="password" class="form-control">

                </div>

                <div class="col-4 form-group">

                    <label class="label">تکرار رمز عبور</label>
                    <span style="color: red">*</span>

                    <input name="password_confirmation" type="password" class="form-control">

                </div>


            </div>


            <div  class="mt-3">

                <label>مجوزها</label>
                <span style="color: red">*</span>


                <div style="display: flex;flex-wrap: wrap;">


                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <div  style="flex-basis: 16.66%">
                            <label><?php echo e($permission->label); ?></label>
                            <input type="checkbox" name="permissions[]" value="<?php echo e($permission->name); ?>" <?php echo e(in_array($permission->name,array_column($userPermissions,'name')) ? 'checked' : ''); ?> class="box-content">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>


                <div class="mt-5 ml-5" style="text-align: left;">

                    <button class="btn btn-warning">ویرایش</button>

                </div>

            </div>


        </form>

    </div>

<?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/user/superadmin/edit.blade.php ENDPATH**/ ?>