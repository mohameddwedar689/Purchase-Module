
@extends('layouts.app')

@section('content')

<h1>Hello World</h1>

<p>Module: {!! config('product.name') !!}</p>

<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://media.istockphoto.com/id/1413840933/photo/old-books-on-wooden-shelf-tiled-bookshelf-background-concept-on-the-theme-of-history.webp?b=1&amp;s=170667a&amp;w=0&amp;k=20&amp;c=1Npv4ypDzrRYfcKmz1FpolYgeLWC5ndy9VGcgC7Odvs=" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{$product->product_name}}</h5>
                        <p class="card-text ">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <h4 class="text-primary">{{$product->price}}$</h4>
                        <a href="#" class="btn btn-danger">Buy IT</a> 
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
