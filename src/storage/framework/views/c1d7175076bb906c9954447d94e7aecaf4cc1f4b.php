<div class="modal fade" id="wallet_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('Recharge Wallet')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body gry-bg px-3 pt-3" style="overflow-y: inherit;">
                <form class="" action="<?php echo e(route('wallet.recharge')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <label><?php echo e(translate('Payment Method')); ?> <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <select class="form-control selectpicker rounded-0"
                                    data-minimum-results-for-search="Infinity" name="payment_option"
                                    data-live-search="true">
                                    <?php if(get_setting('paypal_payment') == 1): ?>
                                        <option value="paypal"><?php echo e(translate('Paypal')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('stripe_payment') == 1): ?>
                                        <option value="stripe"><?php echo e(translate('Stripe')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('mercadopago_payment') == 1): ?>
                                        <option value="mercadopago"><?php echo e(translate('Mercadopago')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('toyyibpay_payment') == 1): ?>
                                        <option value="toyyibpay"><?php echo e(translate('ToyyibPay')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('sslcommerz_payment') == 1): ?>
                                        <option value="sslcommerz"><?php echo e(translate('SSLCommerz')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('instamojo_payment') == 1): ?>
                                        <option value="instamojo"><?php echo e(translate('Instamojo')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('paystack') == 1): ?>
                                        <option value="paystack"><?php echo e(translate('Paystack')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('voguepay') == 1): ?>
                                        <option value="voguepay"><?php echo e(translate('VoguePay')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('payhere') == 1): ?>
                                        <option value="payhere"><?php echo e(translate('Payhere')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('ngenius') == 1): ?>
                                        <option value="ngenius"><?php echo e(translate('Ngenius')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('razorpay') == 1): ?>
                                        <option value="razorpay"><?php echo e(translate('Razorpay')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('iyzico') == 1): ?>
                                        <option value="iyzico"><?php echo e(translate('Iyzico')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('bkash') == 1): ?>
                                        <option value="bkash"><?php echo e(translate('Bkash')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('nagad') == 1): ?>
                                        <option value="nagad"><?php echo e(translate('Nagad')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('payku') == 1): ?>
                                        <option value="payku"><?php echo e(translate('Payku')); ?></option>
                                    <?php endif; ?>
                                    <?php if(get_setting('authorizenet') == 1): ?>
                                        <option value="authorizenet"><?php echo e(translate('Authorize Net')); ?></option>
                                    <?php endif; ?>
                                    
                                    <?php if(addon_is_activated('african_pg')): ?>
                                        <?php if(get_setting('mpesa') == 1): ?>
                                            <option value="mpesa"><?php echo e(translate('Mpesa')); ?></option>
                                        <?php endif; ?>
                                        <?php if(get_setting('flutterwave') == 1): ?>
                                            <option value="flutterwave"><?php echo e(translate('Flutterwave')); ?></option>
                                        <?php endif; ?>
                                        <?php if(get_setting('payfast') == 1): ?>
                                            <option value="payfast"><?php echo e(translate('PayFast')); ?></option>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    
                                    <?php if(addon_is_activated('paytm')): ?>
                                        <?php if(get_setting('paytm_payment')): ?>
                                            <option value="paytm"><?php echo e(translate('Paytm')); ?></option>
                                        <?php endif; ?>
                                        <?php if(get_setting('myfatoorah') == 1): ?>
                                            <option value="myfatoorah"><?php echo e(translate('MyFatoorah')); ?></option>
                                        <?php endif; ?>
                                        <?php if(get_setting('khalti_payment') == 1): ?>
                                            <option value="khalti"><?php echo e(translate('Khalti')); ?></option>
                                        <?php endif; ?>
                                        <?php if(get_setting('phonepe_payment') == 1): ?>
                                            <option value="phonepe"><?php echo e(translate('Phonepe')); ?></option>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label><?php echo e(translate('Amount')); ?> <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" lang="en" class="form-control mb-3 rounded-0" name="amount"
                                placeholder="<?php echo e(translate('Amount')); ?>" required>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit"
                            class="btn btn-sm btn-primary rounded-0 transition-3d-hover mr-1"><?php echo e(translate('Confirm')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/frontend/classic/partials/wallet_modal.blade.php ENDPATH**/ ?>