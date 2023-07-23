<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AddProductController extends Controller
{
    public function getAddProduct(){
        return view('admin.product.product');
    }
    public function getManageProduct()
    {
        $data = [
            'products' => product::latest()->get(),
        ];
       
        return view('admin.product.manageproduct',['products' => product::paginate(5)]); 
    }
    public function postAddProduct(Request $request){
        $product_title      =   $request->product_title;
        $product_cost    =   $request->product_cost;
        $product_status    =   $request->product_status;

        $product_details    =   $request->product_details;
        $photo              =   $request->photo;
        $category              =   $request->category;
       
        if($photo){
            //generate unique name for photo
            $time=md5(time()).'.'.$photo->getClientOriginalExtension();
             // to move photo into folder
            $photo->move('site/uploads/product/',$time);
            
             // dd($photo);
        }
        else{
             $time=Null;
        }
             $product=new Product;
             $product->category        =   $category;
             $product->product_title    =   $product_title;
             $product->product_cost    =   $product_cost;
             $product->product_status    =   $product_status;
             $product->product_details    =   $product_details;
             $product->photo    =   $time;
             $product->save();
             return redirect()->route('getManageProduct');
            //  dd($time);
    }
}