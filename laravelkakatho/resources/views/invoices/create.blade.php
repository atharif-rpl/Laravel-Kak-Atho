@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Create New Invoice</h1>
        <a href="{{ route('invoices.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to List
        </a>
    </div>

    <div class="bg-white shadow-md rounded p-8 mb-4">
        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf
            @include('invoices._form')
            
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create Invoice
                </button>
            </div>
        </form>
    </div>
</div>
@endsection