<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $products = Category::where('status', '=', 'available')
            ->select('id', 'name', 'cover_image')
            ->orderBy('id', 'DESC')
            ->with(['products:id,category_id,title,price,sale_price,slug', 'products.images:id,product_id,image'])
            ->get();

        return  response()->json(['message' => 'Products fetched successfully', 'data' => $products], 200);
    }

}
