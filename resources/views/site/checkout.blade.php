@extends('site.template')
@section('content')
<div id="card" style="padding:50px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br /> <br />
                 <br> <br>
                <h3>Carts</h3><br>
                <form action="GET">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                                    <div class="col-md-4">
                                      <label for="validationCustom01" class="form-label">First name</label>
                                      <input type="text" class="form-control" id="validationCustom01"  name="firstname" required>
                                    
                                    </div>
                                    <div class="col-md-4">
                                      <label for="validationCustom02" class="form-label">Last name</label>
                                      <input type="text" class="form-control" id="validationCustom02" name="secondname" required>
                                      
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom2" class="form-label">E-mail</label>
                                      <div class="input-group has-validation">
                                        <input type="mail" class="form-control" id="validationCustomUsername" name="email" aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                          E-Mail
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <label for="validationCustom04" class="form-label">State</label>
                                      <select class="form-select" id="validationCustom04" name="State" required>
                                        <option value="Province-1">Province-1</option>
                                        <option value="Madesh">Madesh</option>
                                        <option value="Bagmati">Bagmati</option>
                                        <option value="Gandaki">Gandaki</option>
                                        <option value="Lumbini">Lumbini</option>
                                        <option value="Karnali">Karnali</option>
                                        <option value="SudurPaschim">SudurPaschim</option>
                                      </select>
                                      <div class="invalid-feedback">
                                        Please select a valid state.
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <label for="validationCustom03" class="form-label">City</label>
                                      <input type="text" class="form-control" id="validationCustom03" name="city" required>
                                      <div class="invalid-feedback">
                                        Please provide a valid city.
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <label for="validationCustom05" class="form-label">Zip</label>
                                      <input type="text" class="form-control" name="zipcode" id="validationCustom05" required>
                                      <div class="invalid-feedback">
                                        Please provide a valid zip.
                                      </div>
                                    </div>
                                    <div class="cocl-md-3">
                                        <label for="validationCustom05" class="form-label">Payment Method</label> <br>
                                        <input type="radio" name="paymethod">
                                        <label for="validationCustom05" class="form-label" id="paymethod" value="esewa">eSewa</label>
                                        <input type="radio" name="paymethod">
                                        <label for="validationCustom05" class="form-label" id="paymethod" value="cod">COD</label>
                                    </div>
                                    
                                    <div class="col-12 mt-2 ">
                                      <button class=" btn btn-primary" type="submit">Submit form</button>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <strong><h3><b>Item OverViews</b></h3></strong> <br>
                                    <div class="d-flex">
                                    @foreach ($carts as $tabledata)
                                    @php
                                             $productinfo = App\Models\Product::where('id', $tabledata->product_id)->first();   
                                             @endphp
                                                <img src="{{ asset('site/uploads/product/' . $productinfo->photo) }}" alt=""
                                            width="100">
                                            @endforeach
                                        </div>
                                    <strong><h3><b>Order Summary</b></h3></strong> <br>
                                    <table>
                                        <ul class="d-flex">
                                            <div class="paytable col-8">
                                                <div></div>
                                                <div>SubTotal : </div>
                                                <div>Shipping : </div>
                                                <div>Estimated Tax: </div>
                                                <div><strong>GrandTotal</strong> : </div>
                                            </div>
                                            <div class="paymentprice col-4">
                                                @php
                                                    $subtotal = 0; // Initialize the grand total variable
                                                    $shippingCharge = 200;
                                                    $taxPercentage = 0.20;
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