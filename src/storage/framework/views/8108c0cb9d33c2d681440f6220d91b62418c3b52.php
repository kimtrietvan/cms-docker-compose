

<?php $__env->startSection('panel_content'); ?>
    <div class="card shadow-none rounded-0 border">
        <div class="card-header border-bottom-0">
            <h5 class="mb-0 fs-20 fw-700 text-dark"><?php echo e(translate('Download Your Products')); ?></h5>
        </div>
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead class="text-gray fs-12">
                    <tr>
                        <th class="pl-0"><?php echo e(translate('Product')); ?></th>
                        <th class="pr-0 text-right" width="20%"><?php echo e(translate('Option')); ?></th>
                    </tr>
                </thead>
                <tbody class="fs-14">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $order = get_order_details($order_id->id);
                            ?>
                            <tr>
                                <td class="pl-0">
                                    <a href="<?php echo e(route('product', $order->product->slug)); ?>" class="d-flex align-items-center">
                                        <img class="lazyload img-fit size-80px"
                                            src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                            data-src="<?php echo e(uploaded_asset($order->product->thumbnail_img)); ?>"
                                            alt="<?php echo e($order->product->getTranslation('name')); ?>"
                                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                        <span class="ml-2"><?php echo e($order->product->getTranslation('name')); ?></span>
                                    </a>
                                </td>
                                <td class="pr-0 text-right" style="vertical-align: middle;">
                                    <a class="btn btn-soft-info btn-icon btn-circle btn-sm hov-svg-white" href="<?php echo e(route('digital-products.download', encrypt($order->product->id))); ?>" title="<?php echo e(translate('Download')); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12.001" viewBox="0 0 12 12.001">
                                            <g id="Group_24807" data-name="Group 24807" transform="translate(-1341 -424.999)">
                                              <path id="Union_17" data-name="Union 17" d="M13936.389,851.5l.707-.707,2.355,2.355V846h1v7.1l2.306-2.306.707.707-3.538,3.538Z" transform="translate(-12592.95 -421)" fill="#3490f3"/>
                                              <rect id="Rectangle_18661" data-name="Rectangle 18661" width="12" height="1" transform="translate(1341 436)" fill="#3490f3"/>
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($orders->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.user_panel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/frontend/user/digital_purchase_history.blade.php ENDPATH**/ ?>