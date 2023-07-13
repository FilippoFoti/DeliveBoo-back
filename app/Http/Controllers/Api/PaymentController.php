<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dishe;
use App\Models\DisheOrder;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Mail\NewOrder;
use Braintree\Gateway;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $data['payment_status'] = 1;
            $data['total_price'] = $amount;
            $data['date'] = new DateTime();
            $order = new Order();
            $order->fill($data);
            $order->save();

            foreach ($cart as $item) {
                $disheOrder = new DisheOrder();
                $disheOrder->dish_id = $item['id'];
                $disheOrder->order_id = $order->id;
                $disheOrder->quantity = $item['count'];
                $disheOrder->save();

            }
        }

        // Save the order into the pivot table
        foreach ($data['dishes'] as $dishe) {
            $newOrderProduct = new OrderProduct();

            $newOrderProduct->order_id = $disheOrder->id;
            $newOrderProduct->dishe_id = $dishe['id'];
            $newOrderProduct->quantity = $dishe['quantity'];

            $newOrderProduct->save();

            // email all'admin con avviso del nuovo ordine
            Mail::to('admin@deliveboo.com')->send(new NewOrder($order));
        }

        return response()->json([
            'success' => true,
            'results' => $disheOrder,
        ]);

        // email all'admin con avviso del nuovo ordine
        Mail::to('admin@deliveboo.com')->send(new NewOrder($order));

        if ($result->success) {
            $data = [
                'message' => 'Transazione approvata',
                'success' => true
            ];
            return response()->json($data);
        } else {
            $data = [
                'message' => 'Transazione rifiutata',
                'success' => false
            ];
            return response()->json($data);
        }
    }
}
