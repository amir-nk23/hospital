<!--Sidebar-right-->
<div class="sidebar sidebar-right sidebar-animate">
    <div class="card-header border-bottom pb-5">
        <h4 class="card-title">Notifications </h4>
        <div class="card-options">
            <a href="#" class="btn btn-sm btn-icon btn-light  text-primary"  data-toggle="sidebar-right" data-target=".sidebar-right"><i class="feather feather-x"></i> </a>
        </div>
    </div>


    <?php $__currentLoopData = \App\Helpers\Helpers::notification(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="">
        <div class="list-group-item  align-items-center border-0">
            <div class="d-flex">
                <div class="mt-1">
                    <h5><?php echo e($notification->title); ?></h5>
                    <a href="#" class="font-weight-semibold fs-16"><?php echo e($notification->body); ?></a>
                    <span class="clearfix"></span>
                    <span class="text-muted fs-13 ml-auto"><i class="mdi mdi-clock text-muted mr-1"></i><?php echo e($notification->jalaliDate('created_at',true)); ?></span>
                </div>
            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div> <!--/Sidebar-right-->
    </div>

<?php /**PATH D:\hospital\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>