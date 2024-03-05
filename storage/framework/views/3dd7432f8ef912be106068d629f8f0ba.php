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
                                <th class="text-white"> نام پزشک </th>
                                <th class="text-white">مبلغ صورتحساب(تومان)</th>
                                <th class="text-white">مبلغ پرداختی(تومان)</th>
                                <th class="text-white">مبلغ مانده(تومان)</th>
                                <th class="text-white">توضیحات</th>
                                <th class="text-white">تاریخ ثبت</th>
                                <th class="text-white">وضعیت</th>
                                <th class="text-white">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <th scope="row"><?php echo e($loop->index+1); ?></th>
                                        <td><?php echo e($invoice->doctors->name); ?></td>
                                        <td><?php echo e(number_format($invoice->amount)); ?></td>
                                        <td class="text-success"><?php echo e(number_format($invoice->payments->where('status',1)->sum('amount'))); ?></td>
                                        <td class="text-danger"><?php echo e(number_format($invoice->amount-$invoice->payments->where('status',1)->sum('amount'))); ?></td>
                                        <td><?php echo e($invoice->description); ?></td>
                                        <td><?php echo e($invoice->jalaliDate()); ?></td>
                                        <?php if($invoice->status==1): ?>
                                            <td class="mt-2 badge badge-success">پرداخت شده</td>
                                        <?php endif; ?>
                                        <?php if($invoice->status==0): ?>
                                            <td class="mt-2 badge badge-danger">پرداخت نشده</td>
                                        <?php endif; ?>
                                        <td>

                                                <a href="<?php echo e(route('report.invoice.show',$invoice->id)); ?>" class="btn btn-info">
                                                    <i class="feather feather-eye"></i>
                                                </a>

                                        </td>
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

    <?php $__env->stopSection(); ?>














<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\hospital\resources\views/report/invoice/index.blade.php ENDPATH**/ ?>