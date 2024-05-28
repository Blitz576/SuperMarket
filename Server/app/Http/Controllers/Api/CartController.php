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
            'cart_id'       => ['nullable', 'int', 'exists:carts,id'],
        ]);

        $product_id = $request->post('product_id');
        $quantity = $request->post('quantity', 1);
        $user_id = $request->post('user_id');
        $cart_id = $request->post('cart_id');
        
        $cart = Cart::updateOrCreate(
            ['id'       => $cart_id],
            ['user_id'  => $user_id]
        );
        
        $cartItem = CartItem::updateOrCreate(
            [
                'cart_id' => $cart->id,
                'product_id' => $product_id
            ],
            [
                'quantity' => DB::raw('quantity + ' . $quantity)
            ]
        );
        
        $product = Product::findOrFail($product_id);

        $cart->total_price += $product->sale_price * $quantity;
        $cart->save();

        return response()->json(['message' => 'Product added to cart successfully', 'cart' => $cart, 'cartItem' => $cartItem], 200);
    }

    public function getCart(Request $request)
    {
        $user_id = $request->get('user_id');
        $cart_id = $request->get('cart_id');
        
        if ($user_id || $cart_id) {
            $cart = Cart::with('cartItems:id,cart_id,product_id,quantity')
                ->where('user_id', $user_id)
                ->orwhere('id', $cart_id)
                ->first();
        } else {
            return response()->json(['message' => 'No cart found for the user', 'data' => null], 404);
        }
        
        if (!$cart) {
            return response()->json(['message' => 'No cart found for the user', 'data' => null], 404);
        }
        
        return response()->json(['message' => 'Cart retrieved successfully', 'data' => $cart], 200);
    }


    public function destroy($cart_id)
    {
        $cart = Cart::where('id', $cart_id)->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        CartItem::where('cart_id', $cart->id)->delete();

        $cart->delete();

        return response()->json(['message' => 'Cart deleted successfully'], 200);
    }

    public function destroyItem($cart_id, $item_id)
    {
        $userId =  Auth::user() ?  Auth::user()->id : null;

        $cart = Cart::where('id', $cart_id)->first();

        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('id', $item_id)
            ->first();

        if (!$cartItem) {
            return response()->json(['message' => 'Item not found in cart'], 404);
        }

        $cart->total_price -= $cartItem->product->sale_price * $cartItem->quantity;
        $cart->save();

        $cartItem->delete();

        return response()->json(['message' => 'Item removed from cart successfully', 'cartItem' => $cartItem], 200);
    }

}
