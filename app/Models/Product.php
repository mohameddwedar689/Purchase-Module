<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'description',
        'category',
        'price',
        'stock_quantity'
    ];
    public static function getAll(){
        // dd($products = self::all());
        return $products = self::all();
    }
    public function create($request){
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->stock_quantity = $request->stock_quantity;
        $product->save();    
    }
}
