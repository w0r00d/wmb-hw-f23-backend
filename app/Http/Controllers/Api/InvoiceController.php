<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    //
    
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            
            'total' => 'required|numeric',
            'credit_card' => 'required|string',
        ]);

        // Create a new invoice
        $invoice = Invoice::create([
            'Customer_Id' => $request->customer_id,
           
            'Total' => $request->total,
            'CreditCard' => $request->credit_card,
        ]);

        return response()->json(['message' => 'Invoice created successfully', 'invoice' => $invoice], 201);
    }

    public function index()
    {
        $invoices = Invoice::with('orders')->get();
        return response()->json(['invoices' => $invoices], 200);
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);
        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], 404);
        }
        return response()->json(['invoice' => $invoice], 200);
    }
}
