<?php

namespace Modules\Invoice\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Invoice\app\Models\Invoice;
use Modules\Product\app\Models\Product;
use Modules\Invoice\app\Http\Requests\InvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::getAll();
        return view('invoice::index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        // return $req;
        //  dd($req);
        $product = Product::getProduct($req->id);
        return view('invoice::create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request)
    {
        
        Invoice::newInvoice($request);
        return redirect(url('/invoice'));
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $invoice = Invoice::getInvoice($id);
        return view('invoice::show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice=Invoice::findOrFail($id);
        return view('invoice::edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $invoice = Invoice::findOrFail($request->invoice_id);
        $product = Product::findOrFail($request->product_id);
        $price = $product->price;
        $invoice->quantity = $request->quantity;
        $invoice->total = $price * $request->quantity ;
        $invoice->save();
        return redirect(url('/invoice'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post){
        $Db = Invoice::findOrFail($post);
        $Db->delete();
        return redirect('/invoice/');
      }
}
