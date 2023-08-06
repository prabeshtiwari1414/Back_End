@extends('site.template')
@section('content')
<div id="card" style="padding: 50px 0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Edit Cart</h3>
                <form action="{{ route('updatecart', $cart->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                               
                                <th scope="col">Quantity</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                
                                <td>
                                    <input type="number" class="form-control" name="qty" value="{{ $cart->qty }}" min="1">
                                </td>
                                
                                <td style="text-align: center;">
                                    <button type="submit" class="btn btn-primary" {{ $cart->qty >= 1 ? '' : 'disabled' }}>Update Quantity</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
