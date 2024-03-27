

<?php $__env->startSection('content'); ?>

<div class="row">
    <?php if(addon_is_activated('african_pg')): ?>
        <?php if(get_setting('mpesa') == 1): ?>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6"><?php echo e(translate('Mpesa Credential')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="payment_method" value="mpesa">
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MPESA_CONSUMER_KEY">
                                <div class="col-lg-4">
                                    <label class="col-from-label"><?php echo e(translate('MPESA CONSUMER KEY')); ?></label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="MPESA_CONSUMER_KEY" value="<?php echo e(env('MPESA_CONSUMER_KEY')); ?>" placeholder="<?php echo e(translate('MPESA_CONSUMER_KEY')); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MPESA_CONSUMER_SECRET">
                                <div class="col-lg-4">
                                    <label class="col-from-label"><?php echo e(translate('MPESA CONSUMER SECRET')); ?></label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="MPESA_CONSUMER_SECRET" value="<?php echo e(env('MPESA_CONSUMER_SECRET')); ?>" placeholder="<?php echo e(translate('MPESA_CONSUMER_SECRET')); ?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MPESA_SHORT_CODE">
                                <div class="col-lg-4">
                                    <label class="col-from-label"><?php echo e(translate('MPESA SHORT CODE')); ?></label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="MPESA_SHORT_CODE" value="<?php echo e(env('MPESA_SHORT_CODE')); ?>" placeholder="<?php echo e(translate('MPESA_SHORT_CODE')); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MPESA_USERNAME">
                                <div class="col-lg-4">
                                    <label class="col-from-label"><?php echo e(translate('MPESA USERNAME')); ?></label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="MPESA_USERNAME" value="<?php echo e(env('MPESA_USERNAME')); ?>" placeholder="<?php echo e(translate('MPESA_USERNAME')); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MPESA_PASSWORD">
                                <div class="col-lg-4">
                                    <label class="col-from-label"><?php echo e(translate('MPESA PASSWORD')); ?></label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="MPESA_PASSWORD" value="<?php echo e(env('MPESA_PASSWORD')); ?>" placeholder="<?php echo e(translate('MPESA_PASSWORD')); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MPESA_PASSKEY">
                                <div class="col-lg-4">
                                    <label class="col-from-label"><?php echo e(translate('MPESA PASSKEY')); ?></label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="MPESA_PASSKEY" value="<?php echo e(env('MPESA_PASSKEY')); ?>" placeholder="<?php echo e(translate('MPESA_PASSKEY')); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="types[]" value="MPESA_ENV">
                                <div class="col-lg-4">
                                    <label class="col-from-label"><?php echo e(translate('MPESA SANDBOX ACTIVATION')); ?></label>
                                </div>
                                <div class="col-lg-8">
                                    <select name="MPESA_ENV" class="form-control aiz-selectpicker" required>
                                        <option value="live" <?php if(env('MPESA_ENV') == 'live'): ?> selected <?php endif; ?>><?php echo e(translate('Live')); ?></option>
                                        <option value="sandbox" <?php if(env('MPESA_ENV') == 'sandbox'): ?> selected <?php endif; ?>><?php echo e(translate('Sandbox')); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-right">
                                <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6"><?php echo e(translate('Flutterwave Credential')); ?></h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="payment_method" value="flutterwave">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="FLW_PUBLIC_KEY">
                            <div class="col-lg-4">
                                <label class="col-from-label"><?php echo e(translate('FLW_PUBLIC_KEY')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="FLW_PUBLIC_KEY" value="<?php echo e(env('FLW_PUBLIC_KEY')); ?>" placeholder="<?php echo e(translate('FLW_PUBLIC_KEY')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="FLW_SECRET_KEY">
                            <div class="col-lg-4">
                                <label class="col-from-label"><?php echo e(translate('FLW_SECRET_KEY')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="FLW_SECRET_KEY" value="<?php echo e(env('FLW_SECRET_KEY')); ?>" placeholder="<?php echo e(translate('FLW_SECRET_KEY')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="FLW_SECRET_HASH">
                            <div class="col-lg-4">
                                <label class="col-from-label"><?php echo e(translate('FLW_SECRET_HASH')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="FLW_SECRET_HASH" value="<?php echo e(env('FLW_SECRET_HASH')); ?>" placeholder="<?php echo e(translate('FLW_SECRET_HASH')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="FLW_PAYMENT_CURRENCY_CODE">
                            <div class="col-lg-4">
                                <label class="col-from-label"><?php echo e(translate('FLW_PAYMENT_CURRENCY_CODE')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="FLW_PAYMENT_CURRENCY_CODE" value="<?php echo e(env('FLW_PAYMENT_CURRENCY_CODE')); ?>" placeholder="<?php echo e(translate('FLW_PAYMENT_CURRENCY_CODE')); ?>" required>
                            </div>
                        </div>

                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><?php echo e(translate('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6"><?php echo e(translate('PAYFAST Credential')); ?></h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('payment_method.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="payment_method" value="payfast">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYFAST_MERCHANT_ID">
                            <div class="col-lg-4">
                                <label class="col-from-label"><?php echo e(translate('PAYFAST_MERCHANT_ID')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="PAYFAST_MERCHANT_ID" value="<?php echo e(env('PAYFAST_MERCHANT_ID')); ?>" placeholder="<?php echo e(translate('PAYFAST_MERCHANT_ID')); ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="PAYFAST_MERCHANT_KEY">
                            <div class="col-lg-4">
                                <label class="col-from-label"><?php echo e(translate('PAYFAST_MERCHANT_KEY')); ?></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="PAYFAST_MERCHANT_KEY" value="<?php echo e(env('PAYFAST_MERCHANT_KEY')); ?>" placeholder="<?php echo e(translate('PAYFAST_MERCHANT_KEY')); ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-from-label"><?php echo e(translate('PAYFAST Sandbox Mode')); ?></label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="payfast_sandbox" type="checkbox" <?php if(get_setting('payfast_sandbox') == 1): ?> checked <?php endif; ?>>
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
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/african_pg/configurations/index.blade.php ENDPATH**/ ?>