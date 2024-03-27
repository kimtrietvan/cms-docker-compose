@extends('backend.layouts.app')

@section('content')

<div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6 text-center">{{translate('Paytm Activation')}}</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="{{ static_asset('assets/img/cards/paytm.jpg') }}" height="30">
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
                        <h3 class="mb-0 h6 text-center">{{translate('ToyyibPay Activation')}}</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="{{ static_asset('assets/img/cards/toyyibpay.png') }}" height="30">
                            <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                <input type="checkbox" onchange="updateSettings(this, 'toyyibpay_payment')" <?php if(\App\Models\BusinessSetting::where('type', 'toyyibpay_payment')->first()->value == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            {{--  --}}
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6 text-center">{{translate('MyFatoorah Activation')}}</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="{{ static_asset('assets/img/cards/myfatoorah.png') }}" height="30">
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
                        <h3 class="mb-0 h6 text-center">{{translate('PayOS Activation')}}</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="{{ static_asset('assets/img/cards/toyyibpay.png') }}" height="30">
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
                        <h3 class="mb-0 h6 text-center">{{translate('VNPay Activation')}}</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="{{ static_asset('assets/img/cards/toyyibpay.png') }}" height="30">
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
                        <h3 class="mb-0 h6 text-center">{{translate('ZaloPay Activation')}}</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="{{ static_asset('assets/img/cards/toyyibpay.png') }}" height="30">
                            <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                <input type="checkbox" onchange="updateSettings(this, 'zalopay_payment')" <?php if(\App\Models\BusinessSetting::where('type', 'zalopay_payment')->first()->value == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0 h6 text-center">{{translate('MyFatoorah  Activation')}}</h3>
                    </div>
                    <div class="card-body text-center">
                        <div class="clearfix">
                            <img class="float-left" src="{{ static_asset('assets/img/cards/myfatoorah.png') }}" height="30">
                            <label class="aiz-switch aiz-switch-success mb-0 float-right">
                                <input type="checkbox" onchange="updateSettings(this, 'myfatoorah')" <?php if(get_setting('myfatoorah') == 1) echo "checked";?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="alert" style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                            {{ translate('You need to configure myfatoorah correctly to enable this feature') }}. <a href="{{ route('payment_method.index') }}">{{ translate('Configure Now') }}</a>
                        </div>
                    </div>
                </div>
            </div> --}}
    </div>


<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Paytm Credential')}}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('paytm.update_credentials') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_ENVIRONMENT">
                        <div class="col-lg-4">
                            <label class="col-from-label">{{translate('PAYTM ENVIRONMENT')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_ENVIRONMENT" value="{{  env('PAYTM_ENVIRONMENT') }}" placeholder="local or production" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_MERCHANT_ID">
                        <div class="col-lg-4">
                            <label class="col-from-label">{{translate('PAYTM MERCHANT ID')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_MERCHANT_ID" value="{{  env('PAYTM_MERCHANT_ID') }}" placeholder="PAYTM MERCHANT ID" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_MERCHANT_KEY">
                        <div class="col-lg-4">
                            <label class="col-from-label">{{translate('PAYTM MERCHANT KEY')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_MERCHANT_KEY" value="{{  env('PAYTM_MERCHANT_KEY') }}" placeholder="PAYTM MERCHANT KEY" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_MERCHANT_WEBSITE">
                        <div class="col-lg-4">
                            <label class="col-from-label">{{translate('PAYTM MERCHANT WEBSITE')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_MERCHANT_WEBSITE" value="{{  env('PAYTM_MERCHANT_WEBSITE') }}" placeholder="PAYTM MERCHANT WEBSITE" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_CHANNEL">
                        <div class="col-lg-4">
                            <label class="col-from-label">{{translate('PAYTM CHANNEL')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_CHANNEL" value="{{  env('PAYTM_CHANNEL') }}" placeholder="PAYTM CHANNEL" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYTM_INDUSTRY_TYPE">
                        <div class="col-lg-4">
                            <label class="col-from-label">{{translate('PAYTM INDUSTRY TYPE')}}</label>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" name="PAYTM_INDUSTRY_TYPE" value="{{  env('PAYTM_INDUSTRY_TYPE') }}" placeholder="PAYTM INDUSTRY TYPE" >
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('ToyyibPay Credential')}}</h5>
            </div>
            <div class="card-body">
                    <form class="form-horizontal" action="{{ route( 'payment_method.update' ) }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" value="toyyibpay">
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TOYYIBPAY_KEY">
                            <div class="col-md-4">
                                <label class="col-from-label">{{translate('TOYYIBPAY KEY')}}</label>
                            </div>
                            <div class="col-md-8">
                            <input type="text" class="form-control" name="TOYYIBPAY_KEY" value="{{  env('TOYYIBPAY_KEY') }}" placeholder="{{ translate('TOYYIBPAY KEY') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TOYYIBPAY_CATEGORY">
                            <div class="col-md-4">
                                <label class="col-from-label">{{translate('TOYYIBPAY CATEGORY')}}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="TOYYIBPAY_CATEGORY" value="{{  env('TOYYIBPAY_CATEGORY') }}" placeholder="{{ translate('TOYYIBPAY CATEGORY') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-from-label">{{translate('ToyyibPay Sandbox Mode')}}</label>
                            </div>
                            <div class="col-md-8">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input value="1" name="toyyibpay_sandbox" type="checkbox" @if (get_setting('toyyibpay_sandbox') == 1)
                                        checked
                                    @endif>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6 ">{{translate('MyFatoorah Credential')}}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_method" value="myfatoorah">
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="MYFATOORAH_TOKEN">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('MYFATOORAH TOKEN')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="MYFATOORAH_TOKEN" value="{{  env('MYFATOORAH_TOKEN') }}" placeholder="{{ translate('MYFATOORAH TOKEN') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('Sandbox Mode')}}</label>
                        </div>
                        <div class="col-md-8">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" name="myfatoorah_sandbox" type="checkbox" @if (get_setting('myfatoorah_sandbox') == 1)
                                    checked
                                @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6 ">{{translate('PayOS Credential')}}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_method" value="payos">
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYOS_CLIENT_ID">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('CLIENT ID')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="PAYOS_CLIENT_ID" value="{{  env('PAYOS_CLIENT_ID') }}" placeholder="{{ translate('CLIENT_ID') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYOS_API_KEY">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('API KEY')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="PAYOS_API_KEY" value="{{  env('PAYOS_API_KEY') }}" placeholder="{{ translate('API_KEY') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="PAYOS_CHECKSUM_KEY">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('CHECKSUM KEY')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="PAYOS_CHECKSUM_KEY" value="{{  env('PAYOS_CHECKSUM_KEY') }}" placeholder="{{ translate('CHECKSUM_KEY') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('Sandbox Mode')}}</label>
                        </div>
                        <div class="col-md-8">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" name="payos_sandbox" type="checkbox" <?php if (get_setting('payos_sandbox') == 1) echo 'checked' ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6 ">{{translate('VNPay Credential')}}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_method" value="payos">
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="VNPAY_TMNCODE">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('TMNCODE')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="VNPAY_TMNCODE" value="{{  env('VNPAY_TMNCODE') }}" placeholder="{{ translate('TMNCODE') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="VNPAY_HASHSECRET">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('HASH SECRET')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="VNPAY_HASHSECRET" value="{{  env('VNPAY_HASHSECRET') }}" placeholder="{{ translate('VNPAY_HASHSECRET') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="VNPAY_URL_PAYMENT">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('URL PAYMENT')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="VNPAY_URL_PAYMENT" value="{{  env('VNPAY_URL_PAYMENT') }}" placeholder="{{ translate('URL PAYMENT') }}" required>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--  -->

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6 ">{{translate('ZaloPay Credential')}}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_method" value="payos">
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="ZALO_APP_ID">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('ZALO_APP_ID')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ZALO_APP_ID" value="{{  env('ZALO_APP_ID') }}" placeholder="{{ translate('ZALO_APP_ID') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="ZALO_MAC_KEY">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('ZALO_MAC_KEY')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ZALO_MAC_KEY" value="{{  env('ZALO_MAC_KEY') }}" placeholder="{{ translate('ZALO_MAC_KEY') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="ZALO_CALLBACK_KEY">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('ZALO_CALLBACK_KEY')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ZALO_CALLBACK_KEY" value="{{  env('ZALO_CALLBACK_KEY') }}" placeholder="{{ translate('ZALO_CALLBACK_KEY') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="types[]" value="ZALO_CREATE_ORDER">
                        <div class="col-md-4">
                            <label class="col-from-label">{{translate('ZALO_CREATE_ORDER')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ZALO_CREATE_ORDER" value="{{  env('ZALO_CREATE_ORDER') }}" placeholder="{{ translate('ZALO_CREATE_ORDER') }}" required>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection


@section('script')
    <script type="text/javascript">
        function updateSettings(el, type){
            if($(el).is(':checked')){
                var value = 1;
            }
            else{
                var value = 0;
            }
            $.post('{{ route('business_settings.update.activation') }}', {_token:'{{ csrf_token() }}', type:type, value:value}, function(data){
                if(data == '1'){
                    AIZ.plugins.notify('success', 'Settings updated successfully');
                }
                else{
                    AIZ.plugins.notify('danger', 'Something went wrong');
                }
            });
        }
    </script>
@endsection