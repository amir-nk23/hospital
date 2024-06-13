<?php $__env->startSection('content'); ?>

    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>پرداخت</h2>

        </div>

        <form method="post" action="<?php echo e(route('payment.store')); ?>" enctype="multipart/form-data">

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

                    <label  class="label">مقدار پرداختی</label>
                    <span style="color: red">*</span>

                    <input type="text" oninput="conertToToman('amount','result')" id="amount" value="<?php echo e(old('amount')); ?>" name="amount" class="form-control">

                    <div class="bold" id="result">


                    </div>

                </div>



                    <input type="text" value="<?php echo e($id); ?>" name="invoice_id" hidden class="form-control">




                <div class="col-6 form-group">

                    <label class="label">نوع پرداخت</label>
                    <span style="color: red">*</span>

                    <select name="pay_type" id="pay_type"  onchange="checkoption()" class="form-control">

                        <option value="cheque">چک</option>
                        <option value="cash">نقدی</option>

                    </select>

                </div>


                <div class="col-6 form-group">

                    <label class="label">تاریح سرسید چک</label>
                    <span style="color: red">*</span>

                    <input type="text" class="form-control fc-datepicker"   id="due_date_show" name="due_date">

                    <input type="text" class="form-control fc-datepicker"  hidden id="due_date" name="due_date">

                </div>



                <div class="col-12 form-group">

                    <label  class="label">عکس رسید</label>
                    <span style="color: red">*</span>

                    <input type="file"  name="receipt"  id="cheque" class="form-control">

                    <div class="bold" id="result">


                    </div>

                </div>


                <div  class="col-12">

                    <div class="mt-5 ml-5" style="text-align: left;">

                        <button class="btn btn-success">پرداخت</button>


                    </div>

                </div>


            </div>





        </form>

    </div>






    <?php $__env->startSection('script'); ?>


    <script>

        function checkoption(){

            const payType = document.getElementById('pay_type');

            const due_date = document.getElementById('due_date_show');



            if(payType.value === 'cheque'){


                due_date.disabled = false;

            }else{

                console.log(due_date)
                due_date.value ='';
                due_date.disabled = true;

            }

        }
    </script>

    <?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/payment/create.blade.php ENDPATH**/ ?>