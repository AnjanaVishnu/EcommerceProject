<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_cart(Request $request)
    {

        try {
            $customer = auth('sanctum')->user();
            $user = Cart::create([
                'count' => $request->count,
                'product_id' => $request->product_id,
                'client_id' => $customer->id
            ]);
            $product = Product::where('id',$request->product_id)->first();
            $available_stock = $product->available_stock - $request->count;
            $product->update([
                'available_stock' => $available_stock
            ]);
            return response()->json($user);

        } catch (Exception $e) {
            return $e->getMessage('catch error');
        }
    }

    public function cartdetails()
    {
        try {

            $customer = auth('sanctum')->user()->id;

            $cartlist = Cart::with('product')->where('client_id',$customer)->get();
         
            return response()->json([
                'status' => 200,
                'data' => $cartlist
            ]);
        } catch (Exception $e) {
            return $e->getMessage('catch error');
        }
    }
    
}
