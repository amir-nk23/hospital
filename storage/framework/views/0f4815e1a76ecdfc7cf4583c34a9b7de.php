<!DOCTYPE html>
<html lang="fa" dir="rtl">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="DayOne - It is one of the Major Dashboard Template which includes - HR, Employee and Job Dashboard. This template has multipurpose HTML template and also deals with Task, Project, Client and Support System Dashboard." name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="admin dashboard, admin panel template, html admin template, dashboard html template, bootstrap 4 dashboard, template admin bootstrap 4, simple admin panel template, simple dashboard html template,  bootstrap admin panel, task dashboard, job dashboard, bootstrap admin panel, dashboards html, panel in html, bootstrap 4 dashboard"/>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


		<!-- Title -->
		<title>Dayone - Multipurpose Admin & Dashboard Template</title>

        <!-- Title -->
        <title>Dayone - Multipurpose Admin & Dashboard Template</title>

        <!--Favicon -->
        <link rel="icon" href="<?php echo e(asset('style/assets/images/brand/favicon.ico')); ?>" type="image/x-icon"/>

        <!-- Bootstrap css -->
        <link href="<?php echo e(asset('style/assets/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet" />

        <!-- Style css -->
        <link href="<?php echo e(asset('style/assets/css-rtl/style.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('cstyle/modal.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('style/assets/css-rtl/dark.css')); ?>" rel="stylesheet" />
        <link href="<?php echo e(asset('style/assets/css-rtl/skin-modes.css')); ?>" rel="stylesheet" />

        <!-- Animate css -->
        <link href="<?php echo e(asset('style/assets/css-rtl/animated.css')); ?>" rel="stylesheet" />

        <!--Sidemenu css -->
        <link  href="<?php echo e(asset('style/assets/css-rtl/sidemenu.css')); ?>" rel="stylesheet">

        <!-- P-scroll bar css-->
        <link href="<?php echo e(asset('style/assets/plugins/p-scrollbar/p-scrollbar.css')); ?>" rel="stylesheet" />

        <!---Icons css-->
        <link href="<?php echo e(asset('style/assets/css-rtl/icons.css')); ?>" rel="stylesheet" />

        <!---Sidebar css-->
        <link href="<?php echo e(asset('style/assets/plugins/sidebar/sidebar.css')); ?>" rel="stylesheet" />

        <!-- Select2 css -->
        <link href="<?php echo e(asset('select2/dist/css/select2.min.css')); ?>" rel="stylesheet" />


    <!-- PersianDateTimePicker css -->
        <link rel="stylesheet"      href="<?php echo e(asset('PersianDateTimePicker-bs4/src/jquery.md.bootstrap.datetimepicker.style.css')); ?>"/>

        <link href="<?php echo e(asset('cstyle/font.css')); ?>" rel="stylesheet" />
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

	         <?php echo $__env->make('layout.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<div class="app-content main-content vh-100">
					<div class="side-app">

		                	<?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



						        <?php echo $__env->yieldContent('content'); ?>


					</div>

				</div><!-- end app-content-->

			</div>
            <?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>


































        <!-- Back to top -->
        <a href="#top" id="back-to-top"><span class="feather feather-chevrons-up"></span></a>

        <!-- Jquery js-->
        <script src="<?php echo e(asset('style/assets/plugins/jquery/jquery.min.js')); ?>"></script>


        <!-- Bootstrap4 js-->
        <script src="<?php echo e(asset('style/assets/plugins/bootstrap/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('style/assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>

        <!--Othercharts js-->
        <script src="<?php echo e(asset('style/assets/plugins/othercharts/jquery.sparkline.min.js')); ?>"></script>

        <!-- Circle-progress js-->
        <script src="<?php echo e(asset('style/assets/plugins/circle-progress/circle-progress.min.js')); ?>"></script>

        <!--Sidemenu js-->
        <script src="<?php echo e(asset('style/assets/plugins/sidemenu/sidemenu.js')); ?>"></script>

        <!-- P-scroll js-->
        <script src="<?php echo e(asset('style/assets/plugins/p-scrollbar/p-scrollbar.js')); ?>"></script>
        <script src="<?php echo e(asset('style/assets/plugins/p-scrollbar/p-scroll1.js')); ?>"></script>

        <!--Sidebar js-->
        <script src="<?php echo e(asset('style/assets/plugins/sidebar/sidebar.js')); ?>"></script>

        <!-- Select2 js -->

        <script src="<?php echo e(asset('select2/dist/js/select2.min.js')); ?>"></script>

        <!-- Custom js-->
        <script src="<?php echo e(asset('style/assets/js/custom.js')); ?>"></script>

        <!-- PersianDateTimePicker js -->
        <script src="<?php echo e(asset('PersianDateTimePicker-bs4/src/jquery.md.bootstrap.datetimepicker.js')); ?>"
                type="text/javascript"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <?php echo $__env->make('layout.scrtipt ', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH D:\hospital\resources\views/layout/master.blade.php ENDPATH**/ ?>