<div class="py-3 reviews-area">
    <ul class="list-group list-group-flush">
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($review->user != null): ?>
                <li class="media list-group-item d-flex px-3 px-md-4 border-0">
                    <!-- Review User Image -->
                    <span class="avatar avatar-md mr-3">
                        <img class="lazyload"
                            src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';"
                            <?php if($review->user->avatar_original != null): ?> data-src="<?php echo e(uploaded_asset($review->user->avatar_original)); ?>"
                        <?php else: ?>
                            data-src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>" <?php endif; ?>>
                    </span>
                    <div class="media-body text-left">
                        <!-- Review User Name -->
                        <h3 class="fs-15 fw-600 mb-0"><?php echo e($review->user->name); ?>

                        </h3>
                        <!-- Review Date -->
                        <div class="opacity-60 mb-1">
                            <?php echo e(date('d-m-Y', strtotime($review->created_at))); ?>

                        </div>
                        <!-- Review ratting -->
                        <span class="rating rating-mr-1">
                            <?php for($i = 0; $i < $review->rating; $i++): ?>
                                <i class="las la-star active"></i>
                            <?php endfor; ?>
                            <?php for($i = 0; $i < 5 - $review->rating; $i++): ?>
                                <i class="las la-star"></i>
                            <?php endfor; ?>
                        </span>
                        <!-- Review Comment -->
                        <p class="comment-text mt-2 fs-14">
                            <?php echo e($review->comment); ?>

                        </p>
                        <!-- Review Images -->
                        <div class="spotlight-group d-flex flex-wrap">
                            <?php if($review->photos != null): ?>
                                <?php $__currentLoopData = explode(',', $review->photos); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="spotlight mr-2 mr-md-3 mb-2 mb-md-3 size-60px size-md-90px border overflow-hidden has-transition hov-scale-img hov-border-primary" href="<?php echo e(uploaded_asset($photo)); ?>">
                                    <img class="img-fit h-100 lazyload has-transition"
                                            src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                            data-src="<?php echo e(uploaded_asset($photo)); ?>"
                                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <!-- Variation -->
                        <?php
                            $OrderDetail = get_order_details_by_review($review);
                        ?>
                        <?php if($OrderDetail && $OrderDetail->variation): ?>
                            <small class="text-secondary fs-12"><?php echo e(translate('Variation :')); ?> <?php echo e($OrderDetail->variation); ?></small>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php if(count($reviews) <= 0): ?>
        <div class="text-center fs-18 opacity-70">
            <?php echo e(translate('There have been no reviews for this product yet.')); ?>

        </div>
    <?php endif; ?>
    
    <!-- Pagination -->
    <div class="aiz-pagination product-reviews-pagination py-2 px-4 d-flex justify-content-end">
        <?php echo e($reviews->links()); ?>

    </div>
</div>
<?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/frontend/product_details/reviews.blade.php ENDPATH**/ ?>