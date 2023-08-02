@extends('site.template')
@section('content')
<!-- banner section start -->
<div class="banner_section layout_padding">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="banner_taital">Beauty <br>Kit</h1>
                            <p class="banner_text">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                            <div class="read_bt"><a href="#">Buy Now</a></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="banner_img"><img src="{{asset('site/images/banner-img.png')}}"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="banner_taital">Beauty <br>Kit</h1>
                            <p class="banner_text">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                            <div class="read_bt"><a href="#">Buy Now</a></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="banner_img"><img src="{{asset('site/images/banner-img.png')}}"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="banner_taital">Beauty <br>Kit</h1>
                            <p class="banner_text">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                            <div class="read_bt"><a href="#">Buy Now</a></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="banner_img"><img src="{{asset('site/images/banner-img.png')}}"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="banner_taital">Beauty <br>Kit</h1>
                            <p class="banner_text">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                            <div class="read_bt"><a href="#">Buy Now</a></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="banner_img"><img src="{{asset('images/banner-img.png')}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner section end -->
<!-- product section start -->
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
                        <h4 class="bursh_text">{{$product->title}}</h4>
                        <p class="lorem_text">{{$product->detail}} </p>
                        <img src="{{asset('site/images/img-1.png')}}" class="image_1">
                        <div class="btn_main">
                            <div class="buy_bt">
                                <ul>
                                    <li class="active"><a href="#">Buy Now</a></li>
                                    <li><a href="#">Buy Now</a></li>
                                </ul>
                            </div>
                            <h3 class="price_text">Price $30</h3>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="seemore_bt"><a href="#">See More</a></div>
        </div>
    </div>
</div>
<!-- product section end -->
<!-- about section start -->
<div class="about_section layout_padding">
    <div class="container">
        <div class="about_section_main">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_taital_main">
                        <h1 class="about_taital">About Our beauty sotore</h1>
                        <p class="about_text">labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatlabore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequatlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                        <div class="readmore_bt"><a href="#">Read More</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div><img src="{{asset('site/images/about-img.png')}}" class="image_3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about section end -->
<!-- customer section start -->
<div class="customer_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="customer_taital">What says customers</h1>
            </div>
        </div>
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="client_section_2">
                        <div class="client_main">
                            <div class="client_left">
                                <div class="client_img"><img src="{{asset('site/images/client-img.png')}}"></div>
                            </div>
                            <div class="client_right">
                                <h3 class="name_text">Jonyro</h3>
                                <p class="dolor_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation eu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="client_section_2">
                        <div class="client_main">
                            <div class="client_left">
                                <div class="client_img"><img src="{{asset('site/images/client-img.png')}}"></div>
                            </div>
                            <div class="client_right">
                                <h3 class="name_text">Jonyro</h3>
                                <p class="dolor_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation eu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="client_section_2">
                        <div class="client_main">
                            <div class="client_left">
                                <div class="client_img"><img src="{{asset('site/images/client-img.png')}}"></div>
                            </div>
                            <div class="client_right">
                                <h3 class="name_text">Jonyro</h3>
                                <p class="dolor_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation eu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>
<!-- customer section end -->
<!-- contact section start -->
<div class="contact_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="contact_taital">Get In Touch</h1>
                <p class="contact_text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation eu </p>
            </div>
            <div class="col-md-6">
                <div class="contact_main">
                    <div class="contact_bt"><a href="#">Contact Form</a></div>
                    <div class="newletter_bt"><a href="#">Newletter</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="map_main">
        <div class="map-responsive">
            <iframe
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France"
                width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
        </div>
    </div>
</div>
<!-- contact section end -->
@stop