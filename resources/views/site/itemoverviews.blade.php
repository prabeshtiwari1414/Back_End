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
                <a  href="{{route('getBillingAddress', $tabledata->id)}}" >Billing Address</a> >
                 <br> <br>
                <h3>Billing Adderess</h3><br>
                
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
                      <div>{{ $subtotal }}</div>
                      @endforeach
                      @foreach($charge as $crg)
                      @php
                        $shippingCharge = 20;
                        @endphp
                      @endforeach
                      <div>{{ $shippingCharge}}</div>
                      @php
                       $taxAmount = $subtotal * $taxPercentage;
                       $grandTotal = $subtotal + $shippingCharge + $taxAmount;
                       @endphp
                       
                       <div>{{$taxAmount}}</div>
                      <div><strong>{{$grandTotal}}</strong></div>
                      
               </div>
           </ul>

      </table>
  </div>
  
</div>
</div>
</div>
</div>
</div>
</div>
  @stop
  