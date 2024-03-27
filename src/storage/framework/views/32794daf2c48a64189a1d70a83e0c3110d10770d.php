<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['notifications', 'is_linkable' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['notifications', 'is_linkable' => false]); ?>
<?php foreach (array_filter((['notifications', 'is_linkable' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>


<?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <li class="list-group-item d-flex justify-content-between align-items- py-3">
        <div class="media text-inherit">
            <div class="media-body">
                <p class="mb-1 text-truncate-2">
                    <?php $user_type = auth()->user()->user_type; ?>

                    <?php if($notification->type == 'App\Notifications\OrderNotification'): ?>
                        <?php echo e(translate('Order code: ')); ?>

                        <?php if($is_linkable): ?>
                            <?php
                                if ($user_type == 'admin'){
                                    $route = route('all_orders.show', encrypt($notification->data['order_id']));
                                }
                                if ($user_type == 'seller'){
                                    $route = route('seller.orders.show', encrypt($notification->data['order_id']));
                                }
                            ?>
                            <a href="<?php echo e($route); ?>">
                        <?php endif; ?>

                        <?php echo e($notification->data['order_code']); ?>


                        <?php if($is_linkable): ?>
                            </a>
                        <?php endif; ?>
                        
                        <?php echo e(translate(' has been ' . ucfirst(str_replace('_', ' ', $notification->data['status'])))); ?>

                        
                    <?php elseif($notification->type == 'App\Notifications\ShopVerificationNotification'): ?>
                        <?php if($user_type == 'admin'): ?>
                            <?php if($is_linkable): ?>
                                <a href="<?php echo e(route('sellers.show_verification_request', $notification->data['id'])); ?>">
                            <?php endif; ?>
                            <?php echo e($notification->data['name']); ?>: 
                            <?php if($is_linkable): ?>
                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php echo e(translate('Your ')); ?>

                        <?php endif; ?>
                        <?php echo e(translate('verification request has been '.$notification->data['status'])); ?>

                    <?php elseif($notification->type == 'App\Notifications\ShopProductNotification'): ?>
                        <?php 
                            $product_id     = $notification->data['id'];
                            $product_type   = $notification->data['type'];
                            $product_name   = $notification->data['name'];
                            $lang           = env('DEFAULT_LANGUAGE');

                            $route = $user_type == 'admin'
                                    ? ( $product_type == 'physical'
                                        ? route('products.seller.edit', ['id'=>$product_id, 'lang'=>$lang])
                                        : route('digitalproducts.edit', ['id'=>$product_id, 'lang'=>$lang] ))
                                    : ( $product_type == 'physical'
                                        ? route('seller.products.edit', ['id'=>$product_id, 'lang'=>$lang]) 
                                        : route('seller.digitalproducts.edit',  ['id'=>$product_id, 'lang'=>$lang] ));
                        ?>

                        <?php echo e(translate('Product : ')); ?>

                        <?php if($is_linkable): ?>
                            <a href="<?php echo e($route); ?>"><?php echo e($product_name); ?></a>
                        <?php else: ?>
                            <?php echo e($product_name); ?>

                        <?php endif; ?>
                        
                        <?php echo e(translate(' is').' '.$notification->data['status']); ?>

                    <?php elseif($notification->type == 'App\Notifications\PayoutNotification'): ?>
                        <?php 
                            $route = $user_type == 'admin'
                                    ? ( $notification->data['status'] == 'pending' ? route('withdraw_requests_all') : route('sellers.payment_histories'))
                                    : ( $notification->data['status'] == 'pending' ? route('seller.money_withdraw_requests.index') : route('seller.payments.index'));
                            
                        ?>

                         <?php echo e($user_type == 'admin' ? $notification->data['name'].': ' : translate('Your')); ?>

                         <?php if($is_linkable ): ?>
                             <a href="<?php echo e($route); ?>"><?php echo e(translate('payment')); ?></a>
                         <?php else: ?>
                             <?php echo e(translate('payment')); ?>

                         <?php endif; ?>
                         <?php echo e(single_price($notification->data['payment_amount']).' '.translate('is').' '.translate($notification->data['status'])); ?>

                    <?php endif; ?>
                </p>
                <small class="text-muted">
                    <?php echo e(date('F j Y, g:i a', strtotime($notification->created_at))); ?>

                </small>
            </div>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <li class="list-group-item">
        <div class="py-4 text-center fs-16">
            <?php echo e(translate('No notification found')); ?>

        </div>
    </li>
<?php endif; ?>
<?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/components/notification.blade.php ENDPATH**/ ?>