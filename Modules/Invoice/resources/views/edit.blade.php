@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{url('invoice/update')}}" method="post">
        @csrf
        @method('put')
        <div class="mb-3 col-6">
        <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
        <label for="name" class="form-label">Product_id : </label>  
        <input id= "price" class="form-control" name="product_id" type="text" value="{{$invoice->product_id}}" aria-label="readonly input example" readonly>
            <label for="name" class="form-label">quantity: </label>  
            <input class="form-control" name="quantity" type="text" value="{{$invoice->quantity}}" >
            <input type="submit" value="update">
        </div>
    </form>
</div>
@endsection