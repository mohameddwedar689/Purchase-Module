<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('product')}}" method="post">
        @csrf
<div class="mb-3">
  <label for="product_name" class="form-label">product_name</label><br>
  <input type="text" class="form-control" id="product_name" name="product_name"><br><br>
</div>
<div class="mb-3">
  <label for="description" class="form-label">description</label><br>
  <input type="text" class="form-control" id="description" name="description"><br><br>
</div>
<div class="mb-3">
  <label for="category" class="form-label">category</label><br>
  <input type="text" class="form-control" id="category" name="category"><br><br>
</div>
<div class="mb-3">
  <label for="price" class="form-label">price</label><br>
  <input type="text" class="form-control" id="price" name="price"><br><br>
</div>
<div class="mb-3">
  <label for="stock_quantity" class="form-label">stock_quantity</label><br>
  <input type="text" class="form-control" id="stock_quantity" name="stock_quantity"><br><br>
</div>
<div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Add product</button>
  </div>
  </form>
</body>
</html>