<?php $__env->startSection('content'); ?>

    <div class="page">
        <div class="page-main is-expanded">
            <div class="row">
                <div class="col-md-12 col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-header d-xl-flex d-block">

                            <h3 class="card-title">لیست صورتحساب</h3>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap table-primary mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white">ردیف</th>
                                <th class="text-white"> تیتر </th>
                                <th class="text-white">متن</th>
                                <th class="text-white">دیده شده در تاریخ</th>
                                <th class="text-white">فرستاده شدن در تاریخ</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $notifs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <td><?php echo e($notif->title); ?></td>
                                        <td><?php echo e($notif->body); ?></td>
                                        <?php if($notif->viewed_at == null): ?>

                                            <td></td>

                                        <?php else: ?>

                                            <td><?php echo e(verta($notif->viewed_at)); ?></td>

                                        <?php endif; ?>

                                        <td><?php echo e($notif->jalaliDate('created_at')); ?></td>
                                    </tr>



































                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </tbody>
                            </table>

                        </div>
                        <!-- table-responsive -->

                </div>
            </div>
        </div>
        </div>


        <script>

            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

        </script>
    <?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/notification/index.blade.php ENDPATH**/ ?>