@extends('site.template')
@section('content')
<div id="card" style="padding:50px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <br /> <br />
                @foreach ($carts as $tabledata)
                @endforeach
                <a  href="{{route('getCart')}}" class="text-secondary">Carts</a> >
                <a  href="{{route('getBillingAddress', $tabledata->id)}}" >Billing Address</a> >
                 <br> <br>
                <h3>Billing Adderess</h3><br>
                <form action="{{route('postBillingAddress', $tabledata->id)}}" method="POST">
                @csrf
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
                                      <select class="form-select"  name="state" required>
                                        @foreach($shipping as $crg)
                                        <option value="{{$crg->shipping_charge}}">{{$crg->state}}</option>
                                        @endforeach
                                        
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
                                        <input type="radio" value="esewa" name="paymethod">
                                        <label   id="paymethod" >eSewa</label>
                                        <input type="radio" value="cod" name="paymethod">
                                        <label   id="paymethod" >COD</label>
                                    </div>
                                    <div class="col-12 mt-2 ">
                                      <button class=" btn btn-primary" type="submit">Submit form</button>
                                    </div>
                                </div>
                                
                            </form>
                    
                    <div class="col-md-4">
                      <table>
                        <tr>
                          <th class="p-2">State</th>
                          <th class="p-2">Charge</th>
                        </tr>
                        @foreach($shipping as $crg)
                        <tr>
                          <td class="p-2">{{$crg->state}}</td>
                          <td class="p-2">{{$crg->shipping_charge}}</td>
                        </tr>
                        @endforeach
                      </table>
                    </div>
                  </div>
                </div> 
        </div>
    </div>
</div>
@stop