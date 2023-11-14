
@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{url('invoice')}}" method="post">
        @csrf
        <div class="row">
            <div class="mb-3 col-6">
                <input type="hidden" name="product_id" value="{{$product->id}}"/>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                <!-- product -->
                <label for="name" class="form-label">Product name : </label>  
                <input class="form-control" name="name" type="text" value="{{$product->name}}" aria-label="readonly input example" readonly>
                
                <!-- quantity -->
                <label for="name" class="form-label">Maximum Quantity : {{$product->quantity}}</label>  
                <input id="qty" class="form-control" name="quantity" type="text" value="1" aria-label="readonly input example">
                @error('quantity')
                    <div class="error">{{ $message }}</div>
                @enderror
                <!--  price -->
                <label for="name" class="form-label">Product Price : </label>  
                <input id= "price" class="form-control" name="price" type="text" value="{{$product->price}}" aria-label="readonly input example" readonly>
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
                <!-- Total price -->
                <label for="name" class="form-label">Total Price : </label>  
                <input id="totalPrice" class="form-control" name="total" type="text" value="{{$product->price}}" aria-label="readonly input example" readonly>
            </div>
                <!-- hints -->
            <div class="mb-3">
                <label for="Hints" class="form-label">Any Hints!! : </label>
                <textarea class="form-control" name="hints" id="Hints" rows="3"></textarea>
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
