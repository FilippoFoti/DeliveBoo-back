<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dishe;
use App\Models\Order;
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
        $data = $request->all();
        $amount = 0;

        $cart = $data['cart'];

        foreach ($cart as $item) {
            $dishe = Dishe::where('id', $item['id'])->first();
            $amount += $dishe->price * $item['count'];
        }

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ],
        ]);

        if ($result->success) {
            $order = new Order();
            $data['total_price'] = $amount;
            $order->fill($data);
            $order->save();
        }
        // $result = $gateway->transaction()->sale([
        //     'amount' => $request->amount,
        //     'paymentMethodNonce' => $request->token,
        //     'options' => [
        //         'submitForSettlement' => true
        //     ],
        // ]);
        // if ($result->success) {
        //     $data = [
        //         'message' => 'Transazione approvata',
        //         'success' => true
        //     ];
        //     return response()->json($data);
        // } else {
        //     $data = [
        //         'message' => 'Transazione rifiutata',
        //         'success' => false
        //     ];
        //     return response()->json($data);
        // }
    }
}
