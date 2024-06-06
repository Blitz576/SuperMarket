<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::all();
        return view('dashboard.orders.index',['orders'=>$orders]);
    }
    
    public function destroy(string $id)
    {
        $order=Order::find($id);
        $order->delete();
        return redirect()->route('orders.index');
    }
    public function changeStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|in:pending,paid,processing,shipped,completed, cancelled, rejected, refunded',
        ]);

        try {
            $order->status = $request->status;
            $order->save();

            return response()->json([
                'message' => 'order status updated successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update order status.',
            ], 500);
        }
    }
}
