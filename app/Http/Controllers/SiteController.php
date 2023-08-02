<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SiteController extends Controller
{
    public function getHome(){
        $data = ['products' => $product];
        return view('site.home', $data );
    }
}