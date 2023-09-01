<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Billingaddress;
use App\Models\Shippingcharge;
use App\Models\Order;
use Session;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    public function getHome(){
        $data= [
            'products' => Product::where('status', 'show')->latest()->skip(1)->limit(8)->get(),
            
        ];
        $carouselactive= [
            'carouselproductactive' => Product::where('status', 'show')->latest()->limit(1)->get(),
            
        ];
        $carousel= [
            'carouselproduct' => Product::where('status', 'show')->latest()->skip(1)->limit(3)->get(),
            
        ];
        return view('site.home', array_merge($carouselactive, $data, $carousel));
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
        $productId = $product->id;
        $productCost = $product->product_cost;

        $cartCode = Session::get('cartcode');

        $existingCart = Cart::where('code', $cartCode)
                    ->where('product_id', $productId)
                    ->first();

        if ($existingCart) {
        $existingCart->qty += $qty;
        $existingCart->totalcost = $existingCart->qty * $productCost;
        $existingCart->save();
        }
        else {
            if (!$cartCode) {
                $newCartCode = Str::random(6);
                Session::put('cartcode', $newCartCode);
            }
            $newCart = new Cart;
            $newCart->product_id = $productId;
            $newCart->qty = $qty;
            $newCart->cost = $productCost;
            $newCart->totalcost = $productCost * $qty;
            $newCart->code = $cartCode;
            $newCart->save();
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
    public function postBillingAddress(Request $request){
        $name = $request->input('firstname')." ".$request->input('secondname');
        $email = $request->input('email');
        // $state_id = $scg->input('id');
        $city = $request->input('city');
        $zipcode = $request->input('zipcode');
        $paymethod = $request->input('paymethod');
        if($paymethod =='cod'){
            $payment_status = 'n';
        }
        elseif($paymethod == 'esewa')
        {
            $payment_status = 'y';
        }
        $cartcode = Session::get('cartcode');
        $subtotal = session('subtotal');
        $taxAmount = session('taxAmount');
        $grandTotal = session('grandTotal');
        $state_id = $request->input('state_id');
        
        $shippingCharge = ShippingCharge::where('id', $state_id)->value('shipping_charge');

        $order = new Order;
        $order->name                            = $name;
        $order->email                           = $email;
        $order->city                            = $city;
        $order->zipcode                         = $zipcode;
        $order->payment_type                    = $paymethod;
        $order->payment_status                  = $payment_status;
        $order->cartcode                        = $cartcode;
        $order->totalamount                     = $subtotal;
        $order->taxamount                       = $taxAmount;
        $order->state_id                        = $state_id;
        $order->shippingamount                  = $shippingCharge;
        $order->grandTotal                      = $subtotal+$taxAmount+$shippingCharge;
        $order->save();
        


        if($request->input('paymethod') == 'esewa'){
            $url = "https://uat.esewa.com.np/epay/main";
           // dd($url);
            $data =[
            'amt'=> $order->totalamount,
            'pdc'=> $shippingCharge,
            'psc'=> 0,
            'txAmt'=> $taxAmount,
            'tAmt'=> $order->totalamount+$shippingCharge+$taxAmount,
            'pid'=>$order->id,
            'scd'=> 'EPAYTEST',
            'su'=>'http://localhost:8000/esewa/success',
            'fu'=>'http://localhost:8000/esewa/fail',
                ];
            $curl = curl_init($url);
            // dd($curl);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            curl_close($curl);
            return redirect()->route('getSewa', ['orderId' => $order->id]);

        }
        else{
            dd('your order has been success with COD');
        }
    }
    public function getSewa($orderId){
        if(Cart::hasCartItem(Session::get('cartcode'))){
            $cartcode = Session::get('cartcode');
        $data =[
            'carts' => Cart::where('code', $cartcode)->get()
        ];
        
        
        $order = Order::find($orderId);
        $orderId =[
            'order' => $order
        ];
                 return view('esewa.form', $data, $orderId);
        }
        else{
            abort(404);
        }
    }
}
    
  
   