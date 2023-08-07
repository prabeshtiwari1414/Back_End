@extends('site.template')
@section('content')
<div id="card" style="padding:50px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br /> <br />
                    <a  href="{{route('getCart')}}">Carts</a> >
                 <br> <br>
                <h3>Carts</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <div class="container">
                                <div class="row">
                                    
                                    <th scope="col-3">Photo</th>
                                    <th scope="col-3">Product</th>
                                    <th scope="col-3">Quantity <br><h6>(You can eidt this via edit option)</h6></th>
                                    <th scope="col-3">Cost</th>
                                    <th scope="col-3">Total</th>
                                    <th scope="col-3">State</th>
                                </div>
                            </div>
                        </tr>
                    </thead>
                    @foreach ($carts as $tabledata)
                    @php
                    $productinfo = App\Models\Product::where('id', $tabledata->product_id)->limit(1)->first();
                    @endphp
                    <tbody>
                        <tr>
                            <td class="col-2"><img src="{{ asset('site/uploads/product/' . $productinfo->photo) }}" alt=""
                                    width="100"></td>
                            <td class="col-3">{{ $productinfo->product_title }}</td>
                            <td class="col-2">{{ $tabledata->qty }}</td>
                            <td class="col-1">{{ $tabledata->cost }}</td>
                            <td class="col-1">{{ $tabledata->totalcost }}</td>
                            
                            <td class="col-3" style="text-align: center;"> 
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