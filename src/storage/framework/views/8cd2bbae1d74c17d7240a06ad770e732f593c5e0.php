<div class="bg-white border">
    <div class="p-3 p-sm-4">
        <h3 class="fs-16 fw-700 mb-0">
            <span class="mr-4"><?php echo e(translate('Frequently Brought Products')); ?></span>
        </h3>
    </div>
    <div class="px-4">
        <div class="aiz-carousel gutters-5 half-outside-arrow" data-items="5" data-xl-items="3"
            data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2"
            data-arrows='true' data-infinite='true'>
            <?php $__currentLoopData = get_related_products($detailedProduct); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $related_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-box">
                    <div class="aiz-card-box hov-shadow-md my-2 has-transition hov-scale-img">
                        <div class="">
                            <a href="<?php echo e(route('product', $related_product->slug)); ?>"
                                class="d-block">
                                <img class="img-fit lazyload mx-auto h-140px h-md-190px has-transition"
                                    src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                    data-src="<?php echo e(uploaded_asset($related_product->thumbnail_img)); ?>"
                                    alt="<?php echo e($related_product->getTranslation('name')); ?>"
                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                            </a>
                        </div>
                        <div class="p-md-3 p-2 text-center">
                            <h3 class="fw-400 fs-14 text-dark text-truncate-2 lh-1-4 mb-0 h-35px">
                                <a href="<?php echo e(route('product', $related_product->slug)); ?>"
                                    class="d-block text-reset hov-text-primary"><?php echo e($related_product->getTranslation('name')); ?></a>
                            </h3>
                            <div class="fs-14 mt-3">
                                <span class="fw-700 text-primary"><?php echo e(home_discounted_base_price($related_product)); ?></span>
                                <?php if(home_base_price($related_product) != home_discounted_base_price($related_product)): ?>
                                    <del
                                        class="fw-700 opacity-60 ml-1"><?php echo e(home_base_price($related_product)); ?></del>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/frontend/product_details/frequently_brought_products.blade.php ENDPATH**/ ?>