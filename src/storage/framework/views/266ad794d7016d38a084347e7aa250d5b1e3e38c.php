<div class="bg-white border mb-4">
    <div class="p-3 p-sm-4 fs-16 fw-600">
        <?php echo e(translate('Top Selling Products')); ?>

    </div>
    <div class="px-3 px-sm-4 pb-4">
        <ul class="list-group list-group-flush">
            <?php $__currentLoopData = get_best_selling_products(6, $detailedProduct->user_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $top_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="py-3 px-0 list-group-item border-0">
                    <div class="row gutters-10 align-items-center hov-scale-img hov-shadow-md overflow-hidden has-transition">
                        <div class="col-xl-4 col-lg-6 col-4">
                            <!-- Image -->
                            <a href="<?php echo e(route('product', $top_product->slug)); ?>"
                                class="d-block text-reset">
                                <img class="img-fit lazyload h-80px h-md-150px h-lg-80px has-transition"
                                    src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                    data-src="<?php echo e(uploaded_asset($top_product->thumbnail_img)); ?>"
                                    alt="<?php echo e($top_product->getTranslation('name')); ?>"
                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                            </a>
                        </div>
                        <div class="col text-left">
                            <!-- Product name -->
                            <div class="d-lg-none d-xl-block mb-3">
                                <h4 class="fs-14 fw-400 text-truncate-2">
                                    <a href="<?php echo e(route('product', $top_product->slug)); ?>"
                                        class="d-block text-reset hov-text-primary"><?php echo e($top_product->getTranslation('name')); ?></a>
                                </h4>
                            </div>
                            <div class="">
                                <!-- Price -->
                                <span class="fs-14 fw-700 text-primary"><?php echo e(home_discounted_base_price($top_product)); ?></span>
                                <!-- Home Price -->
                                <?php if(home_price($top_product) != home_discounted_price($top_product)): ?>
                                <del class="fs-14 fw-700 opacity-60 ml-1 ml-lg-0 ml-xl-1">
                                    <?php echo e(home_price($top_product)); ?>

                                </del>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/frontend/product_details/top_selling_products.blade.php ENDPATH**/ ?>