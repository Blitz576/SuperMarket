<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id'    => ['required', 'int', 'exists:products,id'],
            'quantity'      => ['int', 'min:1'],
            'user_id'       => ['nullable', 'int', 'exists:users,id'],
        ]);

        $productId = $request->post('product_id');
        $quantity = $request->post('quantity', 1);
        $user = Auth::guard('web')->user();
        
        if (!$user) {
            $user_id = null;
        } else {
            $user_id = $user->id;
        }
        
        $cart = Cart::firstOrCreate(
            ['user_id' => $user_id],
            ['total_price' => 0]
        );

        $cartItem = CartItem::updateOrCreate(
            [
                'cart_id' => $cart->id,
                'product_id' => $productId
            ],
            [
                'quantity' => DB::raw('quantity + ' . $quantity),
            ]
        );
        
        $cart->total_price += $cartItem->sale_price * $quantity;
        $cart->save();

        return response()->json(['message' => 'Product added to cart successfully', 'data' => $cartItem], 200);
    }
}
