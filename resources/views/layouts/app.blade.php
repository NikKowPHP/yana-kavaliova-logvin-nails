<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Yana Kavaliova-Logvin')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <header class="bg-white shadow p-4">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold text-gray-800">Yana Kavaliova-Logvin - Certyfikaty Manicure i Pedicure</h1>
        </div>
    </header>

    <main class="container mx-auto mt-4 p-4 bg-white shadow rounded">
        @yield('content')
    </main>

    <footer class="mt-8 p-4 text-center text-gray-600 text-sm">
        &copy; {{ date('Y') }} Yana Kavaliova-Logvin
    </footer>
</body>
</html>
