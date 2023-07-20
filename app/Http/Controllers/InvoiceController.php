<?php

namespace App\Http\Controllers;

use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = InvoiceResource::collection(Invoice::with('product')->get());
        return Inertia::render('Invoice/Index',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return Inertia::render('Invoice/Create',compact('products'));
    }
    public function productWisePrice($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Invoice::create([
            'product_id' => $request->product_id,
            'price' => $request->price,
            'invoice_date' => $request->invoice_date,
            'due_date' => $request->due_date,
            'product_qty' => $request->product_qty,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'email' => $request->email,
            'total' => $request->total
        ]);

        return Redirect::route('invoices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
