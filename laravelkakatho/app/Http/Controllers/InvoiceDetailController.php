<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class InvoiceDetailController extends Controller
{
    public function store(Request $request, Invoice $invoice): RedirectResponse
    {
        $request->validate([
            'coil_number' => 'required|string|max:50',
            'width' => 'required|numeric|min:0',
            'length' => 'required|numeric|min:0',
            'thickness' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $invoice->details()->create($request->all());

        return redirect()->route('invoices.edit', $invoice)
            ->with('success', 'Detail added successfully');
    }

    public function update(Request $request, InvoiceDetail $detail): RedirectResponse
    {
        $request->validate([
            'coil_number' => 'required|string|max:50',
            'width' => 'required|numeric|min:0',
            'length' => 'required|numeric|min:0',
            'thickness' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $detail->update($request->all());

        return redirect()->route('invoices.edit', $detail->invoice_id)
            ->with('success', 'Detail updated successfully');
    }

    public function destroy(InvoiceDetail $detail): RedirectResponse
    {
        $invoiceId = $detail->invoice_id;
        $detail->delete();

        return redirect()->route('invoices.edit', $invoiceId)
            ->with('success', 'Detail deleted successfully');
    }
}