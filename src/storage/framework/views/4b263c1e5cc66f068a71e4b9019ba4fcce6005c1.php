

<?php $__env->startSection('content'); ?>

    <!-- Steps -->
    <section class="pt-5 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="row gutters-5 sm-gutters-10">
                        <div class="col done">
                            <div class="text-center border border-bottom-6px p-2 text-success">
                                <i class="la-3x mb-2 las la-shopping-cart"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('1. My Cart')); ?></h3>
                            </div>
                        </div>
                        <div class="col active">
                            <div class="text-center border border-bottom-6px p-2 text-primary">
                                <i class="la-3x mb-2 las la-map cart-animate" style="margin-right: -100px; transition: 2s;"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('2. Shipping info')); ?>

                                </h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center border border-bottom-6px p-2">
                                <i class="la-3x mb-2 opacity-50 las la-truck"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50"><?php echo e(translate('3. Delivery info')); ?>

                                </h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center border border-bottom-6px p-2">
                                <i class="la-3x mb-2 opacity-50 las la-credit-card"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50"><?php echo e(translate('4. Payment')); ?></h3>
                            </div>
                        </div>
                        <div class="col">
                            <div class="text-center border border-bottom-6px p-2">
                                <i class="la-3x mb-2 opacity-50 las la-check-circle"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block opacity-50"><?php echo e(translate('5. Confirmation')); ?>

                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shipping Info -->
    <section class="mb-4 gry-bg">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-xxl-8 col-xl-10 mx-auto">
                    <form class="form-default" id="shipping_info_form" data-toggle="validator" action="<?php echo e(route('checkout.store_shipping_infostore')); ?>" role="form" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="border bg-white p-4 mb-4">
                            <?php if(Auth::check()): ?>
                                <?php $__currentLoopData = Auth::user()->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="border mb-4">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label class="aiz-megabox d-block bg-white mb-0">
                                                    <input type="radio" name="address_id" value="<?php echo e($address->id); ?>" <?php if($address->set_default): ?>
                                                        checked
                                                    <?php endif; ?> required>
                                                    <span class="d-flex p-3 aiz-megabox-elem border-0">
                                                        <!-- Checkbox -->
                                                        <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                        <!-- Address -->
                                                        <span class="flex-grow-1 pl-3 text-left">
                                                            <div class="row">
                                                                <span class="fs-14 text-secondary col-3"><?php echo e(translate('Address')); ?></span>
                                                                <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e($address->address); ?></span>
                                                            </div>
                                                            <div class="row">
                                                                <span class="fs-14 text-secondary col-3"><?php echo e(translate('Postal Code')); ?></span>
                                                                <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e($address->postal_code); ?></span>
                                                            </div>
                                                            <div class="row">
                                                                <span class="fs-14 text-secondary col-3"><?php echo e(translate('City')); ?></span>
                                                                <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e(optional($address->city)->name); ?></span>
                                                            </div>
                                                            <div class="row">
                                                                <span class="fs-14 text-secondary col-3"><?php echo e(translate('State')); ?></span>
                                                                <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e(optional($address->state)->name); ?></span>
                                                            </div>
                                                            <div class="row">
                                                                <span class="fs-14 text-secondary col-3"><?php echo e(translate('Country')); ?></span>
                                                                <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e(optional($address->country)->name); ?></span>
                                                            </div>
                                                            <div class="row">
                                                                <span class="fs-14 text-secondary col-3"><?php echo e(translate('Phone')); ?></span>
                                                                <span class="fs-14 text-dark fw-500 ml-2 col"><?php echo e($address->phone); ?></span>
                                                            </div>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                            <!-- Edit Address Button -->
                                            <div class="col-md-4 p-3 text-right">
                                                <a class="btn btn-sm btn-secondary-base text-white mr-4 rounded-0 px-4" onclick="edit_address('<?php echo e($address->id); ?>')"><?php echo e(translate('Change')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <input type="hidden" name="checkout_type" value="logged">
                                <!-- Add New Address -->
                                <div class="mb-5" >
                                    <div class="border p-3 c-pointer text-center bg-light has-transition hov-bg-soft-light h-100 d-flex flex-column justify-content-center" onclick="add_new_address()">
                                        <i class="las la-plus la-2x mb-3"></i>
                                        <div class="alpha-7 fw-700"><?php echo e(translate('Add New Address')); ?></div>
                                    </div>
                                </div>
                            <?php else: ?>
                                
                                <?php echo $__env->make('frontend.guest_shipping_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <div class="row align-items-center">
                                <!-- Return to shop -->
                                <div class="col-md-6 text-center text-md-left order-1 order-md-0">
                                    <a href="<?php echo e(route('home')); ?>" class="btn btn-link fs-14 fw-700 px-0">
                                        <i class="las la-arrow-left fs-16"></i>
                                        <?php echo e(translate('Return to shop')); ?>

                                    </a>
                                </div>
                                <!-- Continue to Delivery Info -->
                                <div class="col-md-6 text-center text-md-right">
                                    <button 
                                        <?php if(Auth::check()): ?> type="submit" <?php else: ?> type="button" onclick="submitShippingInfoForm(this)" <?php endif; ?>  
                                        class="btn btn-primary fs-14 fw-700 rounded-0 px-4"
                                    >
                                        <?php echo e(translate('Continue to Delivery Info')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <!-- Address Modal -->
    <?php if(Auth::check()): ?>
        <?php echo $__env->make('frontend.'.get_setting('homepage_select').'.partials.address_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/frontend/shipping_info.blade.php ENDPATH**/ ?>