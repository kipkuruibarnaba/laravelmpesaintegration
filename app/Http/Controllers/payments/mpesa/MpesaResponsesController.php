<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaResponsesController extends Controller
{
    public function validation(Request $request)
    {
        Log::info('Validation Endpoint hit!');
        Log::info($request->all());

        return [
            'ResultCode' => 0,
            'ResultDes' => 'Accept Service',
        ];
    }

    public function confirmation(Request $request)
    {
        Log::info('Confirmation Endpoint hit!');
        Log::info($request->all());
    }

    public function stkpush(Request $request)
    {
        Log::info('STK Endpoint hit!');
        Log::info($request->all());
    }
}
