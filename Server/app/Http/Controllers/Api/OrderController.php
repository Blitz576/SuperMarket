<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(OrderStoreRequest $request)
    {
        $user = Auth::user();

        $order = new Order();
        $order->user_id = $user->id;
        $order->cart_id = $request->cart_id;
        $order->status = 'pending';
        $order->notes = $request->notes;
        $order->save();
        $totalPrice = 0;

        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);
            $price = $product->price;

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $price;
            $orderItem->save();

            $totalPrice += $price * $item['quantity'];
        }

        $order->total_price = $totalPrice;
        $order->save();

        return response()->json(['message' => 'order send successfully'], 200);
    }
    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $orderItems = $order->orderItems()->get();

        return response()->json([
            'order' => $order,
            'order_items' => $orderItems
        ], 200);
    }
}
