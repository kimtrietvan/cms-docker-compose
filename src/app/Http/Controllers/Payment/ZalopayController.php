<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CombinedOrder;
use App\Models\Order;
class ZalopayController extends Controller
{

    public function hash_data($data) {
        $strHash = $data['app_id'] . '|' . $data['app_trans_id'] . '|' . $data['app_user'] . '|' . $data['amount'] . '|' . $data['app_time'] . '|' . $data['embed_data'] . '|' . $data['item'];
        return hash_hmac('sha256', $strHash, env('ZALO_MAC_KEY'));
    }

    public function order_payment($data) {
        $json_data = json_encode($data);
        // return $json_data;
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => env('ZALO_CREATE_ORDER'),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $json_data,
        CURLOPT_HTTPHEADER => array(
            // 'x-client-id: '.env('PAYOS_CLIENT_ID'),
            // 'x-api-key: ' . env('PAYOS_API_KEY'),
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    public function pay(Request $request) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $orderComnined = CombinedOrder::findOrFail($request->session()->get('combined_order_id'));
        $order = Order::where('combined_order_id',$orderComnined->id)->first();
        $input_data = array();
        $input_data['app_id'] = (int)env('ZALO_APP_ID');
        $input_data['app_user'] = 'unknown';
        $input_data['app_trans_id'] = date('ymd') . '_' . $order->id;
        $input_data['app_time'] = (round(microtime(true) * 1000));
        // $input_data['expire_duration_seconds'] = 900;
        $input_data['item'] = '[]';
        $input_data['description'] = "Thanh toan don hang";
        $input_data['embed_data'] = '{}';
        $input_data['bank_code'] = '';
        $input_data['amount'] = (int)$orderComnined->grand_total;
        $input_data['mac'] = $this->hash_data($input_data);
        $input_data['callback_url'] = route('zalo.callback');
        $input_data['callback_url'] = 'https://e2f8-2402-800-6d3b-81c4-ad2d-dce7-8511-a465.ngrok-free.app/zalopay/callback';
        // return $input_data;
        $response_data =  json_decode($this->order_payment($input_data));
        if ($response_data->return_code != 1) {
            return flash('Error payments')->back();
        }
        $order_url = $response_data->order_url;
        return redirect($order_url);
    }

    public function order_status($app_trans_id) {

    }

    public function callback(Request $request) {
        $data = json_decode($request->input('data'));
        $sig = hash_hmac('sha256', $request->input('data'), env('ZALO_CALLBACK_KEY'));
        if ($sig != $request->input('mac')) {
            $return_data = array();
            $return_data['return_code'] = '<>';
            $return_data['return_message'] = 'MAC not correct';
            return $return_data;
        }

        $app_trans_id = $data->app_trans_id;
        list($date, $order_id) = explode('_', $app_trans_id);
        $order = Order::where('id', $order_id)->first();
        $order->payment_status = 'paid';
        $order->save();
        $return_data = array();
        $return_data['return_code'] = 1;
        $return_data['return_message'] = '';
        return $return_data;
        


    }
}
