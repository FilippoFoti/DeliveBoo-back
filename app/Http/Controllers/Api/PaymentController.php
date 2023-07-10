<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function generateToken(Request $request, Gateway $gateway)
    {
        $clientToken = $gateway->clientToken()->generate();
        $data = [
            'token' => $clientToken,
            'success' => true
        ];
        return response()->json($data, 200);
    }

    public function makePayment(Request $request, Gateway $gateway)
    {
        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ],
        ]);
        if ($result->success) {
            $data = [
                'message' => 'Transazione approvata',
                'success' => true
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Transazione rifiutata',
                'success' => false
            ];
            return response()->json($data, 400);
        }
    }
}
