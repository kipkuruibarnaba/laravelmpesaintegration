<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function stkPushView()
    {
        return view('stkpush');
    }

    /**
     * Generation access token.
     */
    public function getAccessToken()
    {
        $url = env('MPESA_ENV') == 0
       ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
       : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $consumer_Key = env('MPESA_CONSUMER_KEY');
        $consumer_Secret = env('MPESA_CONSUMER_SECRET');
        $headers = ['Content-Type: application/json ;  charset=utf-8'];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_USERPWD, $consumer_Key.':'.$consumer_Secret);
        $result = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        Log::info($result);
        $result = json_decode($result);
        $access_token = $result->access_token;
        curl_close($curl);
        Log::info('Access Token: '.$access_token);

        return $access_token;
    }

    /*
     * STK Push Notification
     */
    public function stkPushNotification(Request $request)
    {
        $url = env('MPESA_ENV') == 0
       ? 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest'
       : 'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
        $body = [
            'InitiatorName' => 'TestG2Init',
            'SecurityCredential' => 'CustomerPayBillOnline',
            'CommandID' => 'BusinessPayment',
            'Amount' => $request->amount,
            'PartyA' => env('MPESA_STK_SHORTCODE'),
            'PartyB' => $request->phone,
            'Remarks' => 'Test remarks',
            'QueueTimeOutURL' => env('MPESA_TEST_URL').'/api/queueTimeOutURL',
            'ResultURL' => env('MPESA_TEST_URL').'/api/resultUrl',
            'Occassion' => 'test',
        ];

        Log::info($body);
        $response = $this->makeHttp($url, $body);
        Log::info('STK push Response: '.$response);

        return $response;
    }

    /*
     * Simulate a transaction
     */
    public function simulateTransaction(Request $request)
    {
        $url = env('MPESA_ENV') == 0
       ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate'
       : 'https://api.safaricom.co.ke/mpesa/c2b/v1/simulate';
        $body = [
            'CommandID' => 'CustomerPayBillOnline',
            'Amount' => $request->amount,
            'Msisdn' => env('MPESA_TEST_MSISDN'),
            'BillRefNumber' => $request->account,
            'ShortCode' => env('MPESA_SHORTCODE'),
        ];
        Log::info($body);
        $response = $this->makeHttp($url, $body);
        Log::info('Simulate Transaction Response: '.$response);

        return $response;
    }

    /*
     * Register URL
     */
    public function registerURL(Request $request)
    {
        $url = env('MPESA_ENV') == 0
       ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
       : 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        $body = [
            'ShortCode' => env('MPESA_SHORTCODE'),
            'ResponseType' => 'Completed',
            'ValidationURL' => env('MPESA_TEST_URL').'/api/validation',
            'ConfirmationURL' => env('MPESA_TEST_URL').'/api/confirmation',
        ];
        Log::info($body);
        $response = $this->makeHttp($url, $body);
        Log::info('Register URL Response: '.$response);

        return $response;
    }

    public function makeHttp($url, $body)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json', 'Authorization:Bearer '.$this->getAccessToken()]);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
