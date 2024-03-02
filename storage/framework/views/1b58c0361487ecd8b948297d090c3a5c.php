
<!--aside open-->
<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="#">
            <img src="<?php echo e(asset('image/logo.png')); ?>" class="header-brand-img desktop-lgo" alt="Dayonelogo">
            <img src="<?php echo e(asset('image/logo.png')); ?>" class="header-brand-img dark-logo" alt="Dayonelogo">
            <img src="#" class="header-brand-img mobile-logo" alt="Dayonelogo">
            <img src="#" class="header-brand-img darkmobile-logo" alt="Dayonelogo">
        </a>
    </div>
    <div class="app-sidebar3">

        <ul class="side-menu">
            <li class="side-item side-item-category mt-4">Dashboards</li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view users')): ?>
            <li class="slide">

                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="feather  feather-users sidemenu_icon"></i>
                    <span class="side-menu__label">ثبت کاربر</span><i class="angle fa fa-angle-left"></i>
                </a>


                <ul class="slide-menu">
                    <li><a href="<?php echo e(route('superadmin.index')); ?>" class="slide-item">ادمین</a></li>

                </ul>
            </li>
            <?php endif; ?>


            <li class="slide">


                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="feather  feather-users sidemenu_icon"></i>
                    <span class="side-menu__label">پزشک</span><i class="angle fa fa-angle-left"></i>
                </a>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view doctor')): ?>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('doctor.index')); ?>" class="slide-item">پزشک</a></li>
                        
                    </ul>

                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view specialities')): ?>
                <ul class="slide-menu">
                    <li><a href="<?php echo e(route('speciality.index')); ?>" class="slide-item">تخصص</a></li>
                    
                </ul>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view doctor_role')): ?>
                <ul class="slide-menu">
                    <li><a href="<?php echo e(route('doctor.role.index')); ?>" class="slide-item">نقش</a></li>
                    
                </ul>

                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view operation')): ?>
                <ul class="slide-menu">
                    <li><a href="<?php echo e(route('operation.index')); ?>" class="slide-item">عمل ها</a></li>
                    
                </ul>

                <?php endif; ?>

            </li>

            <li class="slide">
                <a class="side-menu__item"  href="<?php echo e(route('insurance.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">بیمه</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item"  href="<?php echo e(route('surgery.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">جراحی</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('setting.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">تنظیمات</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('log.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">فعالبت ها</span>
                </a>
            </li>



            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('preinvoice.filter')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">پرداختی پزشک</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('invoice.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">صورتحساب</span>
                </a>
            </li>



            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('payment.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">پرداختی</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('notification.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">نوتیفیکیشن(ها)</span>
                </a>
            </li>


        </ul>
    </div>
</aside>
<!--aside closed-->
<?php /**PATH E:\hospital\resources\views/layout/aside.blade.php ENDPATH**/ ?>