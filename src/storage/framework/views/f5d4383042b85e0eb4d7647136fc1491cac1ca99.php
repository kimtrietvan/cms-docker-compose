

<?php $__env->startSection('content'); ?>

<div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6 text-center"><?php echo e(translate('Paytm Activation')); ?></h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="<?php echo e(static_asset('assets/img/cards/paytm.jpg')); ?>" height="30">
                            <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                <input type="checkbox" onchange="updateSettings(this, 'paytm_payment')" <?php if(\App\Models\BusinessSetting::where('type', 'paytm_payment')->first()->value == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6 text-center"><?php echo e(translate('ToyyibPay Activation')); ?></h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="<?php echo e(static_asset('assets/img/cards/toyyibpay.png')); ?>" height="30">
                            <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                <input type="checkbox" onchange="updateSettings(this, 'toyyibpay_payment')" <?php if(\App\Models\BusinessSetting::where('type', 'toyyibpay_payment')->first()->value == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6 text-center"><?php echo e(translate('MyFatoorah Activation')); ?></h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="<?php echo e(static_asset('assets/img/cards/myfatoorah.png')); ?>" height="30">
                            <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                <input type="checkbox" onchange="updateSettings(this, 'myfatoorah')" <?php if(get_setting('myfatoorah') == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6 text-center"><?php echo e(translate('PayOS Activation')); ?></h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="<?php echo e(static_asset('assets/img/cards/toyyibpay.png')); ?>" height="30">
                            <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                <input type="checkbox" onchange="updateSettings(this, 'payos_payment')" <?php if(\App\Models\BusinessSetting::where('type', 'payos_payment')->first()->value == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6 text-center"><?php echo e(translate('VNPay Activation')); ?></h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="<?php echo e(static_asset('assets/img/cards/toyyibpay.png')); ?>" height="30">
                            <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                <input type="checkbox" onchange="updateSettings(this, 'vnpay_payment')" <?php if(\App\Models\BusinessSetting::where('type', 'vnpay_payment')->first()->value == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6 text-center"><?php echo e(translate('ZaloPay Activation')); ?></h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="<?php echo e(static_asset('assets/img/cards/toyyibpay.png')); ?>" height="30">
                            <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                <input type="checkbox" onchange="updateSettings(this, 'zalopay_payment')" <?php if(\App\Models\BusinessSetting::where('type', 'zalopay_payment')->first()->value == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
    </div>


<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('Paytm Credential')); ?></h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="<?php echo e(route('paytm.update_credentials')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_ENVIRONMENT">
                        <div class="col-lg-4">
                            <label class="col-from-label"><?php echo e(translate('PAYTM ENVIRONMENT')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_ENVIRONMENT" value="<?php echo e(env('PAYTM_ENVIRONMENT')); ?>" placeholder="local or production" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_MERCHANT_ID">
                        <div class="col-lg-4">
                            <label class="col-from-label"><?php echo e(translate('PAYTM MERCHANT ID')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_MERCHANT_ID" value="<?php echo e(env('PAYTM_MERCHANT_ID')); ?>" placeholder="PAYTM MERCHANT ID" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_MERCHANT_KEY">
                        <div class="col-lg-4">
                            <label class="col-from-label"><?php echo e(translate('PAYTM MERCHANT KEY')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_MERCHANT_KEY" value="<?php echo e(env('PAYTM_MERCHANT_KEY')); ?>" placeholder="PAYTM MERCHANT KEY" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_MERCHANT_WEBSITE">
                        <div class="col-lg-4">
                            <label class="col-from-label"><?php echo e(translate('PAYTM MERCHANT WEBSITE')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_MERCHANT_WEBSITE" value="<?php echo e(env('PAYTM_MERCHANT_WEBSITE')); ?>" placeholder="PAYTM MERCHANT WEBSITE" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_CHANNEL">
                        <div class="col-lg-4">
                            <label class="col-from-label"><?php echo e(translate('PAYTM CHANNEL')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_CHANNEL" value="<?php echo e(env('PAYTM_CHANNEL')); ?>" placeholder="PAYTM CHANNEL" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_INDUSTRY_TYPE">
                        <div class="col-lg-4">
                            <label class="col-from-label"><?php echo e(translate('PAYTM INDUSTRY TYPE')); ?></label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_INDUSTRY_TYPE" value="<?php echo e(env('PAYTM_INDUSTRY_TYPE')); ?>" placeholder="PAYTM INDUSTRY TYPE" >
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6"><?php echo e(translate('ToyyibPay Credential')); ?></h5>
            </div>
            <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route( 'payment_method.update' )); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="payment_method" value="toyyibpay">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TOYYIBPAY_KEY">
                            <div class="col-md-4">
                                <label class="col-from-label"><?php echo e(translate('TOYYIBPAY KEY')); ?></label>
                            </div>
                            <div class="col-md-8">
                            <input type="text" class="form-control" name="TOYYIBPAY_KEY" value="<?php echo e(env('TOYYIBPAY_KEY')); ?>" placeholder="<?php echo e(translate('TOYYIBPAY KEY')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TOYYIBPAY_CATEGORY">
                            <div class="col-md-4">
                                <label class="col-from-label"><?php echo e(translate('TOYYIBPAY CATEGORY')); ?></label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="TOYYIBPAY_CATEGORY" value="<?php echo e(env('TOYYIBPAY_CATEGORY')); ?>" placeholder="<?php echo e(translate('TOYYIBPAY CATEGORY')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-from-label"><?php echo e(translate('ToyyibPay Sandbox Mode')); ?></label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="toyyibpay_sandbox" type="checkbox" <?php if(get_setting('toyyibpay_sandbox') == 1): ?>
                                        checked
                                    <?php endif; ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6 "><?php echo e(translate('MyFatoorah Credential')); ?></h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="payment_method" value="myfatoorah">
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="MYFATOORAH_TOKEN">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('MYFATOORAH TOKEN')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="MYFATOORAH_TOKEN" value="<?php echo e(env('MYFATOORAH_TOKEN')); ?>" placeholder="<?php echo e(translate('MYFATOORAH TOKEN')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('Sandbox Mode')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" name="myfatoorah_sandbox" type="checkbox" <?php if(get_setting('myfatoorah_sandbox') == 1): ?>
                                    checked
                                <?php endif; ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6 "><?php echo e(translate('PayOS Credential')); ?></h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="payment_method" value="payos">
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYOS_CLIENT_ID">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('CLIENT ID')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="PAYOS_CLIENT_ID" value="<?php echo e(env('PAYOS_CLIENT_ID')); ?>" placeholder="<?php echo e(translate('CLIENT_ID')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYOS_API_KEY">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('API KEY')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="PAYOS_API_KEY" value="<?php echo e(env('PAYOS_API_KEY')); ?>" placeholder="<?php echo e(translate('API_KEY')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYOS_CHECKSUM_KEY">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('CHECKSUM KEY')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="PAYOS_CHECKSUM_KEY" value="<?php echo e(env('PAYOS_CHECKSUM_KEY')); ?>" placeholder="<?php echo e(translate('CHECKSUM_KEY')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('Sandbox Mode')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" name="payos_sandbox" type="checkbox" <?php if (get_setting('payos_sandbox') == 1) echo 'checked' ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6 "><?php echo e(translate('VNPay Credential')); ?></h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="payment_method" value="payos">
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="VNPAY_TMNCODE">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('TMNCODE')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="VNPAY_TMNCODE" value="<?php echo e(env('VNPAY_TMNCODE')); ?>" placeholder="<?php echo e(translate('TMNCODE')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="VNPAY_HASHSECRET">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('HASH SECRET')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="VNPAY_HASHSECRET" value="<?php echo e(env('VNPAY_HASHSECRET')); ?>" placeholder="<?php echo e(translate('VNPAY_HASHSECRET')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="VNPAY_URL_PAYMENT">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('URL PAYMENT')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="VNPAY_URL_PAYMENT" value="<?php echo e(env('VNPAY_URL_PAYMENT')); ?>" placeholder="<?php echo e(translate('URL PAYMENT')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--  -->

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6 "><?php echo e(translate('ZaloPay Credential')); ?></h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="payment_method" value="payos">
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="ZALO_APP_ID">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('ZALO_APP_ID')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ZALO_APP_ID" value="<?php echo e(env('ZALO_APP_ID')); ?>" placeholder="<?php echo e(translate('ZALO_APP_ID')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="ZALO_MAC_KEY">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('ZALO_MAC_KEY')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ZALO_MAC_KEY" value="<?php echo e(env('ZALO_MAC_KEY')); ?>" placeholder="<?php echo e(translate('ZALO_MAC_KEY')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="ZALO_CALLBACK_KEY">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('ZALO_CALLBACK_KEY')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ZALO_CALLBACK_KEY" value="<?php echo e(env('ZALO_CALLBACK_KEY')); ?>" placeholder="<?php echo e(translate('ZALO_CALLBACK_KEY')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="ZALO_CREATE_ORDER">
                        <div class="col-md-4">
                            <label class="col-from-label"><?php echo e(translate('ZALO_CREATE_ORDER')); ?></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ZALO_CREATE_ORDER" value="<?php echo e(env('ZALO_CREATE_ORDER')); ?>" placeholder="<?php echo e(translate('ZALO_CREATE_ORDER')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

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
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/paytm/index.blade.php ENDPATH**/ ?>