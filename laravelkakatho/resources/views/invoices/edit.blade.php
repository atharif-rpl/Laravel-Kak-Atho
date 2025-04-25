@extends('/layouts/app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Invoice #{{ $invoice->invoice_number }}</h1>
        <div class="flex space-x-2">
            <a href="{{ route('invoices.show', $invoice) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                View Details
            </a>
            <a href="{{ route('invoices.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to List
            </a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex flex-col lg:flex-row gap-6">
        <div class="bg-white shadow-md rounded p-8 mb-4 lg:w-1/2">
            <h2 class="text-xl font-semibold mb-4">Invoice Information</h2>
            <form action="{{ route('invoices.update', $invoice) }}" method="POST">
                @csrf
                @method('PUT')
                @include('invoices._form')
                
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Update Invoice
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white shadow-md rounded p-8 mb-4 lg:w-1/2">
            <h2 class="text-xl font-semibold mb-4">Add Invoice Detail</h2>
            <form action="{{ route('invoice.details.store', $invoice) }}" method="POST">
                @csrf
                @include('invoice-details._form')
                
                <div class="mt-4">
                    <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                        Add Detail
                    </button>
                </div>
            </form>
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
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
                    <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                        <button type="button" 
                                onclick="editDetail({{ $detail->id }}, '{{ $detail->coil_number }}', {{ $detail->width }}, {{ $detail->length }}, {{ $detail->thickness }}, {{ $detail->weight }}, {{ $detail->price }})"
                                class="text-indigo-600 hover:text-indigo-900">
                            Edit
                        </button>
                        <form action="{{ route('invoice.details.destroy', $detail) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center">No details found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal for editing details -->
<div id="editDetailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Detail</h3>
            <form id="editDetailForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mt-2 px-7 py-3">
                    @include('invoice-details._form', ['isEdit' => true])
                </div>
                <div class="items-center px-4 py-3">
                    <button id="closeModal" type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-sm hover:bg-gray-700">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-700">
                        Update Detail
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function editDetail(id, coilNumber, width, length, thickness, weight, price) {
        // Set form action
        document.getElementById('editDetailForm').action = `/invoice-details/${id}`;
        
        // Set form values
        document.getElementById('editCoilNumber').value = coilNumber;
        document.getElementById('editWidth').value = width;
        document.getElementById('editLength').value = length;
        document.getElementById('editThickness').value = thickness;
        document.getElementById('editWeight').value = weight;
        document.getElementById('editPrice').value = price;
        
        // Show modal
        document.getElementById('editDetailModal').classList.remove('hidden');
    }
    
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('editDetailModal').classList.add('hidden');
    });
</script>
@endsection