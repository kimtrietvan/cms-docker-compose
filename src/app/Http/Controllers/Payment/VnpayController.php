<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CombinedOrder;
class VnpayController extends Controller
{
    public function hash_data($input, $secret) {
        ksort($input);
        $hashdata = "";
        $i = 0;
        foreach ($input as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        return hash_hmac('sha512', $hashdata, $secret);
    }
    public static function payment_redirect($data) {
        return env('VNPAY_URL_PAYMENT') . '?' . http_build_query($data);
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => env('VNPAY_URL_PAYMENT') . '?' . http_build_query($data),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        // CURLOPT_POSTFIELDS => $data,
        // CURLOPT_HTTPHEADER => array(
        //     'x-client-id: '.env('PAYOS_CLIENT_ID'),
        //     'x-api-key: ' . env('PAYOS_API_KEY'),
        //     'Content-Type: application/json'
        // ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function pay(Request $request) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $orderComnined = CombinedOrder::findOrFail($request->session()->get('combined_order_id'));
        $order = Order::where('combined_order_id',$orderComnined->id)->first();
        $amount = $orderComnined->grand_total;
        
        $input_data = array();
        $input_data['vnp_Version'] = '2.1.0';
        $input_data['vnp_Command'] = 'pay';
        $input_data['vnp_TmnCode'] = env('VNPAY_TMNCODE');
        $input_data['vnp_Amount'] = $amount * 100;
        $input_data['vnp_CreateDate'] = date('YmdHis');
        $input_data['vnp_ExpireDate'] = date('YmdHis', mktime(date('H'), date('i') + 10, date('s'), date('m'), date('d'), date('Y')));
        $input_data['vnp_CurrCode'] = 'VND';
        $input_data['vnp_IpAddr'] = $request->getClientIp();
        // $input_data['vnp_IpAddr'] = '116.96.99.30';
        $input_data['vnp_Locale'] = 'vn';
        $input_data['vnp_OrderType'] = 'topup';
        $input_data['vnp_OrderInfo'] = 'Thanh toan';
        $input_data['vnp_ReturnUrl'] = route('vnpay.return');
        $input_data['vnp_TxnRef'] = (string)$order->id;
        $input_data['vnp_SecureHash'] = $this->hash_data($input_data, env('VNPAY_HASHSECRET'));
        return redirect($this->payment_redirect($input_data));
    }

    public function result(Request $request) {
        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $inputData = array();
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        // echo var_dump($inputData);
        $secureHash = hash_hmac('sha512', $hashData, env('VNPAY_HASHSECRET'));
        if ($secureHash == $vnp_SecureHash) {
            if ($inputData['vnp_ResponseCode'] == '00') {
                return redirect()->route('dashboard');
                // $this->verify_payment($inputData);
            } 
            else {
                return flash("Payment fails")->back();
                }
        } else {
            return flash("Payment errors")->back();
            }
    }

    public function ipn(Request $request) {
        $inputData = array();
        $returnData = array();

        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        $secureHash = $this->hash_data($inputData, env('VNPAY_HASHSECRET'));
        if ($secureHash != $vnp_SecureHash) {
            $returnData['RspCode'] = '97';
            $returnData['Message'] = 'Invalid signature';
            return json_encode($returnData);
        }

        $order_exist = Order::where('id', $inputData['vnp_TxnRef'])->exists();
        if (!$order_exist) {
            $returnData['RspCode'] = '01';
            $returnData['Message'] = 'Order not found';
            return json_encode($returnData);
        }

        $order = Order::where('id', $inputData['vnp_TxnRef'])->first();
        if ($order->grand_total * 100 != $inputData['vnp_Amount']) {
            $returnData['RspCode'] = '04';
            $returnData['Message'] = 'invalid amount';
            return json_encode($returnData);
        }

        if ($order->payment_status == 'paid') {
            $returnData['RspCode'] = '02';
            $returnData['Message'] = 'Order already confirmed';
            return json_encode($returnData);
        }
        $order->payment_status = 'paid';
        $order->save();
        $returnData['RspCode'] = '00';
        $returnData['Message'] = 'Confirm Success';
        return json_encode($returnData);
    }
}
