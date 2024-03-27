<div class="container">
    <?php if( $carts && count($carts) > 0 ): ?>
        <div class="row">
            <div class="col-xxl-8 col-xl-10 mx-auto">
                <div class="border bg-white p-3 p-lg-4 text-left">
                    <div class="mb-4">
                        <!-- Headers -->
                        <div class="row gutters-5 d-none d-lg-flex border-bottom mb-3 pb-3 text-secondary fs-12">
                            <div class="col col-md-1 fw-600"><?php echo e(translate('Qty')); ?></div>
                            <div class="col-md-5 fw-600"><?php echo e(translate('Product')); ?></div>
                            <div class="col fw-600"><?php echo e(translate('Price')); ?></div>
                            <div class="col fw-600"><?php echo e(translate('Tax')); ?></div>
                            <div class="col fw-600"><?php echo e(translate('Total')); ?></div>
                            <div class="col-auto fw-600"><?php echo e(translate('Remove')); ?></div>
                        </div>
                        <!-- Cart Items -->
                        <ul class="list-group list-group-flush">
                            <?php
                                $total = 0;
                            ?>
                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $product = get_single_product($cartItem['product_id']);
                                    $product_stock = $product->stocks->where('variant', $cartItem['variation'])->first();
                                    // $total = $total + ($cartItem['price']  + $cartItem['tax']) * $cartItem['quantity'];
                                    $total = $total + cart_product_price($cartItem, $product, false) * $cartItem['quantity'];
                                    $product_name_with_choice = $product->getTranslation('name');
                                    if ($cartItem['variation'] != null) {
                                        $product_name_with_choice = $product->getTranslation('name').' - '.$cartItem['variation'];
                                    }
                                ?>
                                <li class="list-group-item px-0">
                                    <div class="row gutters-5 align-items-center">
                                        <!-- Quantity -->
                                        <div class="col-md-1 col order-1 order-md-0">
                                            <?php if($cartItem['digital'] != 1 && $product->auction_product == 0): ?>
                                                <div class="d-flex flex-column align-items-start aiz-plus-minus mr-2 ml-0">
                                                    <button
                                                        class="btn col-auto btn-icon btn-sm btn-circle btn-light"
                                                        type="button" data-type="plus"
                                                        data-field="quantity[<?php echo e($cartItem['id']); ?>]">
                                                        <i class="las la-plus"></i>
                                                    </button>
                                                    <input type="number" name="quantity[<?php echo e($cartItem['id']); ?>]"
                                                        class="col border-0 text-left px-0 flex-grow-1 fs-14 input-number"
                                                        placeholder="1" value="<?php echo e($cartItem['quantity']); ?>"
                                                        min="<?php echo e($product->min_qty); ?>"
                                                        max="<?php echo e($product_stock->qty); ?>"
                                                        onchange="updateQuantity(<?php echo e($cartItem['id']); ?>, this)" style="padding-left:0.75rem !important;">
                                                    <button
                                                        class="btn col-auto btn-icon btn-sm btn-circle btn-light"
                                                        type="button" data-type="minus"
                                                        data-field="quantity[<?php echo e($cartItem['id']); ?>]">
                                                        <i class="las la-minus"></i>
                                                    </button>
                                                </div>
                                            <?php elseif($product->auction_product == 1): ?>
                                                <span class="fw-700 fs-14">1</span>
                                            <?php endif; ?>
                                        </div>
                                        <!-- Product Image & name -->
                                        <div class="col-md-5 d-flex align-items-center mb-2 mb-md-0">
                                            <span class="mr-2 ml-0">
                                                <img src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"
                                                    class="img-fit size-70px"
                                                    alt="<?php echo e($product->getTranslation('name')); ?>"
                                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                            </span>
                                            <span class="fs-14"><?php echo e($product_name_with_choice); ?></span>
                                        </div>
                                        <!-- Price -->
                                        <div class="col-md col-4 order-2 order-md-0 my-3 my-md-0">
                                            <span class="opacity-60 fs-12 d-block d-md-none"><?php echo e(translate('Price')); ?></span>
                                            <span class="fw-700 fs-14"><?php echo e(cart_product_price($cartItem, $product, true, false)); ?></span>
                                        </div>
                                        <!-- Tax -->
                                        <div class="col-md col-4 order-3 order-md-0 my-3 my-md-0">
                                            <span class="opacity-60 fs-12 d-block d-md-none"><?php echo e(translate('Tax')); ?></span>
                                            <span class="fw-700 fs-14"><?php echo e(cart_product_tax($cartItem, $product)); ?></span>
                                        </div>
                                        <!-- Total -->
                                        <div class="col-md col-5 order-4 order-md-0 my-3 my-md-0">
                                            <span class="opacity-60 fs-12 d-block d-md-none"><?php echo e(translate('Total')); ?></span>
                                            <span class="fw-700 fs-16 text-primary"><?php echo e(single_price(cart_product_price($cartItem, $product, false) * $cartItem['quantity'])); ?></span>
                                        </div>
                                        <!-- Remove From Cart -->
                                        <div class="col-md-auto col-6 order-5 order-md-0 text-right">
                                            <a href="javascript:void(0)" onclick="removeFromCartView(event, <?php echo e($cartItem['id']); ?>)" class="btn btn-icon btn-sm btn-soft-primary bg-soft-secondary-base hov-bg-primary btn-circle">
                                                <i class="las la-trash fs-16"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <!-- Subtotal -->
                    <div class="px-0 py-2 mb-4 border-top d-flex justify-content-between">
                        <span class="opacity-60 fs-14"><?php echo e(translate('Subtotal')); ?></span>
                        <span class="fw-700 fs-16"><?php echo e(single_price($total)); ?></span>
                    </div>
                    <div class="row align-items-center">
                        <!-- Return to shop -->
                        <div class="col-md-6 text-center text-md-left order-1 order-md-0">
                            <a href="<?php echo e(route('home')); ?>" class="btn btn-link fs-14 fw-700 px-0">
                                <i class="las la-arrow-left fs-16"></i>
                                <?php echo e(translate('Return to shop')); ?>

                            </a>
                        </div>
                        <!-- Continue to Shipping -->
                        <div class="col-md-6 text-center text-md-right">

                            <?php if(get_setting('guest_checkout_activation') == 1 || Auth::check()): ?>
                                <a href="<?php echo e(route('checkout.shipping_info')); ?>" class="btn btn-primary fs-14 fw-700 rounded-0 px-4">
                                    <?php echo e(translate('Continue to Shipping')); ?>

                                </a>
                            <?php else: ?> 
                                <button class="btn btn-primary fs-14 fw-700 rounded-0 px-4" onclick="showLoginModal()"><?php echo e(translate('Continue to Shipping')); ?></button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="border bg-white p-4">
                    <!-- Empty cart -->
                    <div class="text-center p-3">
                        <i class="las la-frown la-3x opacity-60 mb-3"></i>
                        <h3 class="h4 fw-700"><?php echo e(translate('Your Cart is empty')); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script type="text/javascript">
    AIZ.extra.plusMinus();
</script>
<?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/frontend/classic/partials/cart_details.blade.php ENDPATH**/ ?>