<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dishe;
use App\Models\DisheOrder;
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

    public function show($id)
    {
        $order = Order::find($id);
        $disheOrder = DisheOrder::where('order_id', $order->id)->get();
        Collection:
        $dishes_price = new Collection();
        // $userId = Auth::user()->id;
        if ($order->dishes[0]->restaurant_id === Auth::user()->restaurant->id) {
            foreach ($order->dishes as $dishe) {
                $single_price = $dishe->price;
                $dishes_price->push($single_price);
            }
            // dd($order);
            // dd($disheOrder);
            return view("admin.orders.show", compact("order", "disheOrder", "dishes_price"));
        }
    }
}
