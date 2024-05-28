<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $request = request();

        $fields = ['title'];
        $searchQuery = trim($request->query('q'));

        $products = Product::where('status', '=', 'available')
            ->where(function($query) use($searchQuery, $fields) {
                foreach ($fields as $field)
                    $query->orWhere($field, 'like',  '%' . $searchQuery .'%');
            })
            ->select('id', 'title', 'price', 'sale_price', 'slug')
            ->with(['images:id,product_id,image'])
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->get();

        return  response()->json(['message' => 'Products fetched successfully', 'data' => $products], 200);
    }

    public function all_products()
    {
        $products = Product::where('status', '=', 'available')
            ->select('id', 'title', 'price', 'sale_price', 'slug')
            ->with(['images:id,product_id,image'])
            ->orderBy('id', 'DESC')
            ->paginate(30);

        return  response()->json(['message' => 'Products fetched successfully', 'data' => $products], 200);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('status', '=', 'available')
            ->with(['images:id,product_id,image'])
            ->with('user:id,name')
            ->with('category:id,name')
            ->first();

        if ($product) {
            return response()->json([
                'message' => 'Product fetched successfully',
                'data' => $product,
                'status' => 'success'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Product not found',
                'status' => 404
            ], 404);
        }
    }



}
