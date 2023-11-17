<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Database\factories\ProductFactory;

use Modules\Invoice\app\Models\Invoice;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'category',
        'price',
        'active',
        'quantity'
    ];
    public static function getAll(){
        // dd($products = self::all());
        return $products = self::all();
    }
    // Get Product
    public static function getProduct($id){
        // dd($products = self::all());
        return $product = self::find($id);
    }
    public function create($request){
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();    
    }
    
    protected static function newFactory(): ProductFactory
    {
        //return ProductFactory::new();
    }
    ################################## Relations ####################
    public function invoices(){
        return $this->belongsToMany(Invoice::class, 'invoice_product');
    }
}
