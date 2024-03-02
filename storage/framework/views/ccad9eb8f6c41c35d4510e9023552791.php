<?php $__env->startSection('content'); ?>

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>ویرایش صورتحساب</h2>

        </div>

        <form method="post" action="<?php echo e(route('invoice.update',$invoice->id)); ?>">

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

                <div class="col-6 form-group">

                    <label  class="label">توضیحات</label>
                    <span style="color: red">*</span>

                    <textarea class="form-control" name="description"><?php echo e($invoice->description); ?></textarea>

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














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/invoice/edit.blade.php ENDPATH**/ ?>