

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
                        <div class="col done">
                            <div class="text-center border border-bottom-6px p-2 text-success">
                                <i class="la-3x mb-2 las la-map"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('2. Shipping info')); ?>

                                </h3>
                            </div>
                        </div>
                        <div class="col active">
                            <div class="text-center border border-bottom-6px p-2 text-primary">
                                <i class="la-3x mb-2 las la-truck cart-animate" style="margin-left: -100px; transition: 2s;"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('3. Delivery info')); ?>

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

    <!-- Delivery Info -->
    <section class="py-4 gry-bg">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-10 mx-auto">
                    <div class="border bg-white p-4 mb-4">
                        <form class="form-default" action="<?php echo e(route('checkout.store_delivery_info')); ?>" role="form" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php
                                $admin_products = array();
                                $seller_products = array();
                                $admin_product_variation = array();
                                $seller_product_variation = array();
                                foreach ($carts as $key => $cartItem){
                                    $product = get_single_product($cartItem['product_id']);

                                    if($product->added_by == 'admin'){
                                        array_push($admin_products, $cartItem['product_id']);
                                        $admin_product_variation[] = $cartItem['variation'];
                                    }
                                    else{
                                        $product_ids = array();
                                        if(isset($seller_products[$product->user_id])){
                                            $product_ids = $seller_products[$product->user_id];
                                        }
                                        array_push($product_ids, $cartItem['product_id']);
                                        $seller_products[$product->user_id] = $product_ids;
                                        $seller_product_variation[] = $cartItem['variation'];
                                    }
                                }
                                
                                $pickup_point_list = array();
                                if (get_setting('pickup_point') == 1) {
                                    $pickup_point_list = get_all_pickup_points();
                                }
                            ?>

                            <!-- Inhouse Products -->
                            <?php if(!empty($admin_products)): ?>
                            <div class="card mb-5 border-0 rounded-0 shadow-none">
                                <div class="card-header py-3 px-0 border-bottom-0">
                                    <h5 class="fs-16 fw-700 text-dark mb-0"><?php echo e(get_setting('site_name')); ?> <?php echo e(translate('Inhouse Products')); ?></h5>
                                </div>
                                <div class="card-body p-0">
                                    <!-- Product List -->
                                    <ul class="list-group list-group-flush border p-3 mb-3">
                                        <?php
                                            $physical = false;
                                        ?>
                                        <?php $__currentLoopData = $admin_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $product = get_single_product($cartItem);
                                                if ($product->digital == 0) {
                                                    $physical = true;
                                                }
                                            ?>
                                            <li class="list-group-item">
                                                <div class="d-flex align-items-center">
                                                    <span class="mr-2 mr-md-3">
                                                        <img src="<?php echo e(get_image($product->thumbnail)); ?>"
                                                            class="img-fit size-60px"
                                                            alt="<?php echo e($product->getTranslation('name')); ?>"
                                                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                                    </span>
                                                    <span class="fs-14 fw-400 text-dark">
                                                        <?php echo e($product->getTranslation('name')); ?>

                                                        <br>
                                                        <?php if($admin_product_variation[$key] != ''): ?>
                                                            <span class="fs-12 text-secondary"><?php echo e(translate('Variation')); ?>: <?php echo e($admin_product_variation[$key]); ?></span>
                                                        <?php endif; ?>
                                                    </span>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <!-- Choose Delivery Type -->
                                    <?php if($physical): ?>
                                        <div class="row pt-3">
                                            <div class="col-md-6">
                                                <h6 class="fs-14 fw-700 mt-3"><?php echo e(translate('Choose Delivery Type')); ?></h6>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row gutters-5">
                                                    <!-- Home Delivery -->
                                                    <?php if(get_setting('shipping_type') != 'carrier_wise_shipping'): ?>
                                                    <div class="col-6">
                                                        <label class="aiz-megabox d-block bg-white mb-0">
                                                            <input
                                                                type="radio"
                                                                name="shipping_type_<?php echo e(get_admin()->id); ?>"
                                                                value="home_delivery"
                                                                onchange="show_pickup_point(this, 'admin')"
                                                                data-target=".pickup_point_id_admin"
                                                                checked
                                                            >
                                                            <span class="d-flex aiz-megabox-elem rounded-0" style="padding: 0.75rem 1.2rem;">
                                                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Home Delivery')); ?></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <!-- Carrier -->
                                                    <?php else: ?>
                                                    <div class="col-6">
                                                        <label class="aiz-megabox d-block bg-white mb-0">
                                                            <input
                                                                type="radio"
                                                                name="shipping_type_<?php echo e(get_admin()->id); ?>"
                                                                value="carrier"
                                                                onchange="show_pickup_point(this, 'admin')"
                                                                data-target=".pickup_point_id_admin"
                                                                checked
                                                            >
                                                            <span class="d-flex aiz-megabox-elem rounded-0" style="padding: 0.75rem 1.2rem;">
                                                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Carrier')); ?></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <?php endif; ?>
                                                    <!-- Local Pickup -->
                                                    <?php if($pickup_point_list): ?>
                                                    <div class="col-6">
                                                        <label class="aiz-megabox d-block bg-white mb-0">
                                                            <input
                                                                type="radio"
                                                                name="shipping_type_<?php echo e(get_admin()->id); ?>"
                                                                value="pickup_point"
                                                                onchange="show_pickup_point(this, 'admin')"
                                                                data-target=".pickup_point_id_admin"
                                                            >
                                                            <span class="d-flex aiz-megabox-elem rounded-0" style="padding: 0.75rem 1.2rem;">
                                                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Local Pickup')); ?></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Pickup Point List -->
                                                <?php if($pickup_point_list): ?>
                                                    <div class="mt-3 pickup_point_id_admin d-none">
                                                        <select
                                                            class="form-control aiz-selectpicker rounded-0"
                                                            name="pickup_point_id_<?php echo e(get_admin()->id); ?>"
                                                            data-live-search="true"
                                                        >
                                                                <option><?php echo e(translate('Select your nearest pickup point')); ?></option>
                                                            <?php $__currentLoopData = $pickup_point_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pick_up_point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option
                                                                    value="<?php echo e($pick_up_point->id); ?>"
                                                                    data-content="<span class='d-block'>
                                                                                    <span class='d-block fs-16 fw-600 mb-2'><?php echo e($pick_up_point->getTranslation('name')); ?></span>
                                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-map-marker'></i> <?php echo e($pick_up_point->getTranslation('address')); ?></span>
                                                                                    <span class='d-block opacity-50 fs-12'><i class='las la-phone'></i><?php echo e($pick_up_point->phone); ?></span>
                                                                                </span>"
                                                                >
                                                                </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Carrier Wise Shipping -->
                                        <?php if(get_setting('shipping_type') == 'carrier_wise_shipping'): ?>
                                            <div class="row pt-3 carrier_id_admin">
                                                <?php $__currentLoopData = $carrier_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrier_key => $carrier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-12 mb-2">
                                                        <label class="aiz-megabox d-block bg-white mb-0">
                                                            <input
                                                                type="radio"
                                                                name="carrier_id_<?php echo e(get_admin()->id); ?>"
                                                                value="<?php echo e($carrier->id); ?>"
                                                                <?php if($carrier_key == 0): ?> checked <?php endif; ?>
                                                            >
                                                            <span class="d-flex p-3 aiz-megabox-elem rounded-0">
                                                                <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                <span class="flex-grow-1 pl-3 fw-600">
                                                                    <img src="<?php echo e(uploaded_asset($carrier->logo)); ?>" alt="Image" class="w-50px img-fit">
                                                                </span>
                                                                <span class="flex-grow-1 pl-3 fw-700"><?php echo e($carrier->name); ?></span>
                                                                <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Transit in').' '.$carrier->transit_time); ?></span>
                                                                <span class="flex-grow-1 pl-3 fw-600"><?php echo e(single_price(carrier_base_price($carts, $carrier->id, get_admin()->id))); ?></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Seller Products -->
                            <?php if(!empty($seller_products)): ?>
                                <?php $__currentLoopData = $seller_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card mb-5 border-0 rounded-0 shadow-none">
                                        <div class="card-header py-3 px-0 border-bottom-0">
                                            <h5 class="fs-16 fw-700 text-dark mb-0"><?php echo e(get_shop_by_user_id($key)->name); ?> <?php echo e(translate('Products')); ?></h5>
                                        </div>
                                        <div class="card-body p-0">
                                            <!-- Product List -->
                                            <ul class="list-group list-group-flush border p-3 mb-3">
                                                <?php
                                                    $physical = false;
                                                ?>
                                                <?php $__currentLoopData = $seller_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $product = get_single_product($cartItem);
                                                        if ($product->digital == 0) {
                                                            $physical = true;
                                                        }
                                                    ?>
                                                    <li class="list-group-item">
                                                        <div class="d-flex align-items-center">
                                                            <span class="mr-2 mr-md-3">
                                                                <img src="<?php echo e(get_image($product->thumbnail)); ?>"
                                                                    class="img-fit size-60px"
                                                                    alt="<?php echo e($product->getTranslation('name')); ?>"
                                                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                                            </span>
                                                            <span class="fs-14 fw-400 text-dark">
                                                                <?php echo e($product->getTranslation('name')); ?>

                                                                <br>
                                                                <?php if($seller_product_variation[$key2] != ''): ?>
                                                                    <span class="fs-12 text-secondary"><?php echo e(translate('Variation')); ?>: <?php echo e($seller_product_variation[$key2]); ?></span>
                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            <!-- Choose Delivery Type -->
                                            <?php if($physical): ?>
                                                <div class="row pt-3">
                                                    <div class="col-md-6">
                                                        <h6 class="fs-14 fw-700 mt-3"><?php echo e(translate('Choose Delivery Type')); ?></h6>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row gutters-5">
                                                            <!-- Home Delivery -->
                                                            <?php if(get_setting('shipping_type') != 'carrier_wise_shipping'): ?>
                                                            <div class="col-6">
                                                                <label class="aiz-megabox d-block bg-white mb-0">
                                                                    <input
                                                                        type="radio"
                                                                        name="shipping_type_<?php echo e($key); ?>"
                                                                        value="home_delivery"
                                                                        onchange="show_pickup_point(this, <?php echo e($key); ?>)"
                                                                        data-target=".pickup_point_id_<?php echo e($key); ?>"
                                                                        checked
                                                                    >
                                                                    <span class="d-flex p-3 aiz-megabox-elem rounded-0" style="padding: 0.75rem 1.2rem;">
                                                                        <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                        <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Home Delivery')); ?></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <!-- Carrier -->
                                                            <?php else: ?>
                                                            <div class="col-6">
                                                                <label class="aiz-megabox d-block bg-white mb-0">
                                                                    <input
                                                                        type="radio"
                                                                        name="shipping_type_<?php echo e($key); ?>"
                                                                        value="carrier"
                                                                        onchange="show_pickup_point(this, <?php echo e($key); ?>)"
                                                                        data-target=".pickup_point_id_<?php echo e($key); ?>"
                                                                        checked
                                                                    >
                                                                    <span class="d-flex p-3 aiz-megabox-elem rounded-0" style="padding: 0.75rem 1.2rem;">
                                                                        <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                        <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Carrier')); ?></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <?php endif; ?>
                                                            <!-- Local Pickup -->
                                                            <?php if($pickup_point_list): ?>
                                                                <div class="col-6">
                                                                    <label class="aiz-megabox d-block bg-white mb-0">
                                                                        <input
                                                                            type="radio"
                                                                            name="shipping_type_<?php echo e($key); ?>"
                                                                            value="pickup_point"
                                                                            onchange="show_pickup_point(this, <?php echo e($key); ?>)"
                                                                            data-target=".pickup_point_id_<?php echo e($key); ?>"
                                                                        >
                                                                        <span class="d-flex p-3 aiz-megabox-elem rounded-0" style="padding: 0.75rem 1.2rem;">
                                                                            <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                            <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Local Pickup')); ?></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>

                                                        <!-- Pickup Point List -->
                                                        <?php if($pickup_point_list): ?>
                                                            <div class="mt-4 pickup_point_id_<?php echo e($key); ?> d-none">
                                                                <select
                                                                    class="form-control aiz-selectpicker rounded-0"
                                                                    name="pickup_point_id_<?php echo e($key); ?>"
                                                                    data-live-search="true"
                                                                >
                                                                    <option><?php echo e(translate('Select your nearest pickup point')); ?></option>
                                                                        <?php $__currentLoopData = $pickup_point_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pick_up_point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option
                                                                            value="<?php echo e($pick_up_point->id); ?>"
                                                                            data-content="<span class='d-block'>
                                                                                            <span class='d-block fs-16 fw-600 mb-2'><?php echo e($pick_up_point->getTranslation('name')); ?></span>
                                                                                            <span class='d-block opacity-50 fs-12'><i class='las la-map-marker'></i> <?php echo e($pick_up_point->getTranslation('address')); ?></span>
                                                                                            <span class='d-block opacity-50 fs-12'><i class='las la-phone'></i><?php echo e($pick_up_point->phone); ?></span>
                                                                                        </span>"
                                                                        >
                                                                        </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                
                                                <!-- Carrier Wise Shipping -->
                                                <?php if(get_setting('shipping_type') == 'carrier_wise_shipping'): ?>
                                                    <div class="row pt-3 carrier_id_<?php echo e($key); ?>">
                                                        <?php $__currentLoopData = $carrier_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrier_key => $carrier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-md-12 mb-2">
                                                                <label class="aiz-megabox d-block bg-white mb-0">
                                                                    <input
                                                                        type="radio"
                                                                        name="carrier_id_<?php echo e($key); ?>"
                                                                        value="<?php echo e($carrier->id); ?>"
                                                                        <?php if($carrier_key == 0): ?> checked <?php endif; ?>
                                                                    >
                                                                    <span class="d-flex p-3 aiz-megabox-elem rounded-0">
                                                                        <span class="aiz-rounded-check flex-shrink-0 mt-1"></span>
                                                                        <span class="flex-grow-1 pl-3 fw-600">
                                                                            <img src="<?php echo e(uploaded_asset($carrier->logo)); ?>" alt="Image" class="w-50px img-fit">
                                                                        </span>
                                                                        <span class="flex-grow-1 pl-3 fw-600"><?php echo e($carrier->name); ?></span>
                                                                        <span class="flex-grow-1 pl-3 fw-600"><?php echo e(translate('Transit in').' '.$carrier->transit_time); ?></span>
                                                                        <span class="flex-grow-1 pl-3 fw-600"><?php echo e(single_price(carrier_base_price($carts, $carrier->id, $key))); ?></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                <?php endif; ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <div class="pt-4 d-flex justify-content-between align-items-center">
                                <!-- Return to shop -->
                                <a href="<?php echo e(route('home')); ?>"  class="btn btn-link fs-14 fw-700 px-0">
                                    <i class="la la-arrow-left fs-16"></i>
                                    <?php echo e(translate('Return to shop')); ?>

                                </a>
                                <!-- Continue to Payment -->
                                <button type="submit" class="btn btn-primary fs-14 fw-700 rounded-0 px-4"><?php echo e(translate('Continue to Payment')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function display_option(key){

        }
        function show_pickup_point(el,type) {
        	var value = $(el).val();
        	var target = $(el).data('target');

        	if(value == 'home_delivery' || value == 'carrier'){
                if(!$(target).hasClass('d-none')){
                    $(target).addClass('d-none');
                }
                $('.carrier_id_'+type).removeClass('d-none');
        	}else{
        		$(target).removeClass('d-none');
        		$('.carrier_id_'+type).addClass('d-none');
        	}
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/frontend/delivery_info.blade.php ENDPATH**/ ?>