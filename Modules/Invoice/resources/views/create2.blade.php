
@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{url('invoice')}}" method="post">
        @csrf
        <div class="row">
            <div class="mb-3 col-6">
                
                <!-- product -->
                <label for="name" class="form-label">All Products: </label>  
                
                <select class="form-select" multiple aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
                <!-- quantity -->
                <label for="name" class="form-label h">Maximum Quantity : {{$product->quantity}}</label>  
                <input id="qty" class="form-control h" name="quantity" type="text" value="1" aria-label="readonly input example">
                @error('quantity')
                    <div class="error">{{ $message }}</div>
                @enderror
                <!--  price -->
                <label for="name" class="form-label h">Product Price : </label>  
                <input id= "price" class="form-control h" name="price" type="text" value="{{$product->price}}" aria-label="readonly input example" readonly>
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
                <!-- Total price -->
                <label for="name" class="form-label h">Total Price : </label>  
                <input id="totalPrice" class="form-control h" name="total" type="text" value="{{$product->price}}" aria-label="readonly input example" readonly>
            </div>
                <!-- hints -->
            <div class="mb-3">
                <label for="Hints" class="form-label h">Any Hints!! : </label>
                <textarea class="form-control h" name="hints" id="Hints" rows="3"></textarea>
            </div>

            <!-- <input type="submit" id="submit" class="btn btn-success col-6" value="Create Invoice"/> -->
            <button type="submit" class="btn btn-success col-6" >Create Invoice</button>
            
            
        </div>
    </form>
</div>
@endsection

@push('jquery')
<script type="module">
    // $("#submit").click(function(){
    //     alert("Are You Sure!!");
    // });

    $('#qty').keyup(function () {
        var qty = parseFloat($('#qty').val()); // get number as float
        var price = parseFloat($('#price').val()); // get number as float
        if(!isNaN(qty) && !isNaN(price)){
            $('#totalPrice').val(qty * price);
        }else{
            alert("Some thing Error You should look About Your Data!!");
        }
    });

</script>
@endpush
