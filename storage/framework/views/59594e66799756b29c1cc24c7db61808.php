<?php $__env->startSection('content'); ?>

    <div class="card-body mt-5" style="box-shadow:0 4px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">


        <div>

            <h2>ویرایش جراحی</h2>

        </div>

        <form method="post" action="<?php echo e(route('surgery.update',$surgery->id)); ?>">

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

                    <label  class="label">نام و نام خانوادگی</label>
                    <span style="color: red">*</span>

                    <input type="text" value="<?php echo e($surgery->patient_name); ?>" name="patient_name" class="form-control">

                </div>



                <div class="col-6 form-group">

                    <label class="label">کد ملی</label>
                    <span style="color: red">*</span>

                    <input name="patient_national_code" value="<?php echo e($surgery->patient_national_code); ?>" type="text" class="form-control">

                </div>




                <div class="col-6 form-group">

                    <label class="label">بیمه پایه</label>
                    <span style="color: red">*</span>
                    <select class="form-control"  name="basic_insurance_id">
                        <option disabled value="" >لطفا بیمه پایه را انتخاب کنید</option>
                        <?php $__currentLoopData = $basics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $basic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($basic->id); ?>" <?php echo e($basic->id = $surgery->basic_insurance_id ?'selected' : ''); ?> ><?php echo e($basic->name); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>

                <div class="col-6 form-group">

                    <label class="label">بیمه تکمیلی</label>
                    <span style="color: red">*</span>
                    <select class="form-control"  name="supp_insurance_id">
                        <option class="placeholder" disabled value="" >لطفا بیمه تکمیلی را انتخاب کنید</option>
                        <?php $__currentLoopData = $supplementaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplementary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($supplementary->id); ?>" <?php echo e($supplementary->id = $surgery->supp_insurance_id ?'selected' : ''); ?> ><?php echo e($supplementary->name); ?></option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>


                <div class="col-6 form-group">

                    <label class="label">شماره پرونده</label>
                    <span style="color: red">*</span>
                    <input name="document_number" value="<?php echo e($surgery->document_number); ?>" type="text" class="form-control">

                </div>




                <div class="col-6 form-group">

                    <label class="label">تاریخ عمل</label>

                    <input name="surgeried_at" value="<?php echo e($surgery->surgeried_at); ?>" type="date" class="form-control">

                </div>


                <div class="col-6 form-group">

                    <label class="label">تاریخ عمل</label>

                    <input name="released_at" value="<?php echo e($surgery->released_at); ?>" type="date" class="form-control">

                </div>




                <div class="col-12 form-group">

                    <label class="label">عمل</label>

                   <select class="form-control js-example-basic-multiple-limit" name="operation_id[]" multiple="multiple">

                    <?php $__currentLoopData = $operations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <option value="<?php echo e($operation->id); ?>" <?php if($surgery->operation->contains($operation->id)): echo 'selected'; endif; ?>><?php echo e($operation->name); ?></option>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                   </select>

                </div>



                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-4 form-group">

                        <label class="label"><?php echo e($role->title); ?></label>

                        <select class="form-control" name="doctor_id[]">

                            <?php $__currentLoopData = $role->doctor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $DR): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <option value="<?php echo e($DR->id); ?>"  <?php if($surgery->doctor->contains($DR->id)): echo 'selected'; endif; ?>><?php echo e($DR->name); ?></option>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>

                    </div>




                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                <div class="col-10 form-group">

                    <label class="label">توضیحات</label>

                    <textarea name="description" cols="1" rows="2"  class="form-control"><?php echo e(old('description')); ?></textarea>

                </div>


                <div id="buttom" class="col-2" style="margin-top: 50px;">

                    <div class=" ml-5" style="text-align: left;">

                        <button class="btn btn-warning"> ویرایش </button>


                    </div>

                </div>

            </div>

        </form>


    </div>

<?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/surgery/edit.blade.php ENDPATH**/ ?>