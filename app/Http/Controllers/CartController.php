<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Client;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function  cart()
    {
        $client_id = Auth::guard('clients')->user()->id;

        $cart = Cart::with('product')->where('client_id', $client_id)->get();

        return view('web.cart', compact('cart', 'client_id'));
    }

    public function add_cart(CartRequest $request)
    {
        $cart = Cart::with('product')->get();
        $client_id = Auth::guard('clients')->user()->id;
        $balance = Product::find($request->product_id);

        if ($balance->available_stock >= $request->count && $request->count != 0) {
            $cart = new Cart();
            $cart->client_id = $client_id;     
            $cart->product_id = $request->product_id;
            $cart->count = $request->count;

            $cart->save();
            $available_stock = Product::find($request->product_id);  
            $available_stock->available_stock -= $request->count;
            $available_stock->update();
        }
        $response = [
            'status' => true,
            'data' => $request->all()
        ];
        return json_encode($response);
    }


    public function delete_product($id)
    {

        $cart = Cart::find($id);
        $product = Product::find($cart->product_id);
        $product->available_stock += $cart->count;
        $product->update();

        $delete = Cart::find($id);
        $delete->delete();
        return redirect('cart');
    }


    public function list_cart(Request $request)
    {
        $cart = Cart::with('product', 'client')->get();


        return view('admin.list_cart', compact('cart'));
    }

    public function clear($client_id)
    {
 
       $cart=Cart::where('client_id',$client_id)->get();
       foreach($cart as $key){
        $product = Product::find($key->product_id);
        $product->available_stock += $key->count;
        $product->update();
       }
       
        $delete = Cart::where('client_id', $client_id)->delete();
        return redirect('cart');
    }
}
                   