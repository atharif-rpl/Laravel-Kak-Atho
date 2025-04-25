@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Invoice #{{ $invoice->invoice_number }}</h1>
        <div class="flex space-x-2">
            <a href="{{ route('invoices.edit', $invoice) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit Invoice
            </a>
            <a href="{{ route('invoices.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to List
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded p-8 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-gray-700"><strong>Invoice Number:</strong> {{ $invoice->invoice_number }}</p>
                <p class="text-gray-700"><strong>Customer Name:</strong> {{ $invoice->customer_name }}</p>
            </div>
            <div>
                <p class="text-gray-700"><strong>Delivery Date:</strong> {{ $invoice->delivery_date->format('Y-m-d') }}</p>
                <p class="text-gray-700"><strong>Submit Date:</strong> {{ $invoice->submit_date->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-md rounded p-6">
        <h2 class="text-xl font-semibold mb-4">Invoice Details</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Coil Number</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Width</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Length</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thickness</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Weight</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($invoice->details as $detail)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $detail->coil_number }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $detail->width }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $detail->length }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $detail->thickness }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $detail->weight }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ number_format($detail->price, 2) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center">No details found</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="px-6 py-4 text-right font-bold">Total:</td>
                    <td class="px-6 py-4 font-bold">{{ number_format($invoice->details->sum('price'), 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection