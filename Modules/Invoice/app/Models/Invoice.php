<?php

namespace Modules\Invoice\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Invoice\Database\factories\InvoiceFactory;

use Modules\Product\app\Models\Product;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 'user_id',
                            'product_id',
                            'quantity',
                            'total',
                           
                        ];
    protected $hidden = [ 
                            'created_at',
                            'updated_at'
                        ];
    
    protected static function newFactory(): InvoiceFactory
    {
        //return InvoiceFactory::new();
    }

    // get specific Invoice 
    public static function getInvoice($id){
        return self::find($id);
    }
    //get All  Invoices
    public static function getAll(){
        return self::all();
    }

    // Store Invoice 
    public static function newInvoice($data){
        $invoice = new invoice();
        $invoice->user_id = auth()->user()->id;
        $invoice->product_id = $data-> product_id;
        $invoice->quantity = $data-> quantity;
        $invoice->total = $data-> total;
        $invoice->save();
        $invoice->products()->syncWithoutDetaching($data->product_id);
        // return self::insert($data);
    }

    // Update Invoice 
    public static function upInvoice($invoice,$data){
        return self::where('id', $invoice->id)->Update($data);
    }

     // Delete Invoice 
     public static function delInvoice($invoice){
        return self::where('id', $invoice->id)->delete();
    }
    ######################################### Relations ###########################
    public function products(){
        return $this->belongsToMany(Product::class, 'invoice_product');
    }
}
