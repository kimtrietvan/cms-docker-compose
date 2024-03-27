

<?php $__env->startSection('content'); ?>
    <?php if(addon_is_activated('african_pg')): ?>
        <div class="row">
            <?php if(get_setting('mpesa') == 1): ?>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 h6 text-center"><?php echo e(translate('MPesa Activation')); ?></h3>
                        </div>
                        <div class="card-body text-center">
                            <div class="clearfix">
                                <img class="float-left" src="<?php echo e(static_asset('assets/img/cards/mpesa.png')); ?>" height="30">
                                <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                    <input type="checkbox" onchange="updateSettings(this, 'mpesa')" <?php if(get_setting('mpesa') == 1): ?> checked <?php endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                                <?php echo e(translate('You need to configure Mpesa correctly to enable this feature')); ?>. <a href="<?php echo e(route('payment_method.index')); ?>"><?php echo e(translate('Configure Now')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6 text-center"><?php echo e(translate('flutterwave Activation')); ?></h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="<?php echo e(static_asset('assets/img/cards/flutterwave.png')); ?>" height="30">
                            <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                <input type="checkbox" onchange="updateSettings(this, 'flutterwave')" <?php if(get_setting('flutterwave') == 1): ?> checked <?php endif; ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                            <?php echo e(translate('You need to configure flutterwave correctly to enable this feature')); ?>. <a href="<?php echo e(route('payment_method.index')); ?>"><?php echo e(translate('Configure Now')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6 text-center"><?php echo e(translate('Payfast Activation')); ?></h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="<?php echo e(static_asset('assets/img/cards/payfast.png')); ?>" height="30">
                            <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                <input type="checkbox" onchange="updateSettings(this, 'payfast')" <?php if(get_setting('payfast') == 1): ?> checked <?php endif; ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                            <?php echo e(translate('You need to configure payfast correctly to enable this feature')); ?>. <a href="<?php echo e(route('payment_method.index')); ?>"><?php echo e(translate('Configure Now')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function updateSettings(el, type){
            if($(el).is(':checked')){
                var value = 1;
            }
            else{
                var value = 0;
            }
            $.post('<?php echo e(route('business_settings.update.activation')); ?>', {_token:'<?php echo e(csrf_token()); ?>', type:type, value:value}, function(data){
                if(data == '1'){
                    AIZ.plugins.notify('success', 'Settings updated successfully');
                }
                else{
                    AIZ.plugins.notify('danger', 'Something went wrong');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/african_pg/configurations/activation.blade.php ENDPATH**/ ?>