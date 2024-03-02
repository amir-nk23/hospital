<?php $__env->startSection('content'); ?>

    <div class="card-body mt-5" style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">


        <div>

            <h2>ثبت دکتر</h2>

        </div>

        <form method="post" action="<?php echo e(route('doctor.store')); ?>">

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php echo csrf_field(); ?>
            <div class="row">

                <div class="col-4 form-group">

                    <label  class="label">نام و نام خانوادگی</label>
                    <span style="color: red">*</span>

                    <input type="text" value="<?php echo e(old('name')); ?>" name="name" class="form-control">

                </div>


                <div class="col-4 form-group">

                    <label class="label">شماره تلفن</label>
                    <span style="color: red">*</span>

                    <input name="mobile" value="<?php echo e(old('mobile')); ?>" type="text" class="form-control">

                </div>

                <div class="col-4 form-group">

                    <label class="label">تخصص</label>
                    <span style="color: red">*</span>
                    <select class="form-control"  name="speciality_id">
                        <?php $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speciality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($speciality->id); ?>" ><?php echo e($speciality->title); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>

                <div class="col-4 form-group">

                    <label class="label">نقش</label>
                    <span style="color: red">*</span>
                    <select class="form-control js-example-basic-multiple-limit" multiple name="doctor_roles[]">
                        <?php $__currentLoopData = $doctorRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DR): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($DR->id); ?>" ><?php echo e($DR->title); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>


                <div class="col-4 form-group">

                    <label class="label">کد ملی</label>

                    <input name="national_code" value="<?php echo e(old('national_code')); ?>" type="text" class="form-control">

                </div>





                <div class="col-4 form-group">

                    <label class="label">کد نظام پزشکی</label>

                    <input name="medical_number" value="<?php echo e(old('medical_number')); ?>" type="text" class="form-control">

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


                <div class="col-4 form-group">

                    <label class="label">وضعیت</label>
                    <span style="color: red">*</span>
                    <select class="form-control" name="status">
                        <option value="1">فعال</option>
                        <option value="0">غیر فعال</option>

                    </select>

                </div>

                <div class="col-4 form-group">

                    <label class="label">ایمیل</label>
                    <input type="email" class="form-control" name="email">

                </div>

                <div  class="col-12">

                    <div class="mt-5 ml-5" style="text-align: left;">

                        <button class="btn btn-success">ثبت و ذخیره</button>


                    </div>

                </div>




            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/user/doctor/create.blade.php ENDPATH**/ ?>