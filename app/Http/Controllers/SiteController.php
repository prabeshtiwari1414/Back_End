<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;
use Session;

class SiteController extends Controller
{
    public function getHome(){
        $data= [
            'products' => Product::where('product_status', 'show')->latest()->limit(8)->get(),
            
        ];
        return view('site.home', $data);
    }
    public function getProduct(){
        $data= [
            'products' => Product::where('product_status', 'show')->latest()->get(),
        ];
        return view('site.product', $data);
    }
    public function getAddCart(Product $product){
        $code =Str::random(6);
        $qty = 1;
        
        if(Session::get('cartcode')){
            
            $cart = New Cart;
            $cart->product_id = $product->id;
            $cart->qty = $qty;
            $cart->cost = $product->product_cost;
            $cart->totalcost = $product->product_cost*$qty;
            $cart->code = Session::get('cartcode');
            $cart->save();
        }
        else{
            $cart = New Cart;
            $cart->product_id = $product->id;
            $cart->qty = $qty;
            $cart->cost = $product->product_cost;
            $cart->totalcost = $product->product_cost*$qty;
            $cart->code = $code;
            $cart->save();
            Session::put('cartcode', $code);
        }
        return redirect()->route('getCart');
        
    }
    public function getCart(){
        if(Session::get('cartcode'))
        {
            $cartcode = Session::get('cartcode');
            $data =[
                'carts' => Cart::where('code', $cartcode)->get()
            ];
            return view('site.carts', $data);
        }
        else{
            abort(404);
        }
    }
    public function deletecarts (Cart $cart)
    {
       $cart->delete();
      return redirect()->route('getCart');
    }
}