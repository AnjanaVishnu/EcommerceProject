<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ListController extends Controller
{

    public function alldetails()
    {
        try {
            $list = Category::all();
            return response()->json([
                'status' => 200,
                'data' => $list
            ]);
      
        } catch (Exception $e) {
            return $e->getMessage('catch error');
        }
    }


    public function productdetails()
    {
        try {
            $productlist = Product::all();
            return response()->json([
                'status' => 200,
                'data' => $productlist
            ]);
        } catch (Exception $e) {
            return $e->getMessage('catch error');
        }
    }

    public function productlist($category_id)
    {

        try {

            $product = Product::where('category_id', $category_id)->get();
            return response()->json([
                'status' => 200,
                'data' => $product
            ]);
           
        } catch (Exception $e) {
            return $e->getMessage('catch error');
        }
    }
}
