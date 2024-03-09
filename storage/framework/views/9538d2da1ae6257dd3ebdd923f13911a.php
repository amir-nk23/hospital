
<!--aside open-->
<aside class="app-sidebar">
    <div class="app-sidebar__logo" style="border-bottom: none">
        <a class="header-brand"  href="#">
            <img src="<?php echo e(asset('storage/'.$logo)); ?>" height="80px" width="131px"  style="border-radius: 200px;" class="header-brand-img  desktop-logo" alt="Dayonelogo">

            <img src="<?php echo e(asset('storage/'.$logo)); ?>" class="header-brand-img  mobile-logo" alt="Dayonelogo">

        </a>
    </div>

    <div class="app-sidebar3">

        <ul class="side-menu mt-5">

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

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view insurance')): ?>
            <li class="slide">
                <a class="side-menu__item"  href="<?php echo e(route('insurance.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">بیمه</span>
                </a>
            </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view surgeries')): ?>
            <li class="slide">
                <a class="side-menu__item"  href="<?php echo e(route('surgery.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">جراحی</span>
                </a>
            </li>
                <?php endif; ?>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting')): ?>
            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('setting.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">تنظیمات</span>
                </a>
            </li>
                <?php endif; ?>



            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('log.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">فعالیت ها</span>
                </a>
            </li>



                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view payment')): ?>
            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('preinvoice.filter')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">پرداختی پزشک</span>
                </a>
            </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view invoice')): ?>
            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('invoice.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">صورتحساب</span>
                </a>
            </li>

                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view payment')): ?>
            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('payment.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">پرداختی</span>
                </a>
            </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view notification')): ?>
            <li class="slide">
                <a class="side-menu__item text-white"  href="<?php echo e(route('notification.index')); ?>">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">نوتیفیکیشن(ها)</span>
                </a>
            </li>
                <?php endif; ?>


            <li class="slide">

                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="feather  feather-users sidemenu_icon"></i>
                    <span class="side-menu__label">گزارشات</span><i class="angle fa fa-angle-left"></i>
                </a>


                <ul class="slide-menu">
                    <li><a href="<?php echo e(route('report.invoice.filter')); ?>" class="slide-item">گزارش صورتحساب</a></li>
                    <li><a href="<?php echo e(route('report.insurance.filter')); ?>" class="slide-item">گزارش بیمه</a></li>
                </ul>
            </li>


        </ul>
    </div>
</aside>
<!--aside closed-->
<?php /**PATH D:\hospital\resources\views/layout/aside.blade.php ENDPATH**/ ?>