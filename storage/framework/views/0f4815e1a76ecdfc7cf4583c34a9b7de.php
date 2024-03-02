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


			<!--Change password Modal -->
			<div class="modal fade"  id="changepasswordnmodal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Change Password</h5>
							<button  class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label class="form-label">New Password</label>
								<input type="password" class="form-control" placeholder="password" value="">
							</div>
							<div class="form-group">
								<label class="form-label">Confirm New Password</label>
								<input type="password" class="form-control" placeholder="password" value="">
							</div>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn btn-outline-primary" data-dismiss="modal">Close</a>
							<a href="#" class="btn btn-primary">Confirm</a>
						</div>
					</div>
				</div>
			</div>
			<!-- End Change password Modal  -->

        <!-- Trigger/Open The Modal -->


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


        <script>

            function conertToToman(goalInput,GoalId){
                let txt=document.getElementById(goalInput)
                let txtValue= txt.value;
                const f = new Intl.NumberFormat('fa-IR', {
                    style: 'currency',
                    currency: 'IRR'
                });
                const number = parseFloat(txtValue);
                if (!isNaN(number)) {
                    const formattedNumber = f.format(number);
                    const formattedTomans = formattedNumber.replace(/ریال/g, 'تومان');
                    // Display the formatted number in the "result" div
                    let result = document.getElementById(GoalId);
                    result.innerText =  formattedTomans;
                }
            }




            const f = new Intl.NumberFormat('es-us',{

            })

        </script>


    <script>

        $(".js-example-basic-multiple-limit").select2({
            maximumSelectionLength: 100
        });

    </script>

    <script>

        // Assuming you have a reference to the element
        var element = document.getElementById('buttom');

        // Get the position of the element relative to the viewport
        var elementRect = element.getBoundingClientRect();

        // Check if the element is below the viewport
        if (elementRect.bottom > window.innerHeight) {
            // Scroll the page to show the element
            window.scrollTo({
                top: window.scrollY + elementRect.bottom - window.innerHeight,
                behavior: 'smooth' // This will create a smooth scrolling effect
            });
        }

    </script>



        <script>

            $(document).ready(function() {
                $('.record-checkbox').change(function() {
                    var totalAmount = 0;
                    $('.record-checkbox:checked').each(function() {
                        var amount = $(this).closest('tr').find('td:nth-child(6)').text().replace(/,/g,'');
                        totalAmount += parseInt(amount);
                    });
                    $('#total-amount').val(totalAmount);
                    $('#total-amount-f').text(totalAmount.toLocaleString());
                });
            });



        </script>



            <script>


                $('#due_date_show').MdPersianDateTimePicker({
                    targetDateSelector: '#due_date',        targetTextSelector: '#due_date_show',
                    englishNumber: false,        toDate:true,
                    enableTimePicker: false,        dateFormat: 'yyyy-MM-dd',
                    textFormat: 'yyyy-MM-dd',        groupId: 'rangeSelector1',
                });</script>


            <script>

        function checkoption(){

            const payType = document.getElementById('pay_type');

            const due_date = document.getElementById('due_date');



            if(payType.value === 'cheque'){


                due_date.disabled = false;

            }else{

                due_date.disabled = true;

            }

        }


            </script>



        





































































        <script>
            function confirmDelete(formId) {
                swal({
                    title: 'آیا مطمئن هستید؟',
                    text: 'بعد از حذف این آیتم دیگر قابل بازیابی نخواهد بود!',
                    icon: 'warning',
                    buttons: ["انصراف", "حذف کن"],
                    dangerMode: true
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            document.getElementById(formId).submit();
                            swal('آیتم با موفقیت حذف شد.', {
                                icon: 'success',
                            });
                        }
                    });
            }

            $(function(e) {
                $('.summernote').summernote({
                    placeholder: "متن را اینجا وارد کنید...",
                    tabsize: 3,
                    height: 300
                });
            });
        </script>

    </body>
</html>
<?php /**PATH D:\hospital\resources\views/layout/master.blade.php ENDPATH**/ ?>