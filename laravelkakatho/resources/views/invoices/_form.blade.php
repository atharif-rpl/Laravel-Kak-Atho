<div class="mb-4">
    <label for="invoice_number" class="block text-gray-700 text-sm font-bold mb-2">Invoice Number</label>
    <input type="text" name="invoice_number" id="invoice_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('invoice_number', $invoice->invoice_number ?? '') }}" required>
    @error('invoice_number')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="customer_name" class="block text-gray-700 text-sm font-bold mb-2">Customer Name</label>
    <input type="text" name="customer_name" id="customer_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('customer_name', $invoice->customer_name ?? '') }}" required>
    @error('customer_name')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label for="delivery_date" class="block text-gray-700 text-sm font-bold mb-2">Delivery Date</label>
    <input type="date" name="delivery_date" id="delivery_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('delivery_date', isset($invoice) ? $invoice->delivery_date->format('Y-m-d') : '') }}" required>
    @error('delivery_date')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>