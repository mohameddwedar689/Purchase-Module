
@extends('layouts.app')

@section('content')
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Active</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <th scope="row">1</th>
      <td>{{$product->name}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->quantity}}</td>
      <td>{{$product->active}}</td>
      <td>
        <a href="{{route('invoice.create',$id=$product->id)}}" class="btn btn-danger">Buy IT</a> 
        <a href="{{url('invoice/create?id='.$product->id)}}" class="btn btn-primary">Buy IT</a> 
        <button class="btn btn-success">Delete</button>
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
