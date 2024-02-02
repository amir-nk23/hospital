
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

{{--            <li class="slide">--}}
{{--                <a class="side-menu__item"  href="chat-livechat.html">--}}
{{--                    <i class="feather feather-message-square sidemenu_icon"></i>--}}
{{--                    <span class="side-menu__label">Chat</span>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
</aside>
<!--aside closed-->