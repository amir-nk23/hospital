<!DOCTYPE html>
<html lang="fa" dir="rtl">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="DayOne - It is one of the Major Dashboard Template which includes - HR, Employee and Job Dashboard. This template has multipurpose HTML template and also deals with Task, Project, Client and Support System Dashboard." name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="admin dashboard, admin panel template, html admin template, dashboard html template, bootstrap 4 dashboard, template admin bootstrap 4, simple admin panel template, simple dashboard html template,  bootstrap admin panel, task dashboard, job dashboard, bootstrap admin panel, dashboards html, panel in html, bootstrap 4 dashboard"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">


		<!-- Title -->
		<title>Dayone - Multipurpose Admin & Dashboard Template</title>

        <!-- Title -->
        <title>Dayone - Multipurpose Admin & Dashboard Template</title>

        <!--Favicon -->
        <link rel="icon" href="{{asset('style/assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

        <!-- Bootstrap css -->
        <link href="{{asset('style/assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />

        <!-- Style css -->
        <link href="{{asset('style/assets/css-rtl/style.css')}}" rel="stylesheet" />
        <link href="{{asset('cstyle/modal.css')}}" rel="stylesheet" />
        <link href="{{asset('style/assets/css-rtl/dark.css')}}" rel="stylesheet" />
        <link href="{{asset('style/assets/css-rtl/skin-modes.css')}}" rel="stylesheet" />

        <!-- Animate css -->
        <link href="{{asset('style/assets/css-rtl/animated.css')}}" rel="stylesheet" />

        <!--Sidemenu css -->
        <link  href="{{asset('style/assets/css-rtl/sidemenu.css')}}" rel="stylesheet">

        <!-- P-scroll bar css-->
        <link href="{{asset('style/assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

        <!---Icons css-->
        <link href="{{asset('style/assets/css-rtl/icons.css')}}" rel="stylesheet" />

        <!---Sidebar css-->
        <link href="{{asset('style/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet" />

        <!-- Select2 css -->
        <link href="{{asset('select2/dist/css/select2.min.css')}}" rel="stylesheet" />
{{--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}

    <!-- PersianDateTimePicker css -->
        <link rel="stylesheet"      href="{{ asset('PersianDateTimePicker-bs4/src/jquery.md.bootstrap.datetimepicker.style.css') }}"/>

        <link href="{{asset('cstyle/font.css')}}" rel="stylesheet" />
    </head>

	<body class="app sidebar-mini">

		<!---Global-loader-->
		<div id="global-loader" >
            <div  class="card-body" style="margin-top:15%;">
                <div class="dimmer active">
                    <div class="sk-folding-cube">
                        <div class="sk-cube1 sk-cube"></div>
                        <div class="sk-cube2 sk-cube"></div>
                        <div class="sk-cube4 sk-cube"></div>
                        <div class="sk-cube3 sk-cube"></div>
                    </div>
                </div>
            </div>
		</div>


		<div class="page">
			<div class="page-main ">

	         @include('layout.aside')

				<div class="app-content main-content vh-100">
					<div class="side-app">

		                	@include('layout.header')



						        @yield('content')


					</div>

				</div><!-- end app-content-->

			</div>
            @include('layout.sidebar')

            @include('layout.footer')
        </div>




        <!-- Back to top -->
        <a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>

        <!-- Jquery js-->
        <script src="{{asset('style/assets/plugins/jquery/jquery.min.js')}}"></script>


        <!-- Bootstrap4 js-->
        <script src="{{asset('style/assets/plugins/bootstrap/popper.min.js')}}"></script>
        <script src="{{asset('style/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

        <!--Othercharts js-->
        <script src="{{asset('style/assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

        <!-- Circle-progress js-->
        <script src="{{asset('style/assets/plugins/circle-progress/circle-progress.min.js')}}"></script>

        <!--Sidemenu js-->
        <script src="{{asset('style/assets/plugins/sidemenu/sidemenu.js')}}"></script>

        <!-- P-scroll js-->
        <script src="{{asset('style/assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
        <script src="{{asset('style/assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>

        <!--Sidebar js-->
        <script src="{{asset('style/assets/plugins/sidebar/sidebar.js')}}"></script>

        <!-- Select2 js -->
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
        <script src="{{asset('select2/dist/js/select2.min.js')}}"></script>

        <!-- Custom js-->
        <script src="{{asset('style/assets/js/custom.js')}}"></script>

        <!-- PersianDateTimePicker js -->
        <script src="{{ asset('PersianDateTimePicker-bs4/src/jquery.md.bootstrap.datetimepicker.js') }}"
                type="text/javascript"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    @include('layout.script ')
    </body>
</html>
