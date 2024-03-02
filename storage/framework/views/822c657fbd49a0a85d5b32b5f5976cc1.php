<?php $__env->startSection('content'); ?>

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>ثبت نقش</h2>

        </div>

        <form method="post" action="<?php echo e(route('doctor.role.store')); ?>">

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

                <div class="col-6 form-group">

                    <label  class="label">نام نقش</label>
                    <span style="color: red">*</span>

                    <input type="text" value="<?php echo e(old('title')); ?>" name="title" class="form-control">

                </div>


                <div class="col-6 form-group">

                    <label  class="label">درصد سهم</label>
                    <span style="color: red">*</span>

                    <input type="text" value="<?php echo e(old('quota')); ?>" name="quota" class="form-control">

                </div>


                <div class="col-6 form-group">

                    <label class="label">وضعیت</label>
                    <span style="color: red">*</span>

                    <select name="status" class="form-control">

                        <option value="1">فعال</option>
                        <option value="0">غیر فعال</option>

                    </select>

                </div>




                <div class="col-6 mt-5 form-group">

                    <label class="label">الزامی بودن</label>
                    <input type="checkbox" value="1" name="required">

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














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/doctor_role/create.blade.php ENDPATH**/ ?>