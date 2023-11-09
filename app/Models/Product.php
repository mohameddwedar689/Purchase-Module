<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fill_table = [
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
}
