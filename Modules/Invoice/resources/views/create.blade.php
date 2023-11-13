
@extends('layouts.app')

@section('content')

<div class="container">
    <form action="" method="post">
        <div class="row">
            <!-- product -->
            <input name="product" value="" type="text"/>
            <!-- quantity -->
            <input name="qty" value="" type="text"/>
            <!-- Total price -->
            <input name="price" value="" type="text"/>

            <input type="submit" class="btn btn-success" value="Create"/>
        </div>
    </form>
</div>
@endsection

@push('jquery')
<script type="module">
        $("input").click(function(){
            alert("Are You Sure!!");
        });
    </script>
@endpush
