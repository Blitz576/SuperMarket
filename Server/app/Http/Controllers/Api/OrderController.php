<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $order = new Order();
        $order->user_id = $user->id; 
        $order->cart_id = $request->cart_id;
        $order->status = 'pending';
        $order->notes = $request->notes;
        $order->save();
    }
}
