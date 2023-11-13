<?php

namespace Modules\Invoice\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Invoice\Database\factories\InvoiceFactory;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ 'user_id',
                            'product_id',
                            'Qty',
                            'total',
                            'created_at',
                            'updated_at'
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
        return self::insert($data);
    }

    // Update Invoice 
    public static function upInvoice($invoice,$data){
        return self::where('id', $invoice->id)->Update($data);
    }

     // Delete Invoice 
     public static function delInvoice($invoice){
        return self::where('id', $invoice->id)->delete();
    }
}
