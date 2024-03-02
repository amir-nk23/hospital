
<!--aside open-->
<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="#">
            <img src="{{asset('image/logo.png')}}" class="header-brand-img desktop-lgo" alt="Dayonelogo">
            <img src="{{asset('image/logo.png')}}" class="header-brand-img dark-logo" alt="Dayonelogo">
            <img src="#" class="header-brand-img mobile-logo" alt="Dayonelogo">
            <img src="#" class="header-brand-img darkmobile-logo" alt="Dayonelogo">
        </a>
    </div>
    <div class="app-sidebar3">

        <ul class="side-menu">
            <li class="side-item side-item-category mt-4">Dashboards</li>
            @can('view users')
            <li class="slide">

                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="feather  feather-users sidemenu_icon"></i>
                    <span class="side-menu__label">ثبت کاربر</span><i class="angle fa fa-angle-left"></i>
                </a>


                <ul class="slide-menu">
                    <li><a href="{{route('superadmin.index')}}" class="slide-item">ادمین</a></li>
{{--                    <li><a href="employee-attendance.html" class="slide-item">دکتر</a></li>--}}
                </ul>
            </li>
            @endcan


            <li class="slide">


                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="feather  feather-users sidemenu_icon"></i>
                    <span class="side-menu__label">پزشک</span><i class="angle fa fa-angle-left"></i>
                </a>


                @can('view doctor')
                    <ul class="slide-menu">
                        <li><a href="{{route('doctor.index')}}" class="slide-item">پزشک</a></li>
                        {{--                    <li><a href="employee-attendance.html" class="slide-item">دکتر</a></li>--}}
                    </ul>

                @endcan

                @can('view specialities')
                <ul class="slide-menu">
                    <li><a href="{{route('speciality.index')}}" class="slide-item">تخصص</a></li>
                    {{--                    <li><a href="employee-attendance.html" class="slide-item">دکتر</a></li>--}}
                </ul>
                @endcan

                @can('view doctor_role')
                <ul class="slide-menu">
                    <li><a href="{{route('doctor.role.index')}}" class="slide-item">نقش</a></li>
                    {{--                    <li><a href="employee-attendance.html" class="slide-item">دکتر</a></li>--}}
                </ul>

                @endcan

                @can('view operation')
                <ul class="slide-menu">
                    <li><a href="{{route('operation.index')}}" class="slide-item">عمل ها</a></li>
                    {{--                    <li><a href="employee-attendance.html" class="slide-item">دکتر</a></li>--}}
                </ul>

                @endcan

            </li>

            <li class="slide">
                <a class="side-menu__item"  href="{{route('insurance.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">بیمه</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item"  href="{{route('surgery.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">جراحی</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('setting.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">تنظیمات</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('log.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">فعالبت ها</span>
                </a>
            </li>



            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('preinvoice.filter')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">پرداختی پزشک</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('invoice.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">صورتحساب</span>
                </a>
            </li>



            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('payment.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">پرداختی</span>
                </a>
            </li>


            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('notification.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">نوتیفیکیشن(ها)</span>
                </a>
            </li>


        </ul>
    </div>
</aside>
<!--aside closed-->
