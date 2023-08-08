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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop