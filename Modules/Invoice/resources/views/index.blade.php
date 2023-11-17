@extends('layouts.app')

@section('content')
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">employee_Name</th>
      <th scope="col">Product_Name</th>
      
      <th scope="col">Quantity</th>
      <th scope="col">totalPrice</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
  @foreach($invoices as $invoice)
    <tr>
      <th scope="row">{{$invoice->id}}</th>
      <td>{{Auth::user()->name}}</td>
      <td>
        @foreach($invoice->products as $product)
        {{$product->name}}
        @endforeach
      </td>
      
      <td>{{$invoice->quantity}}</td>
      <td>{{$invoice->total}}</td>
      
      <td>
        <a href="{{route('invoice.edit',$invoice->id)}}" class="btn btn-success">Edit</a> 
        
        <button class="btn btn-danger">Delete</button>
      </td>
      
    </tr>
    @endforeach
  </tbody>
</table>
    
</div>
@endsection

@push('jquery')
<script type="module">
        $("button").click(function(){
            alert("Thanks");
        });
    </script>
@endpush
