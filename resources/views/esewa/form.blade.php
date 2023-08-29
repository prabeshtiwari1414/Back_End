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
                    <h3><b>Order Confirmation <span class="text-success">eSewa</span> </b></h3>
                    @if ($order)
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <p><strong><h4>Personal Information</h4></strong></p>
                                    <div class="d-flex">
                                        <div class="perinfo col-6">
                                            <p>Fullname: </p>
                                            <p>E-mail: </p>
                                            <p>City: </p>
                                            <p>Zipcode: </p>
                                        </div>
                                        <div class="preinfo col-6">
                                            <p><b>{{ $order->name }}</b></p>
                                            <p><b>{{ $order->email }}</b></p>
                                            <p><b>{{ $order->city }}</b></p>
                                            <p><b>{{ $order->zipcode }}</b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table>
                                        <p><strong><h4>Order Summary</h4></strong></p> <br>
                                          <ul class="d-flex">
                                          <div class="paytable col-md-10">
                                              
                                                <div>SubTotal : </div>
                                                <div>Shipping : </div>
                                                <div>Estimated Tax(13%): </div>
                                                <div><strong>GrandTotal</strong> : </div>
                                              </div>
                                              <div class="paymentprice ">
                                                
      
                                               
                                              <div>{{ $order->totalamount }}</div>
                                              
                                              <div>{{$order->shippingamount}}</div>
                                                         
                                                      <span class="tax-amount">{{ $order->taxamount }}</span><br>
                                                      <strong><span class="grand-total">{{ $order->grandtotal }}</span></strong>
                                                     
                                                    </div>
                                                  </ul>
                                                </div>
                                                
                                              </table>
                                    <form action="https://uat.esewa.com.np/epay/main" method="POST" class="text-align-center align-item-center">
                                        @php
                                            $grandTotalFloat = floatval($order->grandtotal);
                                            $totalAmountFloat = floatval($order->totalamount);
                                            $shippingAmountFloat = floatval($order->shippingamount);
                                            $taxAmountFloat = floatval($order->taxamount);
                                             $pid = rand(1, 999999); // Generates a random integer between 100000 and 999999
                                        @endphp
                                        <input value="100" name="tAmt" type="hidden">{{-- amt+txamt+psc+pdc --}}
                                        <input value="90" name="amt" type="hidden"> {{-- product amount --}}
                                        <input value="5" name="txAmt" type="hidden"> {{-- Tax amount --}}
                                        <input value="3" name="psc" type="hidden"> {{-- service charge amount --}}
                                        <input value="2" name="pdc" type="hidden"> {{-- delivery charge amount --}}
                                        <input value="EPAYTEST" name="scd" type="hidden"> {{-- merchant code which is provided by esewa --}}
                                        <input value="{{$pid}}" name="pid" type="hidden">
                                        <input value="http://localhost:8000/esewa/success" type="hidden" name="su">
                                        <input value="http://localhost:8000/esewa/fail" type="hidden" name="fu">
                                
                                        <button class=" btn btn-primary mt-5" type="submit">Pay Now</button>
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