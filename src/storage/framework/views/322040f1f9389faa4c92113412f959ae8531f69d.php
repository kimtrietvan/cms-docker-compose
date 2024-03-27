

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
                        <div class="col done">
                            <div class="text-center border border-bottom-6px p-2 text-success">
                                <i class="la-3x mb-2 las la-truck"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('3. Delivery info')); ?>

                                </h3>
                            </div>
                        </div>
                        <div class="col active">
                            <div class="text-center border border-bottom-6px p-2 text-primary">
                                <i class="la-3x mb-2 las la-credit-card cart-animate"
                                    style="margin-right: -100px; transition: 2s;"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block"><?php echo e(translate('4. Payment')); ?></h3>
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

    <!-- Payment Info -->
    <section class="mb-4">
        <div class="container text-left">
            <div class="row">
                <div class="col-lg-8">
                    <form action="<?php echo e(route('payment.checkout')); ?>" class="form-default" role="form" method="POST"
                        id="checkout-form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="owner_id" value="<?php echo e($carts[0]['owner_id']); ?>">

                        <div class="card rounded-0 border shadow-none">
                            <!-- Additional Info -->
                            <div class="card-header p-4 border-bottom-0">
                                <h3 class="fs-16 fw-700 text-dark mb-0">
                                    <?php echo e(translate('Any additional info?')); ?>

                                </h3>
                            </div>
                            <div class="form-group px-4">
                                <textarea name="additional_info" rows="5" class="form-control rounded-0"
                                    placeholder="<?php echo e(translate('Type your text...')); ?>"></textarea>
                            </div>

                            <div class="card-header p-4 border-bottom-0">
                                <h3 class="fs-16 fw-700 text-dark mb-0">
                                    <?php echo e(translate('Select a payment option')); ?>

                                </h3>
                            </div>
                            <!-- Payment Options -->
                            <div class="card-body text-center px-4 pt-0">
                                <div class="row gutters-10">
                                    <!-- Paypal -->
                                    <?php if(get_setting('paypal_payment') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="paypal" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/paypal.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('Paypal')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!--Stripe -->
                                    <?php if(get_setting('stripe_payment') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="stripe" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/stripe.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('Stripe')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- Mercadopago -->
                                    <?php if(get_setting('mercadopago_payment') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="mercadopago" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/mercadopago.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15"><?php echo e(translate('Mercadopago')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- sslcommerz -->
                                    <?php if(get_setting('sslcommerz_payment') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="sslcommerz" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/sslcommerz.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15"><?php echo e(translate('sslcommerz')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- instamojo -->
                                    <?php if(get_setting('instamojo_payment') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="instamojo" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/instamojo.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15"><?php echo e(translate('Instamojo')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- razorpay -->
                                    <?php if(get_setting('razorpay') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="razorpay" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/rozarpay.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15"><?php echo e(translate('Razorpay')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- paystack -->
                                    <?php if(get_setting('paystack') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="paystack" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/paystack.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15"><?php echo e(translate('Paystack')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- voguepay -->
                                    <?php if(get_setting('voguepay') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="voguepay" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/vogue.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15"><?php echo e(translate('VoguePay')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- payhere -->
                                    <?php if(get_setting('payhere') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="payhere" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/payhere.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15"><?php echo e(translate('payhere')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- ngenius -->
                                    <?php if(get_setting('ngenius') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="ngenius" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/ngenius.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15"><?php echo e(translate('ngenius')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- iyzico -->
                                    <?php if(get_setting('iyzico') == 1 && false): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="iyzico" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/iyzico.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15"><?php echo e(translate('Iyzico')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- nagad -->
                                    <?php if(get_setting('nagad') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="nagad" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/nagad.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('Nagad')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- bkash -->
                                    <?php if(get_setting('bkash') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="bkash" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/bkash.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('Bkash')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- aamarpay -->
                                    <?php if(get_setting('aamarpay') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="aamarpay" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/aamarpay.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15"><?php echo e(translate('Aamarpay')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- authorizenet -->
                                    <?php if(get_setting('authorizenet') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="authorizenet" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/authorizenet.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span
                                                            class="d-block fw-600 fs-15"><?php echo e(translate('Authorize Net')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- payku -->
                                    <?php if(get_setting('payku') == 1): ?>
                                        <div class="col-6 col-xl-3 col-md-4">
                                            <label class="aiz-megabox d-block mb-3">
                                                <input value="payku" class="online_payment" type="radio"
                                                    name="payment_option" checked>
                                                <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                    <img src="<?php echo e(static_asset('assets/img/cards/payku.png')); ?>"
                                                        class="img-fit mb-2">
                                                    <span class="d-block text-center">
                                                        <span class="d-block fw-600 fs-15"><?php echo e(translate('Payku')); ?></span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <!-- African Payment Getaway -->
                                    <?php if(addon_is_activated('african_pg')): ?>
                                        <!-- flutterwave -->
                                        <?php if(get_setting('flutterwave') == 1): ?>
                                            <div class="col-6 col-xl-3 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="flutterwave" class="online_payment" type="radio"
                                                        name="payment_option" checked>
                                                    <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/flutterwave.png')); ?>"
                                                            class="img-fit mb-2">
                                                        <span class="d-block text-center">
                                                            <span
                                                                class="d-block fw-600 fs-15"><?php echo e(translate('flutterwave')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <!-- payfast -->
                                        <?php if(get_setting('payfast') == 1): ?>
                                            <div class="col-6 col-xl-3 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="payfast" class="online_payment" type="radio"
                                                        name="payment_option" checked>
                                                    <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/payfast.png')); ?>"
                                                            class="img-fit mb-2">
                                                        <span class="d-block text-center">
                                                            <span
                                                                class="d-block fw-600 fs-15"><?php echo e(translate('payfast')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    
                                    <!--paytm -->
                                    <?php if(addon_is_activated('paytm')): ?>
                                        <?php if(get_setting('paytm_payment') == 1): ?>
                                            <div class="col-6 col-xl-3 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="paytm" class="online_payment" type="radio"
                                                        name="payment_option" checked>
                                                    <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/paytm.jpg')); ?>"
                                                            class="img-fit mb-2">
                                                        <span class="d-block text-center">
                                                            <span
                                                                class="d-block fw-600 fs-15"><?php echo e(translate('Paytm')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <!-- toyyibpay -->
                                        <?php if(get_setting('toyyibpay_payment') == 1): ?>
                                            <div class="col-6 col-xl-3 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="toyyibpay" class="online_payment" type="radio"
                                                        name="payment_option" checked>
                                                    <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/toyyibpay.png')); ?>"
                                                            class="img-fit mb-2">
                                                        <span class="d-block text-center">
                                                            <span
                                                                class="d-block fw-600 fs-15"><?php echo e(translate('ToyyibPay')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <!-- myfatoorah -->
                                        <?php if(get_setting('myfatoorah') == 1): ?>
                                            <div class="col-6 col-xl-3 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="myfatoorah" class="online_payment" type="radio"
                                                        name="payment_option" checked>
                                                    <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/myfatoorah.png')); ?>"
                                                            class="img-fit mb-2">
                                                        <span class="d-block text-center">
                                                            <span
                                                                class="d-block fw-600 fs-15"><?php echo e(translate('MyFatoorah')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <!-- khalti -->
                                        <?php if(get_setting('khalti_payment') == 1): ?>
                                            <div class="col-6 col-xl-3 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="Khalti" class="online_payment" type="radio"
                                                        name="payment_option" checked>
                                                    <span class="d-block aiz-megabox-elem p-3">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/khalti.png')); ?>"
                                                            class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span
                                                                class="d-block fw-600 fs-15"><?php echo e(translate('Khalti')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <!-- phonepe -->
                                        <?php if(get_setting('phonepe_payment') == 1): ?>
                                            <div class="col-6 col-xl-3 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="phonepe" class="online_payment" type="radio"
                                                        name="payment_option" checked>
                                                    <span class="d-block aiz-megabox-elem p-3">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/phonepe.png')); ?>"
                                                            class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span
                                                                class="d-block fw-600 fs-15"><?php echo e(translate('Phonepe')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('payos_payment') == 1): ?>
                                            <div class="col-6 col-xl-3 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="payos" class="online_payment" type="radio"
                                                        name="payment_option" checked>
                                                    <span class="d-block aiz-megabox-elem p-3">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/phonepe.png')); ?>"
                                                            class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span
                                                                class="d-block fw-600 fs-15"><?php echo e(translate('Payos')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('vnpay_payment') == 1): ?>
                                            <div class="col-6 col-xl-3 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="vnpay" class="online_payment" type="radio"
                                                        name="payment_option" checked>
                                                    <span class="d-block aiz-megabox-elem p-3">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/phonepe.png')); ?>"
                                                            class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span
                                                                class="d-block fw-600 fs-15"><?php echo e(translate('VNPay')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <?php if(get_setting('zalopay_payment') == 1): ?>
                                            <div class="col-6 col-xl-3 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="zalopay" class="online_payment" type="radio"
                                                        name="payment_option" checked>
                                                    <span class="d-block aiz-megabox-elem p-3">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/phonepe.png')); ?>"
                                                            class="img-fluid mb-2">
                                                        <span class="d-block text-center">
                                                            <span
                                                                class="d-block fw-600 fs-15"><?php echo e(translate('ZaloPay')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <!-- Payos -->
                                    <?php endif; ?>

                                    <!-- Cash Payment -->
                                    <?php if(get_setting('cash_payment') == 1): ?>
                                        <?php
                                            $digital = 0;
                                            $cod_on = 1;
                                            foreach ($carts as $cartItem) {
                                                $product = get_single_product($cartItem['product_id']);
                                                if ($product['digital'] == 1) {
                                                    $digital = 1;
                                                }
                                                if ($product['cash_on_delivery'] == 0) {
                                                    $cod_on = 0;
                                                }
                                            }
                                        ?>
                                        <?php if($digital != 1 && $cod_on == 1): ?>
                                            <div class="col-6 col-xl-3 col-md-4">
                                                <label class="aiz-megabox d-block mb-3">
                                                    <input value="cash_on_delivery" class="online_payment" type="radio"
                                                        name="payment_option" checked>
                                                    <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                        <img src="<?php echo e(static_asset('assets/img/cards/cod.png')); ?>"
                                                            class="img-fit mb-2">
                                                        <span class="d-block text-center">
                                                            <span
                                                                class="d-block fw-600 fs-15"><?php echo e(translate('Cash on Delivery')); ?></span>
                                                        </span>
                                                    </span>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(Auth::check()): ?>
                                        <!-- Offline Payment -->
                                        <?php if(addon_is_activated('offline_payment')): ?>
                                            <?php $__currentLoopData = get_all_manual_payment_methods(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-6 col-xl-3 col-md-4">
                                                    <label class="aiz-megabox d-block mb-3">
                                                        <input value="<?php echo e($method->heading); ?>" type="radio"
                                                            name="payment_option" class="offline_payment_option"
                                                            onchange="toggleManualPaymentData(<?php echo e($method->id); ?>)"
                                                            data-id="<?php echo e($method->id); ?>" checked>
                                                        <span class="d-block aiz-megabox-elem rounded-0 p-3">
                                                            <img src="<?php echo e(uploaded_asset($method->photo)); ?>"
                                                                class="img-fit mb-2">
                                                            <span class="d-block text-center">
                                                                <span
                                                                    class="d-block fw-600 fs-15"><?php echo e($method->heading); ?></span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php $__currentLoopData = get_all_manual_payment_methods(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div id="manual_payment_info_<?php echo e($method->id); ?>" class="d-none">
                                                    <?php echo $method->description ?>
                                                    <?php if($method->bank_info != null): ?>
                                                        <ul>
                                                            <?php $__currentLoopData = json_decode($method->bank_info); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e(translate('Bank Name')); ?> -
                                                                    <?php echo e($info->bank_name); ?>,
                                                                    <?php echo e(translate('Account Name')); ?> -
                                                                    <?php echo e($info->account_name); ?>,
                                                                    <?php echo e(translate('Account Number')); ?> -
                                                                    <?php echo e($info->account_number); ?>,
                                                                    <?php echo e(translate('Routing Number')); ?> -
                                                                    <?php echo e($info->routing_number); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>

                                <!-- Offline Payment Fields -->
                                <?php if(addon_is_activated('offline_payment')): ?>
                                    <div class="d-none mb-3 rounded border bg-white p-3 text-left">
                                        <div id="manual_payment_description">

                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label><?php echo e(translate('Transaction ID')); ?> <span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control mb-3" name="trx_id"
                                                    id="trx_id" placeholder="<?php echo e(translate('Transaction ID')); ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label"><?php echo e(translate('Photo')); ?></label>
                                            <div class="col-md-9">
                                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                            <?php echo e(translate('Browse')); ?></div>
                                                    </div>
                                                    <div class="form-control file-amount"><?php echo e(translate('Choose image')); ?>

                                                    </div>
                                                    <input type="hidden" name="photo" class="selected-files">
                                                </div>
                                                <div class="file-preview box sm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- Wallet Payment -->
                                <?php if(Auth::check() && get_setting('wallet_system') == 1): ?>
                                    <div class="py-4 px-4 text-center bg-soft-secondary-base mt-4">
                                        <div class="fs-14 mb-3">
                                            <span class="opacity-80"><?php echo e(translate('Or, Your wallet balance :')); ?></span>
                                            <span class="fw-700"><?php echo e(single_price(Auth::user()->balance)); ?></span>
                                        </div>
                                        <?php if(Auth::user()->balance < $total): ?>
                                            <button type="button" class="btn btn-secondary" disabled>
                                                <?php echo e(translate('Insufficient balance')); ?>

                                            </button>
                                        <?php else: ?>
                                            <button type="button" onclick="use_wallet()"
                                                class="btn btn-primary fs-14 fw-700 px-5 rounded-0">
                                                <?php echo e(translate('Pay with wallet')); ?>

                                            </button>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Agree Box -->
                            <div class="pt-3 px-4 fs-14">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" required id="agree_checkbox">
                                    <span class="aiz-square-check"></span>
                                    <span><?php echo e(translate('I agree to the')); ?></span>
                                </label>
                                <a href="<?php echo e(route('terms')); ?>"
                                    class="fw-700"><?php echo e(translate('terms and conditions')); ?></a>,
                                <a href="<?php echo e(route('returnpolicy')); ?>"
                                    class="fw-700"><?php echo e(translate('return policy')); ?></a> &
                                <a href="<?php echo e(route('privacypolicy')); ?>"
                                    class="fw-700"><?php echo e(translate('privacy policy')); ?></a>
                            </div>

                            <div class="row align-items-center pt-3 px-4 mb-4">
                                <!-- Return to shop -->
                                <div class="col-6">
                                    <a href="<?php echo e(route('home')); ?>" class="btn btn-link fs-14 fw-700 px-0">
                                        <i class="las la-arrow-left fs-16"></i>
                                        <?php echo e(translate('Return to shop')); ?>

                                    </a>
                                </div>
                                <!-- Complete Ordert -->
                                <div class="col-6 text-right">
                                    <button type="button" onclick="submitOrder(this)"
                                        class="btn btn-primary fs-14 fw-700 rounded-0 px-4"><?php echo e(translate('Complete Order')); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Cart Summary -->
                <div class="col-lg-4 mt-lg-0 mt-4" id="cart_summary">
                    <?php echo $__env->make('frontend.'.get_setting('homepage_select').'.partials.cart_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".online_payment").click(function() {
                $('#manual_payment_description').parent().addClass('d-none');
            });
            toggleManualPaymentData($('input[name=payment_option]:checked').data('id'));
        });

        var minimum_order_amount_check = <?php echo e(get_setting('minimum_order_amount_check') == 1 ? 1 : 0); ?>;
        var minimum_order_amount =
            <?php echo e(get_setting('minimum_order_amount_check') == 1 ? get_setting('minimum_order_amount') : 0); ?>;

        function use_wallet() {
            $('input[name=payment_option]').val('wallet');
            if ($('#agree_checkbox').is(":checked")) {
                ;
                if (minimum_order_amount_check && $('#sub_total').val() < minimum_order_amount) {
                    AIZ.plugins.notify('danger',
                        '<?php echo e(translate('You order amount is less then the minimum order amount')); ?>');
                } else {
                    $('#checkout-form').submit();
                }
            } else {
                AIZ.plugins.notify('danger', '<?php echo e(translate('You need to agree with our policies')); ?>');
            }
        }

        function submitOrder(el) {
            $(el).prop('disabled', true);
            if ($('#agree_checkbox').is(":checked")) {
                if (minimum_order_amount_check && $('#sub_total').val() < minimum_order_amount) {
                    AIZ.plugins.notify('danger',
                        '<?php echo e(translate('You order amount is less then the minimum order amount')); ?>');
                } else {
                    var offline_payment_active = '<?php echo e(addon_is_activated('offline_payment')); ?>';
                    if (offline_payment_active == '1' && $('.offline_payment_option').is(":checked") && $('#trx_id')
                        .val() == '') {
                        AIZ.plugins.notify('danger', '<?php echo e(translate('You need to put Transaction id')); ?>');
                        $(el).prop('disabled', false);
                    } else {
                        $('#checkout-form').submit();
                    }
                }
            } else {
                AIZ.plugins.notify('danger', '<?php echo e(translate('You need to agree with our policies')); ?>');
                $(el).prop('disabled', false);
            }
        }

        function toggleManualPaymentData(id) {
            if (typeof id != 'undefined') {
                $('#manual_payment_description').parent().removeClass('d-none');
                $('#manual_payment_description').html($('#manual_payment_info_' + id).html());
            }
        }

        $(document).on("click", "#coupon-apply", function() {
            var data = new FormData($('#apply-coupon-form')[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "<?php echo e(route('checkout.apply_coupon_code')); ?>",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    AIZ.plugins.notify(data.response_message.response, data.response_message.message);
                    $("#cart_summary").html(data.html);
                }
            })
        });

        $(document).on("click", "#coupon-remove", function() {
            var data = new FormData($('#remove-coupon-form')[0]);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "<?php echo e(route('checkout.remove_coupon_code')); ?>",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data, textStatus, jqXHR) {
                    $("#cart_summary").html(data);
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/truongdinh/code/php/Demo/resources/views/frontend/payment_select.blade.php ENDPATH**/ ?>