<?php $__env->startSection('content'); ?>
		<div class="page login-bg">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col mx-auto">
							<div class="row justify-content-center">
								<div class="col-md-7 col-lg-5">
									<div class="card">
										<div class="p-4 pt-6 text-center">
											<h1 class="mb-2">Login</h1>
											<p class="text-muted">Sign In to your account</p>
										</div>
										<form class="card-body pt-3" action="<?php echo e(route('auth.login')); ?>" method="post" id="login" name="login">
                                            <?php echo csrf_field(); ?>

                                            <?php $__errorArgs = ['validate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger"><?php echo e($message); ?></p>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

											<div class="form-group">
												<label class="form-label">موبایل</label>
												<input class="form-control" placeholder="موبایل" name="mobile">
                                                <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>
											<div class="form-group">
												<label class="form-label">پسوورد</label>
												<input class="form-control" placeholder="پسوورد" name="password" type="password">
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <p class="text-danger"><?php echo e($message); ?></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>
											<div class="form-group">
												<label class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
													<span class="custom-control-label">Remeber me</span>
												</label>
											</div>
											<div class="submit">
                                                <button class="btn btn-primary btn-block" type="submit">ورود</button>
											</div>

										</form>
										<div class="card-body border-top-0 pb-6 pt-2">
											<div class="text-center">
												<span class="avatar brround mr-3 bg-primary-transparent text-primary"><i class="ri-facebook-line"></i></span>
												<span class="avatar brround mr-3 bg-primary-transparent text-primary"><i class="ri-instagram-line"></i></span>
												<span class="avatar brround mr-3 bg-primary-transparent text-primary"><i class="ri-twitter-line"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('Auth.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\hospital\resources\views/auth/login.blade.php ENDPATH**/ ?>