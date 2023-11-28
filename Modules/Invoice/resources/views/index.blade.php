@extends('layouts.app')

@section('content')
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">employee_Name</th>
      <th scope="col">product_id</th>
      
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
        <form style="display:inline;" action="{{route('invoice.destroy',['invoice'=>$invoice->id])}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form> 
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
