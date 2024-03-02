<?php $__env->startSection('content'); ?>

    <div class="card-body mt-5" style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">


        <div>

            <h2>ثبت دکتر</h2>

        </div>

        <form method="post" action="<?php echo e(route('doctor.update',$doctor->id)); ?>">

            <?php echo method_field('patch'); ?>
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

                    <input type="text" value="<?php echo e($doctor->name); ?>" name="name" class="form-control">

                </div>


                <div class="col-4 form-group">

                    <label class="label">شماره تلفن</label>
                    <span style="color: red">*</span>

                    <input name="mobile" value="<?php echo e($doctor->mobile); ?>" type="text" class="form-control">

                </div>

                <div class="col-4 form-group">

                    <label class="label">تخصص</label>
                    <span style="color: red">*</span>
                    <select class="form-control js-example-basic-multiple-limit" multiple name="speciality_id">
                        <?php $__currentLoopData = $specialities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speciality): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($speciality->id); ?>" <?php echo e($speciality->id =$doctor->speciality_id ?'selected':''); ?>><?php echo e($speciality->title); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>

                <div class="col-4 form-group">

                    <label class="label">نقش</label>
                    <span style="color: red">*</span>
                    <select class="form-control js-example-basic-multiple-limit" multiple name="doctor_roles[]">
                        <?php $__currentLoopData = $doctorRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DR): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($DR->id); ?>" <?php if($doctor->doctor_role->contains($DR->id)): echo 'selected'; endif; ?>><?php echo e($DR->title); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>


                <div class="col-4 form-group">

                    <label class="label">کد ملی</label>

                    <input name="national_code" value="<?php echo e($doctor->national_code); ?>" type="text" class="form-control">

                </div>





                <div class="col-4 form-group">

                    <label class="label">کد نظام پزشکی</label>

                    <input name="medical_number" value="<?php echo e($doctor->medical_number); ?>" type="text" class="form-control">

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
                        <option value="1" <?php echo e($doctor->status == 1 ?'selected':''); ?>>فعال</option>
                        <option value="0"  <?php echo e($doctor->status == 0 ?'selected':''); ?>>غیر فعال</option>

                    </select>

                </div>

                <div  class="col-12">

                    <div class="mt-5 ml-5" style="text-align: left;">

                        <button class="btn btn-warning">ویرایش</button>


                    </div>

                </div>




            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/user/doctor/edit.blade.php ENDPATH**/ ?>