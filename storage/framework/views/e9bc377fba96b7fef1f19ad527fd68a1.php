<?php $__env->startSection('content'); ?>
  <div class="col-12 d-flex mt-5">














































  <div class="col-6">
          <div class="card shadow overflow-hidden  bg-transparent position-relative" >
              <a href="<?php echo e(route('setting.general')); ?>" style="cursor: pointer">

                  <div class="card-body bg bg-success" style="height:300px;text-align: center">

                      <h1 class="text-white"><i><img height="40px" src="<?php echo e(asset('image/exclamation.ico')); ?>"></i></h1>
                      <h1 class="text-white display-3">تنظیمات عمومی</h1>

                  </div>

              </a>
          </div>
      </div>


      <div class="col-6">
          <div class="card shadow overflow-hidden  bg-transparent position-relative" >
              <a href="<?php echo e(route('setting.social')); ?>" style="cursor: pointer">

                  <div class="card-body bg bg-warning" style="height:300px;text-align: center">

                      <h1 class="text-white"><i><img height="40px" src="<?php echo e(asset('image/exclamation.ico')); ?>"></i></h1>
                      <h1 class=" text-white display-3">شبکه اجتماعی</h1>

                  </div>

              </a>
          </div>
      </div>

  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hospital\resources\views/setting/index.blade.php ENDPATH**/ ?>