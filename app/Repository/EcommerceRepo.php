<?php

namespace App\Repository;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class EcommerceRepo
{

    public function insert($data)
    {
 
        $category = new Category();
        $category->category_name =  $data['category_name'];
        $category->description = $data['description'];
        $image = $data['image'];
        $photo = $image->getClientOriginalName();
        $date = date('Ymdhms') . rand(1, 10000) . '.' . $photo;
        $destination ='public/photos/';
        $image->move($destination, $date);
        $category->image ='photos/'.$date;
        $category->save();
        return true;
    }
    

    public function updatecategory($data, $categoryid)
    {
       
        $update_category = Category::where('id', $categoryid->id)->first();
        $update_category->category_name =  $data['category_name'];
        $update_category->description =  $data['description'];

        if(isset($data['image'])){

            $image = $data['image'];
            $photo = $image->getClientOriginalName();
            $date = date('Ymdhms') . rand(1, 10000) . '.' . $photo;
            $destination ='public/photos/';
            $image->move($destination, $date);
            $update_category->image ='photos/'.$date;

        }
        $update_category->save();
        return redirect('/list');
    }

    public function add($add,$id)
    {
    
    
        $view = new Product();
        $view->category_id=$id;
        $view->product = $add['product'];
        $view->prize = $add['prize'];
        $view->desc = $add['desc'];
        $view->stock =$add['stock'];
        $view->available_stock=$add['stock'];
        $img = $add['img'];
        $photo = $img->getClientOriginalName();
        $destination ='public/uploads/';
        $img->move($destination, $photo);
        $view->img ='uploads/'.$photo;
        $view->save();
        return true;
    }
  

        

    public function update_product($data, $productid)
    {
       
        $update_product = Product::where('id', $productid->id)->first();
        $update_product->product =  $data['product'];
        $update_product->prize =  $data['prize'];
        $update_product->desc =  $data['desc'];
        $update_product->stock =  $data['stock'];


        if(isset($data['img'])){

            $img = $data['img'];
            $photo = $img->getClientOriginalName();
            $date = date('Ymdhms') . rand(1, 10000) . '.' . $photo;
            $destination ='public/photos/';
            $img->move($destination, $date);
            $update_product->img ='photos/'.$date;

        }
        $update_product->save();
       
       
    }
    public function registration($register)
    {
    
        $reg = new Client();
        $reg->name =  $register['name'];
        $reg->phone =  $register['phone'];
        $reg->email =  $register['email'];
        $reg->password = Hash::make($register['password'] );
        $reg->save();
        return true;
    }

}