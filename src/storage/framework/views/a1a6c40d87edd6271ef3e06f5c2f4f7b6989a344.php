<div class="card rounded-0 border shadow-none">

    <div class="card-header pt-4 pb-1 border-bottom-0">
        <h3 class="fs-16 fw-700 mb-0"><?php echo e(translate('Summary')); ?></h3>
        <div class="text-right">
            <!-- Items Count -->
            <span class="badge badge-inline badge-primary fs-12 rounded-0 px-2">
                <?php echo e(count($carts)); ?>

                <?php echo e(translate('Items')); ?>

            </span>
            
            <!-- Minimum Order Amount -->
            <?php
                $coupon_discount = 0;
            ?>
            <?php if(get_setting('coupon_system') == 1): ?>
                <?php
                    $coupon_code = null;
                ?>

                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($cartItem->coupon_applied == 1): ?>
                        <?php
                            $coupon_code = $cartItem->coupon_code;
                            break;
                        ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $coupon_discount = $carts->sum('discount');
                ?>
            <?php endif; ?>

            <?php $subtotal_for_min_order_amount = 0; ?>
            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $subtotal_for_min_order_amount += cart_product_price($cartItem, $cartItem->product, false, false) * $cartItem['quantity']; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(get_setting('minimum_order_amount_check') == 1 && $subtotal_for_min_order_amount < get_setting('minimum_order_amount')): ?>
                <span class="badge badge-inline badge-primary fs-12 rounded-0 px-2">
                    <?php echo e(translate('Minimum Order Amount') . ' ' . single_price(get_setting('minimum_order_amount'))); ?>

                </span>
            <?php endif; ?>
            
        </div>
    </div>

    <!-- Club point -->
    <?php if(addon_is_activated('club_point')): ?>
    <div class="px-4 pt-1 w-100 d-flex align-items-center justify-content-between">
        <h3 class="fs-14 fw-700 mb-0"><?php echo e(translate('Total Clubpoint')); ?></h3>
        <div class="text-right">
            <span class="badge badge-inline badge-secondary-base fs-12 rounded-0 px-2 text-white">
                <?php
                    $total_point = 0;
                ?>
                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $product = get_single_product($cartItem['product_id']);
                        $total_point += $product->earn_point * $cartItem['quantity'];
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" class="mr-2">
                    <g id="Group_23922" data-name="Group 23922" transform="translate(-973 -633)">
                      <circle id="Ellipse_39" data-name="Ellipse 39" cx="6" cy="6" r="6" transform="translate(973 633)" fill="#fff"/>
                      <g id="Group_23920" data-name="Group 23920" transform="translate(973 633)">
                        <path id="Path_28698" data-name="Path 28698" d="M7.667,3H4.333L3,5,6,9,9,5Z" transform="translate(0 0)" fill="#f3af3d"/>
                        <path id="Path_28699" data-name="Path 28699" d="M5.33,3h-1L3,5,6,9,4.331,5Z" transform="translate(0 0)" fill="#f3af3d" opacity="0.5"/>
                        <path id="Path_28700" data-name="Path 28700" d="M12.666,3h1L15,5,12,9l1.664-4Z" transform="translate(-5.995 0)" fill="#f3af3d"/>
                      </g>
                    </g>
                </svg>
                <?php echo e($total_point); ?>

            </span>
        </div>
    </div>
    <?php endif; ?>

    <div class="card-body">
        <!-- Products Info -->
        <table class="table">
            <thead>
                <tr>
                    <th class="product-name border-top-0 border-bottom-1 pl-0 fs-12 fw-400 opacity-60"><?php echo e(translate('Product')); ?></th>
                    <th class="product-total text-right border-top-0 border-bottom-1 pr-0 fs-12 fw-400 opacity-60"><?php echo e(translate('Total')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $subtotal = 0;
                    $tax = 0;
                    $shipping = 0;
                    $product_shipping_cost = 0;
                ?>
                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $product = get_single_product($cartItem['product_id']);
                        $subtotal += cart_product_price($cartItem, $product, false, false) * $cartItem['quantity'];
                        $tax += cart_product_tax($cartItem, $product, false) * $cartItem['quantity'];
                        $product_shipping_cost = $cartItem['shipping_cost'];
                        
                        $shipping += $product_shipping_cost;
                        
                        $product_name_with_choice = $product->getTranslation('name');
                        if ($cartItem['variant'] != null) {
                            $product_name_with_choice = $product->getTranslation('name') . ' - ' . $cartItem['variant'];
                        }
                    ?>
                    <tr class="cart_item">
                        <td class="product-name pl-0 fs-14 text-dark fw-400 border-top-0 border-bottom">
                            <?php echo e($product_name_with_choice); ?>

                            <strong class="product-quantity">
                                × <?php echo e($cartItem['quantity']); ?>

                            </strong>
                        </td>
                        <td class="product-total text-right pr-0 fs-14 text-primary fw-600 border-top-0 border-bottom">
                            <span
                                class="pl-4 pr-0"><?php echo e(single_price(cart_product_price($cartItem, $cartItem->product, false, false) * $cartItem['quantity'])); ?></span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <input type="hidden" id="sub_total" value="<?php echo e($subtotal); ?>">

        <table class="table" style="margin-top: 2rem!important;">
            <tfoot>
                <!-- Subtotal -->
                <tr class="cart-subtotal">
                    <th class="pl-0 fs-14 pt-0 pb-2 text-dark fw-600 border-top-0"><?php echo e(translate('Subtotal')); ?></th>
                    <td class="text-right pr-0 fs-14 pt-0 pb-2 fw-600 text-primary border-top-0">
                        <span class="fw-600"><?php echo e(single_price($subtotal)); ?></span>
                    </td>
                </tr>
                <!-- Tax -->
                <tr class="cart-shipping">
                    <th class="pl-0 fs-14 pt-0 pb-2 text-dark fw-600 border-top-0"><?php echo e(translate('Tax')); ?></th>
                    <td class="text-right pr-0 fs-14 pt-0 pb-2 fw-600 text-primary border-top-0">
                        <span class="fw-600"><?php echo e(single_price($tax)); ?></span>
                    </td>
                </tr>
                <!-- Total Shipping -->
                <tr class="cart-shipping">
                    <th class="pl-0 fs-14 pt-0 pb-2 text-dark fw-600 border-top-0"><?php echo e(translate('Total Shipping')); ?></th>
                    <td class="text-right pr-0 fs-14 pt-0 pb-2 fw-600 text-primary border-top-0">
                        <span class="fw-600"><?php echo e(single_price($shipping)); ?></span>
                    </td>
                </tr>
                <!-- Redeem point -->
                <?php if(Session::has('club_point')): ?>
                    <tr class="cart-shipping">
                        <th class="pl-0 fs-14 pt-0 pb-2 text-dark fw-600 border-top-0"><?php echo e(translate('Redeem point')); ?></th>
                        <td class="text-right pr-0 fs-14 pt-0 pb-2 fw-600 text-primary border-top-0">
                            <span class="fw-600"><?php echo e(single_price(Session::get('club_point'))); ?></span>
                        </td>
                    </tr>
                <?php endif; ?>
                <!-- Coupon Discount -->
                <?php if($coupon_discount > 0): ?>
                    <tr class="cart-shipping">
                        <th class="pl-0 fs-14 pt-0 pb-2 text-dark fw-600 border-top-0"><?php echo e(translate('Coupon Discount')); ?></th>
                        <td class="text-right pr-0 fs-14 pt-0 pb-2 fw-600 text-primary border-top-0">
                            <span class="fw-600"><?php echo e(single_price($coupon_discount)); ?></span>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php
                    $total = $subtotal + $tax + $shipping;
                    if (Session::has('club_point')) {
                        $total -= Session::get('club_point');
                    }
                    if ($coupon_discount > 0) {
                        $total -= $coupon_discount;
                    }
                ?>
                <!-- Total -->
                <tr class="cart-total">
                    <th class="pl-0 fs-14 text-dark fw-600"><span class="strong-600"><?php echo e(translate('Total')); ?></span></th>
                    <td class="text-right pr-0 fs-14 fw-600 text-primary">
                        <strong><span><?php echo e(single_price($total)); ?></span></strong>
                    </td>
                </tr>
            </tfoot>
        </table>

        <!-- Coupon System -->
        <?php if(get_setting('coupon_system') == 1): ?>
            <?php if($coupon_discount > 0 && $coupon_code): ?>
                <div class="mt-3">
                    <form class="" id="remove-coupon-form" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <div class="form-control"><?php echo e($coupon_code); ?></div>
                            <div class="input-group-append">
                                <button type="button" id="coupon-remove"
                                    class="btn btn-primary"><?php echo e(translate('Change Coupon')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <div class="mt-3">
                    <form class="" id="apply-coupon-form" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="owner_id" value="<?php echo e($carts[0]['owner_id']); ?>">
                        <div class="input-group">
                            <input type="text" class="form-control rounded-0" name="code"
                                onkeydown="return event.key != 'Enter';"
                                placeholder="<?php echo e(translate('Have coupon code? Apply here')); ?>" required>
                            <div class="input-group-append">
                                <button type="button" id="coupon-apply"
                                    class="btn btn-primary rounded-0"><?php echo e(translate('Apply')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
<?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/frontend/classic/partials/cart_summary.blade.php ENDPATH**/ ?>