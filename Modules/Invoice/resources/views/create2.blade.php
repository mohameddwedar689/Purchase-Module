
@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{url('invoice')}}" method="post">
        @csrf
        <div class="row">
            <div class="mb-3 col-6">
                <!-- product -->
                <label for="name" class="form-label">All Products: </label>  
                <select id="product" class="form-select" name="products[]" multiple aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
                <!-- <a href="" class="btn btn-primary add" hidden>Add</a> -->
                <input type="button" id="add" class="btn btn-primary " value="Add" style="display:none" />
                <hr class="h"/>
                <!-- Content of product -->
                <div class="content">
                    <!-- quantity -->
                    <label for="qty" class="form-label h">Maximum Quantity of {{$product->name}}: {{$product->quantity}}</label>  
                    <input id="qty" class="form-control h" name="quantity" type="text" value="1" aria-label="readonly input example">
                    @error('quantity')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <!--  price -->
                    <label for="price" class="form-label h">{{$product->name}} Price : </label>  
                    <input id= "price" class="form-control h" name="price" type="text" value="{{$product->price}}" aria-label="readonly input example" readonly>
                    @error('price')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    <!-- Total price -->
                    <label for="totalPrice" class="form-label h">Total Price : </label>
                    <input id="totalPrice" class="form-control h" name="total" type="text" value="{{$product->price}}" aria-label="readonly input example" readonly>
            
                </div>
                <hr/>
            </div>
                <!-- hints -->
            <div class="mb-3">
                <!-- Total price -->
                <label for="invoicePrice" class="form-label">Total Price of Invoice: </label>
                <input id="totalInvoicePrice" class="form-control" name="total" type="text" value="test" aria-label="readonly input example" readonly>
            
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
    $("#submit").click(function(){
        alert("Are You Sure!!");
    });
    // for counting the value of total price from quantity and price
    $('#qty').keyup(function () {
        var qty = parseFloat($('#qty').val()); // get number as float
        var price = parseFloat($('#price').val()); // get number as float
        if(!isNaN(qty) && !isNaN(price)){
            $('#totalPrice').val(qty * price);
        }else{
            alert("Some thing Error You should look About Your Data!!");
        }
    });
    //need to hide all inputs depend on the product and show it when selected
    $('.h').hide();
    //when select product
   
    
    $("#product").on("change", function(e) {
        const selectedValue = $(this).val();
        // console.log(Array.isArray(selectedValue) ? selectedValue.join() : selectedValue);
         //for get the data of selected product
         if(selectedValue != null){
                $('#add').show();
                $('#add').click(function(){
                    console.log(Array.isArray(selectedValue) ? selectedValue.join() : selectedValue);
                    $.ajax({
                                url: "{{url('product/selected/2')}}?id="+selectedValue,
                                type:"GET",
                                    // data: { id: selectedValue},
                                success: function (response) {
                                        console.log(response);
                                        // $('#post-data').append(response);
                                    }
                            });
                });
            }
    
    });
   

    

    //  $('.h').show(); 

</script>
@endpush
