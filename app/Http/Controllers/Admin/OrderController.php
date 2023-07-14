<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dishe;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $dishes = Dishe::where('restaurant_id', Auth::user()->restaurant->id)->get();
        Collection:
        $orders = new Collection();

        foreach ($dishes as $dishe) {
            $disheInOrders = $dishe->orders;

            foreach ($disheInOrders as $order) {
                $orderId = $order->id;
                $isInOrderCollection = $orders->first(function ($item) use ($orderId) {
                    return $item->id === $orderId;
                });

                if (!$isInOrderCollection) {
                    $orders->push($order);
                }
            }
        }
        $ordersDesc = $orders->sortByDesc('created_at');
        return view('admin.orders.index', compact('ordersDesc'));
    }
}
