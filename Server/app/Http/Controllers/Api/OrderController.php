<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(OrderStoreRequest $request)
    {
        $user = Auth::user();

        $orderData = [
            'user_id' => $user->id,
            'cart_id' => $request->cart_id,
            'status' => 'pending',
            'notes' => $request->notes,
        ];

        $order = Order::create($orderData);
        $totalPrice = 0;

        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);
            $price = $product->price;

            $orderItemData = [
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $price,
            ];

            OrderItem::create($orderItemData);

            $totalPrice += $price * $item['quantity'];
        }

        $order->total_price = $totalPrice;
        $order->save();

        return response()->json(['message' => 'order sent successfully'], 200);
    }
    public function show()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->with('orderItems')->get();
        return response()->json($orders);
    }
}
