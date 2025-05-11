@extends('layouts.app')

@section('title', 'Strona Główna - Yana Kavaliova-Logvin')

@section('content')
    <div class="container mx-auto px-4 max-w-screen-lg">
        <div class="text-center mb-12">
            <h1 class="text-3xl sm:text-4xl font-bold text-apple-gray-900 mb-4">Witaj na mojej stronie!</h1>
            <p class="text-lg text-apple-gray-600 max-w-2xl mx-auto">
                Nazywam się Yana Kavaliova-Logvin. Poniżej znajdziesz moje certyfikaty potwierdzające kwalifikacje w dziedzinie manicure i pedicure.
            </p>
        </div>

        <h2 class="text-2xl font-semibold text-apple-gray-800 mb-8 text-center sm:text-left">Moje Certyfikaty</h2>

        @if(count($certificates) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach ($certificates as $certificate)
                    <a href="{{ route('certificate.show', ['id' => $certificate['id']]) }}" class="group block bg-white rounded-2xl shadow-soft-md hover:shadow-soft-lg transition-all duration-300 ease-in-out overflow-hidden">
                        <div class="aspect-w-4 aspect-h-3">
                            <img src="{{ asset($certificate['thumbnail_image_path'] ?? $certificate['original_file_path']) }}" alt="Miniatura certyfikatu: {{ $certificate['title_pl'] }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-medium text-apple-gray-800 group-hover:text-apple-blue transition-colors duration-300 truncate">{{ $certificate['title_pl'] }}</h3>
                            @isset($certificate['description_pl'])
                            <p class="text-sm text-apple-gray-500 mt-1 line-clamp-2">{{ $certificate['description_pl'] }}</p>
                            @endisset
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-apple-gray-600 text-center">Brak dostępnych certyfikatów.</p>
        @endif
    </div>
@endsection
