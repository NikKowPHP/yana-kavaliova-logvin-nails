<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Yana Kavaliova-Logvin')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-apple-gray-100 text-apple-gray-800 min-h-screen flex flex-col">
    <header class="bg-white/90 backdrop-blur-md shadow-soft-sm sticky top-0 z-50 w-full">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('landing') }}" class="text-xl font-semibold text-apple-gray-900 hover:text-apple-blue transition-colors">
                        Yana Kavaliova-Logvin
                    </a>
                </div>
                <nav class="hidden md:flex space-x-4">
                    {{-- <a href="#" class="text-apple-gray-600 hover:text-apple-blue px-3 py-2 rounded-md text-sm font-medium">O mnie</a> --}}
                    <a href="{{ route('landing') }}" class="text-apple-gray-600 hover:text-apple-blue px-3 py-2 rounded-md text-sm font-medium">Certyfikaty</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="flex-grow container mx-auto mt-8 mb-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-soft-lg rounded-2xl p-6 sm:p-10">
            @yield('content')
        </div>
    </main>

    <footer class="py-8 text-center">
        <p class="text-xs text-apple-gray-500">
            © {{ date('Y') }} Yana Kavaliova-Logvin. Wszelkie prawa zastrzeżone.
        </p>
    </footer>
</body>
</html>