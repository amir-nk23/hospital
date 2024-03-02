<?php $__env->startSection('content'); ?>

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>ویرایش پرداخت</h2>

        </div>

        <form method="post" action="<?php echo e(route('payment.update',$payment->id)); ?>" enctype="multipart/form-data">

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

                    <label  class="label">مقدار پرداختی(تومان)</label>
                    <span style="color: red">*</span>

                    <input type="text" oninput="conertToToman('amount','result')" id="amount" value="<?php echo e(number_format($payment->amount)); ?>" name="amount" class="form-control">

                    <div class="bold" id="result">


                    </div>

                </div>





                <div class="col-6 form-group">

                    <label  class="label">وضعیت پرداخت</label>
                    <span style="color: red">*</span>


                    <select class="form-control" name="status">

                        <option class="bg-success" value="1">موفق</option>
                        <option class="bg-danger" value="0">ناموفق</option>

                    </select>


                </div>



                <div class="col-6 form-group">

                    <label class="label">نوع پرداخت</label>
                    <span style="color: red">*</span>

                    <select name="pay_type" class="form-control">

                        <option <?php echo e($payment->pay_type == 'cheque'?'selected':''); ?> value="cheque">چک</option>
                        <option <?php echo e($payment->pay_type == 'cash'?'selected':''); ?> value="cash">نقدی</option>

                    </select>

                </div>

                </div>



                <div class="col-12 form-group">

                    <label  class="label">عکس رسید</label>
                    <span style="color: red">*</span>

                    <input type="file"  name="receipt" class="form-control">


                </div>


                <div  class="col-12">

                    <div class="mt-5 ml-5" style="text-align: left;">

                        <button class="btn btn-warning">پرداخت</button>


                    </div>

                </div>


            </div>





        </form>

    </div>

<?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/payment/edit.blade.php ENDPATH**/ ?>