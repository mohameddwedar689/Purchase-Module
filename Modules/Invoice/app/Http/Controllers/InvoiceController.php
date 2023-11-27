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
        $invoices = Invoice::with('products')->get();
        return view('invoice::index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create(Request $req) >> the old 
    public function create()
    {
        // return $req;
        //  dd($req);
        // $product = Product::getProduct($req->id);
        $products = Product::getAll();
        return view('invoice::create2', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//InvoiceRequest
    {
        dd($request);
        Invoice::newInvoice($request);
        return redirect()->route('invoice');
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
        return view('invoice::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

}
