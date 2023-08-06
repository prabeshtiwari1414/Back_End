@extends('site.template')
@section('content')
<div id="card" style="padding:50px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br /> <br />
                @foreach ($carts as $tabledata)
                @endforeach
                <a  href="{{route('getCart')}}" class="text-secondary">Carts</a> >
                <a  href="{{route('getCheckOut', $tabledata->id)}}" >Checkout</a> >
                 <br> <br>
                <h3>Carts</h3><br>
                <form action="GET">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                                    <div class="col-md-4">
                                      <label  >First name</label>
                                      <input type="text"    name="firstname" required>
                                    
                                    </div>
                                    <div class="col-md-4">
                                      <label  >Last name</label>
                                      <input type="text"   name="secondname" required>
                                      
                                    </div>
                                    <div class="col-md-4">
                                        <label  >E-mail</label>
                                      <div>
                                        <input type="mail"   name="email"  required>
                                       
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <label  >State</label>
                                      <select class="form-select"  name="State" required>
                                        <option value="Province-1">Province-1</option>
                                        <option value="Madesh">Madesh</option>
                                        <option value="Bagmati">Bagmati</option>
                                        <option value="Gandaki">Gandaki</option>
                                        <option value="Lumbini">Lumbini</option>
                                        <option value="Karnali">Karnali</option>
                                        <option value="SudurPaschim">SudurPaschim</option>
                                      </select>
                                      
                                    </div>
                                    <div class="col-md-6 mt-2">
                                      <label  >City</label> <br>
                                      <input type="text"   name="city" required>
                                     
                                    </div>
                                    <div class="col-md-3">
                                      <label  >Zip</label>
                                      <input type="text"  name="zipcode"  required>
                                      
                                    </div>
                                    <div class="cocl-md-3">
                                        <label  >Payment Method</label> <br>
                                        <input type="radio" name="paymethod">
                                        <label   id="paymethod" value="esewa">eSewa</label>
                                        <input type="radio" name="paymethod">
                                        <label   id="paymethod" value="cod">COD</label>
                                    </div>
                                    
                                    <div class="col-12 mt-2 ">
                                      <button class=" btn btn-primary" type="submit">Submit form</button>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <strong><h3><b>Item OverViews</b></h3></strong> <br>
                                    <div class="d-flex row">
                                    @foreach ($carts as $tabledata)
                                    @php
                                             $productinfo = App\Models\Product::where('id', $tabledata->product_id)->first();   
                                             @endphp
                                                <img src="{{ asset('site/uploads/product/' . $productinfo->photo) }}" alt=""
                                            width="100" class="m-2 col-3">
                                            @endforeach
                                        </div>
                                    <strong><h3><b>Order Summary</b></h3></strong> <br>
                                    <table>
                                        <ul class="d-flex">
                                            <div class="paytable col-8">
                                                <div></div>
                                                <div>SubTotal : </div>
                                                <div>Shipping : </div>
                                                <div>Estimated Tax (13%): </div>
                                                <div><strong>GrandTotal</strong> : </div>
                                            </div>
                                            <div class="paymentprice col-4">
                                                @php
                                                    $subtotal = 0; // Initialize the grand total variable
                                                    $shippingCharge = 200;
                                                    $taxPercentage = 0.13;
                                                    $grandTotal = 0;
                                                @endphp

                                                 @foreach ($carts as $tabledata)
                                                     @php
                                                         $productinfo = App\Models\Product::where('id', $tabledata->product_id)->first();
                                                             $itemCost = $tabledata->totalcost;
                                                            $subtotal += $itemCost;
                                                           
                                                    @endphp
                                                    
                                                    @endforeach
                                                    @php
                                                     if ($subtotal > 1000) {
                                                        $shippingCharge = 0;
                                                     }
                                                     $taxAmount = $subtotal * $taxPercentage;
                                                     $grandTotal = $subtotal + $shippingCharge + $taxAmount;
                                                    @endphp
                                                     
                                                    <div>{{ $subtotal }}</div>
                                                    <div>{{ $shippingCharge}}</div>
                                                    <div>{{$taxAmount}}</div>
                                                    <div><strong>{{$grandTotal}}</strong></div>
                                                    
                                             </div>
                                         </ul>
    
                                    </table>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop