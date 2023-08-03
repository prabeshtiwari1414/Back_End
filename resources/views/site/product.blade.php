@extends('site.template')
@section('productsection')
<div class="product_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="product_taital">Our Products</h1>
                <p class="product_text">incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                    nostrud exercitation</p>
            </div>
        </div>
        <div class="product_section_2 layout_padding">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-3 col-sm-6">
                    <div class="product_box">
                        <h4 class="bursh_text">{{$product->product_title}}</h4>
                        <p class="lorem_text">{{$product->product_details}} </p>
                        <img src="{{ asset('site/uploads/product/'.$product->photo) }}" class="image_1">

                        <div class="btn_main">
                            <div class="buy_bt">
                                <ul>
                                    <li><a href="#">Add Cart </a></li>
                                    <li><a href="#">Buy Now</a></li>
                                </ul>
                            </div>
                            <h3 class="price_text">Price <br>Rs.{{$product->product_cost}}</h3>
                        </div>

                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
@stop