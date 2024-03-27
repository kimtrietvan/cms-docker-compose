<?php
    $data_items = '14';
    $data_xl_items = '10';
    $data_lg_items = '9';
    $data_md_items = '7';
    $data_md_items = '5';
    $data_xs_items = '3';

    if (get_setting('vendor_system_activation') == 1){
        $data_items = '6.5';
        $data_xl_items = '5';
        $data_lg_items = '4.5';
    }
?>
<!-- brands -->
<div class="aiz-carousel dashboard-box-carousel half-outside-arrow" data-items="<?php echo e($data_items); ?>" data-xl-items="<?php echo e($data_xl_items); ?>"
    data-lg-items="<?php echo e($data_lg_items); ?>" data-md-items="<?php echo e($data_md_items); ?>" data-sm-items="<?php echo e($data_md_items); ?>" data-xs-items="<?php echo e($data_xs_items); ?>" data-arrows='true'>
    <?php
        $top_brands_product_limit = 1;
    ?>
    <?php $__currentLoopData = $top_brands_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $top_brands_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="carousel-box top_brands_products <?php if($key == $top_brands2[0]): ?> active <?php endif; ?>" onclick="top_brands_products(<?php echo e($key); ?>, this)">
            <div class="size-80px border border-dashed rounded-2 overflow-hidden p-1">
                <div class="h-100 rounded-2 overflow-hidden d-flex align-items-center">
                    <img src="<?php echo e(uploaded_asset($top_brands_product[0]->logo)); ?>" alt="<?php echo e(translate('brands')); ?>"
                        class="img-fit lazyload" onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                </div>
            </div>
            <p class="fs-11 fw-400 text-soft-dark text-truncate-2 h-30px px-1 w-80px">
                <?php
                    $lang = App::getLocale();
                    $brand = App\Models\BrandTranslation::where('brand_id', $top_brands_product[0]->brand_id)
                        ->where('lang', $lang)
                        ->first();
                ?>
                <?php echo e($brand ? $brand->name : translate('Not Found')); ?>

            </p>
        </div>
        
        <?php
            $top_brands_product_limit++;
            if($top_brands_product_limit > 15)
                break;
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- brand products -->
<div class="position-relative">
    <?php
        $top_brands_product_limit = 1;
    ?>
    <?php $__currentLoopData = $top_brands_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $top_brands_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="top_brands_product_table top-products-table table-responsive c-scrollbar-light <?php if($key == $top_brands2[0]): ?> show <?php endif; ?>" style="max-height: 215px; width: 100%;" id="top_brands_product_table_<?php echo e($key); ?>">
            <table class="table dashboard-table mb-0">
                <thead>
                    <tr class="fs-11 fw-600 text-secondary">
                        <th class="pl-0 border-top-0 border-bottom-1"><?php echo e(translate('Item')); ?></th>
                        <th class="border-top-0 border-bottom-1"><?php echo e(translate('Quantity')); ?></th>
                        <th class="text-right pr-1 border-top-0 border-bottom-1"><?php echo e(translate('Total Price')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $top_brands_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $product_img = null;
                            if($row->product_thumbnail_img){
                                $product_img = ($row->product_thumbnail_img->external_link == null) ? my_asset($row->product_thumbnail_img->file_name) : $row->product_thumbnail_img->external_link;
                            }
                            $product_url = route('product', $row->product_slug);
                            if ($row->auction_product == 1) {
                                $product_url = route('auction-product', $row->product_slug);
                            }
                        ?>
                        <tr>
                            <td class="pl-0" style="vertical-align: middle">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-2 overflow-hidden"
                                        style="min-height: 48px !important; min-width: 48px !important;max-height: 48px !important; max-width: 48px !important;">
                                        <a href="<?php echo e($product_url); ?>" class="d-block" target="_blank">
                                            <img src="<?php echo e($product_img); ?>" alt="<?php echo e(translate('category')); ?>" 
                                                class="h-100 img-fit lazyload" onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                        </a>
                                    </div>
                                    <a href="<?php echo e($product_url); ?>" target="_blank" class="d-block text-soft-dark fw-400 hov-text-primary ml-2 fs-13" title="<?php echo e($row->product_name); ?>">
                                        <?php echo e(Str::limit($row->product_name, 50, ' ...')); ?>

                                    </span>
                                </div>
                            </td>
                            <td style="vertical-align: middle" class="text-soft-dark fw-700">
                                X <?php echo e($row->sales); ?>

                            </td>
                            <td style="vertical-align: middle" class="text-soft-dark fw-700 text-right pr-1">
                                <?php echo e(single_price($row->total)); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        
        <?php
            $top_brands_product_limit++;
            if($top_brands_product_limit > 15)
                break;
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/backend/dashboard/top_brands_products_section.blade.php ENDPATH**/ ?>