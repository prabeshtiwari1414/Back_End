<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Billingaddress;
use App\Models\Shippingcharge;
use Session;

class SiteController extends Controller
{
    public function getHome(){
        $data= [
            'products' => Product::where('status', 'show')->latest()->limit(8)->get(),
            
        ];
        return view('site.home', $data);
    }
    public function getProduct(){
        $data= [
            'products' => Product::where('status', 'show')->latest()->get(),
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
    public function getEditCarts(Cart $cart){
        if(Session::get('cartcode')==$cart->code){
            $data = ['cart' => $cart];
            return view('site.editcarts', $data);
        }
        else{
            dd('this cart not belong you');
        }
       
    }
    public function postEditCart(Request $request, Cart $cart,){
        
        if(Session::get('cartcode')==$cart->code){
            $request->validate([
                'qty' => 'required|integer|min:1',
            ]);
            $qty = $request->input('qty');
            $cart->qty = $qty;
            $cart->totalcost = $cart->cost*$qty;
            $code = Session::get('cartcode');
            $cart->code = $code;
            $cart->save();
            return redirect()->route('getCart');
        }
    }
    public function deletecarts (Cart $cart)
    {
        if(Session::get('cartcode')==$cart->code){
            $cart->delete();
            return redirect()->route('getCart');
        }
        else{
            dd('this cart not belong you');
        }
    }
    public function getBillingAddress(Cart $cart){
        
        
        if(Cart::hasCartItem(Session::get('cartcode'))){
            $cartcode = Session::get('cartcode');
        $data =[
            'carts' => Cart::where('code', $cartcode)->get()
        ];
        
        
        $crg = [
            'shipping' => Shippingcharge::latest()->get(),
        ];
       
                 return view('site.billingaddress', $data, $crg);
        }
        else{
            abort(404);
        }
    }
    public function postBillingAddress(Request $request){
        $cartcode = Session::get('id');
        $request->validate([
            'firstname'=> 'required',
            'secondname'=> 'required',
            'email'=> 'required',
            'state'=> 'required',
            
            'city'=> 'required',
            'zipcode'=> 'required',
            'paymethod'=> 'required | in:esewa,cod',
            
        ]);
        $firstname      =$request->firstname;    
        $secondname     =$request->secondname;    
        $email          =$request->email;    
        $state          =$request->state;    
        $city           =$request->city;    
        $zipcode        =$request->zipcode;    
        $paymethod      =$request->paymethod;


        $bill = new Billingaddress;


        $bill->firstname            = $firstname;
        $bill->secondname           = $secondname;
        $bill->email                = $email;
        $bill->charge                = $state;
        $bill->city                 = $city;
        $bill->zipcode              = $zipcode;
        $bill->paymethod            = $paymethod;
        $bill->save();

        if(Session::get('cartcode'))
        {
            $cartcode = Session::get('cartcode');
            $carts = Cart::where('code', $cartcode)->get();
        }
        else{
            abort(404);
        
        }

        // return $carts;
        foreach ($carts as $key => $value) {
            $id = $value->id;
        }
        if(Cart::hasCartItem(Session::get('cartcode'))){
            $cartcode = Session::get('cartcode');
        $data =[
            'carts' => Cart::where('code', $cartcode)->get()
        ];
        dd('item order');
        }
        else{
            abort(404);
        }
       
    }
    
  
   

}