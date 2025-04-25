<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice System</title>
    <!-- Make sure one of these is working: -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- OR (for Laravel Mix): -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-sm p-4 mb-5">
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-gray-800">
                    Invoice System
                </a>
                <div>
                    <a href="{{ route('invoices.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create New Invoice
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-4">
        @yield('content')
    </main>

    <footer class="bg-white p-4 mt-8">
        <div class="container mx-auto text-center text-gray-600">
            &copy; {{ date('Y') }} Invoice System
        </div>
    </footer>
</body>
</html>