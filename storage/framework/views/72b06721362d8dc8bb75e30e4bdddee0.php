                <?php $__env->startSection('content'); ?>


                    <div class="page-header d-xl-flex d-block">

                        <div class="page-leftheader">

                            <h4 class="page-title">ویرایش تنظیمات</h4>

                        </div>

                    </div>


                    <form method="post" action="<?php echo e(route('setting.update')); ?>" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('patch'); ?>
						<!-- Row -->
						<div class="row" style=" ">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="row">

                                            <?php $__currentLoopData = $generals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $general): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                                <?php if($general->type == 'text'): ?>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"><?php echo e($general->label); ?></label>
                                                            <input class="form-control" value="<?php echo e($general->value); ?>" name="<?php echo e($general->name); ?>">
                                                        </div>
                                                    </div>
                                               <?php endif; ?>


                                                   <?php if($general->type=='img'): ?>

                                                        <div class="col-6 d-flex row">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo e($general->label); ?></label>
                                                                <input class="form-control" type="file" id="inputValue" value="<?php echo e($general->value); ?>" name="<?php echo e($general->name); ?>">
                                                            </div>

                                                            <div class="mb-3 mr-5">

                                                                <?php if($general->value): ?>

                                                                    <figure class="" style="text-align: left">

                                                                            <input hidden value="<?php echo e($general->value); ?>">

                                                                            <a  class="mb-2 feather feather-x btn btn-danger ajax-link" onclick="confirmDelete('delete-image-<?php echo e($general->id); ?>')"></a>


                                                                        <img width="100px" height="100px" src="<?php echo e(asset('storage/'.$general->value)); ?>" alt="">

                                                                    </figure>



                                                                <?php endif; ?>
                                                            </div>

                                                        </div>


                                                    <?php endif; ?>



                                                    <?php if($general->type=='textarea'): ?>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label"><?php echo e($general->label); ?></label>
                                                                <textarea class="form-control" cols="10" rows="10" name="<?php echo e($general->name); ?>"><?php echo e($general->value); ?></textarea>
                                                            </div>
                                                        </div>


                                                    <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



								</div>
                                        <div class="text-left mt-5">
                                            <a href="<?php echo e(route('setting.index')); ?>" class="btn btn-danger btn-lg">انصراف</a>
                                            <button class="btn btn-warning btn-lg" type="submit">به روزرسانی</button>
                                        </div>
							</div>
						</div>
						<!-- End Row -->

					</div>
				</div><!-- end app-content-->
			</div>



                    </form>


                    <?php $__currentLoopData = $generals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $general): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form action="<?php echo e(route('setting.destroy', $general)); ?>" id="delete-image-<?php echo e($general->id); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field("DELETE"); ?>
                        </form>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hospital\resources\views/setting/edit.blade.php ENDPATH**/ ?>