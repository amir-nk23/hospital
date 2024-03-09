
<!--aside open-->
<aside class="app-sidebar">
    <div class="app-sidebar__logo" style="border-bottom: none">
        <a class="header-brand"  href="#">
            <img src="{{asset('storage/'.$logo)}}" height="80px" width="131px"  style="border-radius: 200px;" class="header-brand-img  desktop-logo" alt="Dayonelogo">
{{--            <img src="{{asset('storage/'.\App\Helpers\Helpers::setting('img')->value)}}" class="header-brand-img dark-logo" alt="Dayonelogo">--}}
            <img src="{{asset('storage/'.$logo)}}" class="header-brand-img  mobile-logo" alt="Dayonelogo">
{{--            <img src="#" class="header-brand-img darkmobile-logo" alt="Dayonelogo">--}}
        </a>
    </div>

    <div class="app-sidebar3">

        <ul class="side-menu mt-5">

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

                @can('view insurance')
            <li class="slide">
                <a class="side-menu__item"  href="{{route('insurance.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">بیمه</span>
                </a>
            </li>
                @endcan

                @can('view surgeries')
            <li class="slide">
                <a class="side-menu__item"  href="{{route('surgery.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">جراحی</span>
                </a>
            </li>
                @endcan


                @can('setting')
            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('setting.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">تنظیمات</span>
                </a>
            </li>
                @endcan



            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('log.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">فعالیت ها</span>
                </a>
            </li>



                @can('view payment')
            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('preinvoice.filter')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">پرداختی پزشک</span>
                </a>
            </li>
                @endcan

                @can('view invoice')
            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('invoice.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">صورتحساب</span>
                </a>
            </li>

                @endcan

                @can('view payment')
            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('payment.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">پرداختی</span>
                </a>
            </li>
                @endcan

                @can('view notification')
            <li class="slide">
                <a class="side-menu__item text-white"  href="{{route('notification.index')}}">
                    <i class="sidemenu_icon"></i>
                    <span class="side-menu__label">نوتیفیکیشن(ها)</span>
                </a>
            </li>
                @endcan


            <li class="slide">

                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="feather  feather-users sidemenu_icon"></i>
                    <span class="side-menu__label">گزارشات</span><i class="angle fa fa-angle-left"></i>
                </a>


                <ul class="slide-menu">
                    <li><a href="{{route('report.invoice.filter')}}" class="slide-item">گزارش صورتحساب</a></li>
                    <li><a href="{{route('report.insurance.filter')}}" class="slide-item">گزارش بیمه</a></li>
                </ul>
            </li>


        </ul>
    </div>
</aside>
<!--aside closed-->
