<?php $__env->startSection('content'); ?>

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>ثبت بیمه</h2>

        </div>

        <form method="post" action="<?php echo e(route('insurance.store')); ?>">

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

                    <label  class="label">نام بیمه</label>
                    <span style="color: red">*</span>

                    <input type="text" value="<?php echo e(old('name')); ?>" name="name" class="form-control">

                </div>


                <div class="col-6 form-group">

                    <label class="label">نوع بیمه</label>
                    <span style="color: red">*</span>

                    <select name="type" class="form-control">

                        <option value="basic">پایه</option>
                        <option value="supplementary">تکمیلی</option>

                    </select>

                </div>

                <div class="col-6 form-group">

                    <label  class="label">درصد تخفیف</label>
                    <span style="color: red">*</span>

                    <input type="text" value="<?php echo e(old('percentage')); ?>" name="percentage" class="form-control">

                </div>


                <div class="col-6 form-group">

                    <label class="label">وضعیت</label>
                    <span style="color: red">*</span>

                    <select name="status" class="form-control">

                        <option value="1">فعال</option>
                        <option value="0">غیر فعال</option>

                    </select>

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














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hospital\resources\views/insurance/create.blade.php ENDPATH**/ ?>