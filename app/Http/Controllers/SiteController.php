<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
}