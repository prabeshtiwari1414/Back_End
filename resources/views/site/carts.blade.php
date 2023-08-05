@extends('site.template')
@section('content')
<div id="card" style="padding:50px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br /> <br />
                    <a  href="{{route('getCart')}}">Carts</a>
                 <br> <br>
                <h3>Carts</h3>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Photo</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    @foreach ($carts as $tabledata)
                    @php
                    $productinfo = App\Models\Product::where('id', $tabledata->product_id)->limit(1)->first();
                    @endphp
                    <tbody>
                        <tr>
                            <td><img src="{{ asset('site/uploads/product/' . $productinfo->photo) }}" alt=""
                                    width="100"></td>
                            <td>{{ $productinfo->product_title }}</td>
                            <td>{{ $tabledata->qty }}</td>
                            <td>{{ $tabledata->cost }}</td>
                            <td>{{ $tabledata->totalcost }}</td>
                            <td style="text-align: center;"> 
                                <a href="{{route('editcartss', $tabledata->id)}}"
                                    class="text-secondary btn text-light btn-primary font-weight-bold text-xs"><b>Edit</b> 
                                </a> |
                                <a href="{{route('deletecarts', $tabledata->id)}}"
                                    class="text-secondary btn text-light btn-danger font-weight-bold text-xs"><b>Remove</b>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach

                </table>
                <div class="seemore_bt"><a href="{{route('getProduct')}}">See More Product</a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{route('getCheckOut', $tabledata->id)}}" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
</div>
@stop