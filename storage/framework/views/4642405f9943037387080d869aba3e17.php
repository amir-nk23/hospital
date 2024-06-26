
<!--app header-->
<div class="app-header header">
    <div class="container-fluid">
        <div class="d-flex">






            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#">
                    <i class="feather feather-menu"></i>
                </a>
                <a class="close-toggle" href="#">
                    <i class="feather feather-x"></i>
                </a>
            </div>
            <div class="mt-0">
                <form class="form-inline">
                    <div class="search-element">
                        <input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
                        <button class="btn btn-primary-color" >
                            <i class="feather feather-search"></i>
                        </button>
                    </div>
                </form>
            </div><!-- SEARCH -->
            <div class="d-flex order-lg-2 my-auto mr-auto">
                <a class="nav-link my-auto icon p-0 nav-link-lg d-md-none navsearch" href="#" data-toggle="search">
                    <i class="feather feather-search search-icon header-icon"></i>
                </a>

























































































































                <div class="dropdown header-notify">
                    <a class="nav-link icon" data-toggle="sidebar-right" data-target=".sidebar-right">
                        <i class="feather feather-bell header-icon"></i>
                        <?php if(\App\Helpers\Helpers::notification()->count()>0): ?>
                            <span class="bg-dot"></span>
                        <?php endif; ?>

                    </a>
                </div>
                <div class="dropdown profile-dropdown">
                    <a href="#" class="nav-link pr-1 pl-0 leading-none" data-toggle="dropdown">
												<span>
													<img src="<?php echo e(asset('image/setting.png')); ?>" alt="img" class=" avatar-md bradius">
												</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow animated">
                        <div class="p-3 text-center border-bottom">
                            <a href="#" class="text-center user pb-0 font-weight-bold">َ<?php echo e(auth()->user()->name); ?></a>
                            <p class="text-center user-semi-title">App Developer</p>
                        </div>


                        <a class="dropdown-item d-flex" href="<?php echo e(route('auth.logout')); ?>">
                            <i class="feather feather-power ml-3 fs-16 my-auto"></i>
                            <div class="mt-1">Log Out</div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php /**PATH E:\hospital\resources\views/layout/header.blade.php ENDPATH**/ ?>