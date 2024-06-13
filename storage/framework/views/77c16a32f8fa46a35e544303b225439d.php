<?php $__env->startSection('content'); ?>

   <div class="row">
    <div class="col-md-12">



    <div class="card overflow-hidden vh-100">



    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>پرداخت پزشک</h2>

        </div>

        <form method="get" action="<?php echo e(route('preinvoice.search')); ?>">


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

                    <label  class="label">نام دکتر</label>
                    <span style="color: red">*</span>

                    <select name="doctor_id" class="form-control">

                        <option selected disabled>لطفا نام پزشک را انتخاب کنید</option>
                        <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($doctor->id); ?>"><?php echo e($doctor->name); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>


                <div class="col-6 form-group">

                    <label class="label">تاریخ مبدا</label>
                    <span style="color: red">*</span>

                    <input type="text" autocomplete="false" class="form-control" id="start_date_show" name="start_date_show">
                    <input name="start_date" hidden value="<?php echo e(old('surgeried_at')); ?>" id="start_date" type="date" class="form-control">


                </div>


                <div class="col-6 form-group">

                    <label class="label">تاریخ ترخیص</label>
                    <span style="color: red">*</span>

                    <input type="text" autocomplete="false" class="form-control" id="end_date_show" name="end_date_show">
                    <input name="end_date" hidden value="<?php echo e(old('surgeried_at')); ?>" id="end_date" type="date" class="form-control">

                </div>



                <div  class="col-12">

                    <div class="mt-5 ml-5" style="text-align: left;">

                        <button class="btn btn-primary">فیلتر</button>


                    </div>

                </div>


            </div>





        </form>

    </div>


</div>

    </div>
   </div>

<?php $__env->startSection('script'); ?>
    <script>


        $('#start_date_show').MdPersianDateTimePicker({
            targetDateSelector: '#start_date',        targetTextSelector: '#start_date_show',
            englishNumber: false,        toDate:true,
            enableTimePicker: false,        dateFormat: 'yyyy-MM-dd',
            textFormat: 'yyyy-MM-dd',        groupId: 'rangeSelector1',
        });


        $('#end_date_show').MdPersianDateTimePicker({
            targetDateSelector: '#end_date',        targetTextSelector: '#end_date_show',
            englishNumber: false,        toDate:true,
            enableTimePicker: false,        dateFormat: 'yyyy-MM-dd',
            textFormat: 'yyyy-MM-dd',        groupId: 'rangeSelector1',
        });


    </script>

<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/preinvoice/index.blade.php ENDPATH**/ ?>