<?php $__env->startSection('content'); ?>

   <div class="row">
    <div class="col-md-12">



    <div class="card overflow-hidden vh-100">



    <div class="col-6 card-body mt-5"  style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-right: 17%;">


        <div>

            <h2>گزارش بیمه</h2>

        </div>

        <form method="get" action="<?php echo e(route('report.insurance.index')); ?>">


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

                    <label  class="label">نوع بیمه</label>
                    <span style="color: red">*</span>

                    <select name="insuranceType" id="insuranceType" onchange="populateData()" class="form-control">

                        <option selected disabled>لطفا نوع بیمه را انتخاب کنید</option>

                            <option value="supplementary">تکمیلی</option>
                            <option value="basic">پایه</option>

                    </select>

                </div>


                <div class="col-6 form-group">

                    <label  class="label">نام بیمه</label>
                    <span style="color: red">*</span>

                    <select name="insuranceId" id="insuranceData" class="form-control">

                        <option selected disabled>لطفا نام بیمه را انتخاب کنید</option>


                    </select>

                </div>


                <div class="col-6 form-group">

                    <label class="label">از تاریخ</label>
                    <span style="color: red">*</span>

                    <input type="text" autocomplete="off" class="form-control" id="start_date_show"  name="start_date_show">
                    <input type="text" class="form-control" id="start_date"  hidden name="start_date">

                </div>


                <div class="col-6 form-group">

                    <label class="label">تا تاریخ</label>
                    <span style="color: red">*</span>

                    <input type="text" autocomplete="off" class="form-control" id="end_date_show" name="end_date_show">
                    <input type="text" class="form-control" hidden id="end_date" name="end_date">


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



    <script>
        function populateData() {
            var typeSelect = document.getElementById("insuranceType");
            var dataSelect = document.getElementById("insuranceData");
            var selectedType = typeSelect.value;

            // Clear previous options
            dataSelect.innerHTML = "";

            // Populate options based on selected type
            if (selectedType === "basic") {
                // Assuming $basicData is the array of data for basic insurance in your controller
                <?php $__currentLoopData = $insurances->where('type','basic'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $basicdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                var option = document.createElement("option");
                option.value = "<?php echo e($basicdata['id'].'-'.$basicdata['name']); ?>";
                option.text = "<?php echo e($basicdata['name']); ?>";
                dataSelect.appendChild(option);
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            } else if (selectedType === "supplementary") {
                // Assuming $supplementData is the array of data for supplement insurance in your controller
                <?php $__currentLoopData = $insurances->where('type','supplementary'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suppdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                var option = document.createElement("option");
                option.value = "<?php echo e($suppdata['id'].'-'.$suppdata['name']); ?>}";
                option.text = "<?php echo e($suppdata['name']); ?>";
                dataSelect.appendChild(option);
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            }
        }
    </script>
   <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hospital\resources\views/report/insurance/filter.blade.php ENDPATH**/ ?>