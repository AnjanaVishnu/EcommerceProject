<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Repository\EcommerceRepo;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public  function __construct(EcommerceRepo $EcommerceRepo)
    {
        $this->EcommerceRepo = $EcommerceRepo;
    }
   
    public function index()
    {

        $product = Product::with('category')->get();
        $category = Category::all();
       
        return view('web.index', compact('product','category'));
    }
    public function blog()
    {
        $category = Category::all();
    
        return view('web.blog',compact('category'));
    }

    public function shop()
    {
        $product = Product::with('category')->get();
        $category = Category::all();
        return view('web.shop',compact('product','category'));
    }

    public function shop_product($id)
    {
        $product = Product::with('category')->where('category_id',$id)->get();
        $category = Category::all();
        return view('web.shop',compact('product','category'));
     
    }

    public function single_page(Request $request)
  
    {
   
        $product = Product::with('category')->where('id',$request->cartId)->first();
        $cart = Cart::with('product')->get();
     
        return view('web.single_page',compact('product','cart'));
     
    }

    
    public function login()
    {
        return view('web.login');
    }

    public function logout() {
        Auth::guard('clients')->logout();
        return Redirect('login');
    }

    public function authenticate(Request $request)
    {
      
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
     
        $credentials = $request->only('email','password');
        if (Auth::guard('clients')->attempt($credentials)) {
         
            $request->session()->regenerate();

            return redirect()->intended('/shop');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function register()
    {
        return view('web.register');
    }


    public function registration(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
        
        ]);


        $register = $request->all();

        $result = $this->EcommerceRepo->registration($register);

        if ($result) {

            return redirect('login');
        } else {

          echo("error");
       
           
        }
    }
    

      
}