<?php

namespace Modules\Invoice\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Invoice\app\Models\Invoice;
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
    public function create()
    {
        return view('invoice::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvoiceRequest $request): RedirectResponse
    {
        return $request->validated();
        return Invoice::newInvoice($request->validated());
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
