<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class InvoiceController extends Controller
{
    public function index(): View
    {
        $invoices = Invoice::with('details')->latest()->paginate(10);
        return view('invoices.index', compact('invoices'));
    }

    public function create(): View
    {
        return view('invoices.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'invoice_number' => 'required|string|max:50|unique:invoices',
            'customer_name' => 'required|string|max:100',
            'delivery_date' => 'required|date',
        ]);

        $invoice = Invoice::create($request->all());

        return redirect()->route('invoices.edit', $invoice)
            ->with('success', 'Invoice created successfully. Now add some details.');
    }

    public function show(Invoice $invoice): View
    {
        $invoice->load('details');
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice): View
    {
        $invoice->load('details');
        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice): RedirectResponse
    {
        $request->validate([
            'invoice_number' => 'required|string|max:50|unique:invoices,invoice_number,'.$invoice->id,
            'customer_name' => 'required|string|max:100',
            'delivery_date' => 'required|date',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice updated successfully');
    }

    public function destroy(Invoice $invoice): RedirectResponse
    {
        $invoice->delete();

        return redirect()->route('invoices.index')
            ->with('success', 'Invoice deleted successfully');
    }
}
