

<?php $__env->startSection('content'); ?>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3"><?php echo e(translate('All Payment List')); ?></h1>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-header d-block d-lg-flex">
        <h5 class="mb-0 h6"><?php echo e(translate('Payment List')); ?></h5>
        <div class="">
<!--            <form class="" id="sort_delivery_boys" action="" method="GET">
                <div class="box-inline pad-rgt pull-left">
                    <div class="" style="min-width: 250px;">
                        <input type="text" class="form-control" id="search" name="search"<?php if(isset($sort_search)): ?> value="<?php echo e($sort_search); ?>" <?php endif; ?> placeholder="<?php echo e(translate('Type email or name & Enter')); ?>">
                    </div>
                </div>
            </form>-->
        </div>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(translate('Delivery Boy')); ?></th>
                    <th class="text-center"><?php echo e(translate('Payment Amount')); ?></th>
                    <th class="text-right"><?php echo e(translate('Created At')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $delivery_boy_payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $delivery_boy_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e(($key+1) + ($delivery_boy_payments->currentPage() - 1) * $delivery_boy_payments->perPage()); ?></td>
                    <td>
                        <?php echo e($delivery_boy_payment->user->name); ?>

                    </td>
                    <td class="text-center">
                        <?php echo e($delivery_boy_payment->payment); ?>

                    </td>
                    <td class="text-right">
                        <?php echo e($delivery_boy_payment->created_at); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="aiz-pagination">
            <?php echo e($delivery_boy_payments->appends(request()->input())->links()); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/backend/delivery_boys/delivery_boys_payment_list.blade.php ENDPATH**/ ?>