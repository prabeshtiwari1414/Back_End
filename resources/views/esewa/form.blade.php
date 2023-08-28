<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Order Now</title>
</head>
<body>
    <div id="card" style="padding: 50px 0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Order Confirmation</h3>
                    @if ($order)
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <p><strong>Personal Information:</strong></p>
                                    <p>Full Name: {{ $order->name }}</p>
                                    <p>Email: {{ $order->email }}</p>
                                    <p>City: {{ $order->city }}</p>
                                    <p>Zip: {{ $order->zipcode }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Order Summary:</strong></p>
                                    <p>Subtotal: NRS {{ $order->totalamount }}</p>
                                    <p>Shipping Charge: NRS {{ $order->shippingamount }}</p>
                                    <p>Tax Amount: NRS {{ $order->taxamount}}</p>
                                    <p><strong>Grand Total: NRS {{ $order->grandtotal }}</strong></p>
                                    <form action="https://uat.esewa.com.np/epay/main" method="POST" class="text-align-center align-item-center">
                                        @php
                                            $grandTotalFloat = floatval($order->grandtotal);
                                            $totalAmountFloat = floatval($order->totalamount);
                                            $shippingAmountFloat = floatval($order->shippingamount);
                                            $taxAmountFloat = floatval($order->taxamount);
                                             $pid = rand(1, 999999); // Generates a random integer between 100000 and 999999


                                        @endphp
                                        <input value="{{$grandTotalFloat}}" name="tAmt" type="hidden">{{-- amt+txamt+psc+pdc --}}
                                        <input value="{{$totalAmountFloat}}" name="amt" type="hidden"> {{-- product amount --}}
                                        <input value="{{$taxAmountFloat}}" name="txAmt" type="hidden"> {{-- Tax amount --}}
                                        <input value="0" name="psc" type="hidden"> {{-- service charge amount --}}
                                        <input value="{{$shippingAmountFloat}}" name="pdc" type="hidden"> {{-- delivery charge amount --}}
                                        <input value="EPAYTEST" name="scd" type="hidden"> {{-- merchant code which is provided by esewa --}}
                                        <input value="{{$pid}}" name="pid" type="hidden">
                                        <p>{{$pid}}</p>
                                        
                                        <input value="http://localhost:8000/esewa/success" type="hidden" name="su">
                                        <input value="http://localhost:8000/esewa/fail" type="hidden" name="fu">
                                
                                        <button class=" btn btn-primary" type="submit">Pay Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <p>Order not found.</p>
                    
                     @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>