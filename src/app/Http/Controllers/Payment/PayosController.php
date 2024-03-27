<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;
use App\Models\CombinedOrder;


class PayosController extends Controller
{
    public static function payment_request($data) {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api-merchant.payos.vn/v2/payment-requests',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'x-client-id: '.env('PAYOS_CLIENT_ID'),
            'x-api-key: ' . env('PAYOS_API_KEY'),
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
    public function pay(Request $request) {
        $orderComnined = CombinedOrder::findOrFail($request->session()->get('combined_order_id'));
        $order = Order::where('combined_order_id',$orderComnined->id)->first();
        
        $amount = $orderComnined->grand_total;
        $description = "";
        $cancel_url = env('APP_URL') . '/payos/cancel';
        $return_url = env('APP_URL') . '/payos/return';
        $order_code = $order->id;
        $signature = hash_hmac('sha256','amount=' . $amount . '&cancelUrl=' . $cancel_url . '&description='. $description . '&orderCode=' . $order_code . '&returnUrl='. $return_url, env('PAYOS_CHECKSUM_KEY'));
        $json_data = json_encode([
            'orderCode' => $order_code,
            'amount' => $amount,
            'description' => $description,
            'cancelUrl' => $cancel_url,
            'returnUrl' => $return_url,
            'signature' => $signature
        ]);
        $response = json_decode($this->payment_request($json_data));
        if ($response->code != '00') {
            flash('Some things error, try another payment or contact to admin')->error();
            return redirect()->back();
        }
        // return $response;
        return redirect($response->data->checkoutUrl);
        
        // return $request->session()->get('combined_order_id');
    }

    public function result(Request $request) {
        // return $request;
        $order_id = $request->input('orderCode');
        $order_data =  json_decode($this->payment_info($order_id), true);
        // return $order_data;
        if (!$this->isValidData((array) $order_data['data'], $order_data['signature'], env('PAYOS_CHECKSUM_KEY'))) {
            return flash("Data error")->back();
        }
        // return $order_data;
        $order = Order::where('id',$order_id)->first();
        $order->payment_status = 'paid';
        $order->save();
        return redirect()->route('home');
    }

    public function payment_info($id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api-merchant.payos.vn/v2/payment-requests/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_HTTPHEADER => array(
            'x-client-id: '.env('PAYOS_CLIENT_ID'),
            'x-api-key: ' . env('PAYOS_API_KEY')
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
    function isValidData($transaction, $transaction_signature, $checksum_key)
    {
      ksort($transaction);
      $transaction_str_arr = [];
      foreach ($transaction as $key => $value) {
          if (in_array($value, ["undefined", "null"]) || gettype($value) == "NULL") {
              $value = "";
          }

          if (is_array($value)) {
              $valueSortedElementObj = array_map(function ($ele) {
                  ksort($ele);
                  return $ele;
              }, $value);
              $value = json_encode($valueSortedElementObj, JSON_UNESCAPED_UNICODE);
          }
          $transaction_str_arr[] = $key . "=" . $value;
      }
      $transaction_str = implode("&", $transaction_str_arr);
      dump($transaction_str);
      $signature = hash_hmac("sha256", $transaction_str, $checksum_key);
      dump($signature);
      return $signature == $transaction_signature;
    }

    public function cancel(Request $request) {
        // if ($this->isValidData())
        $order_id = $request->input('orderCode');
        $order_data = (array) json_decode($this->payment_info($order_id));
        // return $order_data;
        if (!$this->isValidData((array) $order_data['data'], $order_data['signature'], env('PAYOS_CHECKSUM_KEY'))) {
            return flash("Data error")->back();
        }
        $status = $request->input('status');
        $order = Order::where('id',$order_id)->first();
        $order->delivery_status = 'cancelled';
        $order->save();
        return redirect()->route('home');
    }
}
