@extends('layouts.app')

@section('title', 'Strona Główna - Yana Kavaliova-Logvin')

@section('content')
    <h2 class="text-xl font-semibold mb-4">O Yanie Kavaliova-Logvin</h2>
    <p class="mb-8">Tutaj będzie krótki opis o Yanie Kavaliova-Logvin i jej doświadczeniu w manicure i pedicure.</p>

    <h2 class="text-xl font-semibold mb-4">Certyfikaty</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($certificates as $certificate)
            <div class="bg-gray-100 p-3 rounded shadow">
                <a href="{{ route('certificate.show', ['id' => $certificate['id']]) }}">
                    <img src="{{ asset($certificate['original_file_path']) }}" alt="{{ $certificate['title_pl'] }}" class="w-full h-36 object-cover rounded mb-2">
                    <h3 class="text-base font-semibold text-gray-800">{{ $certificate['title_pl'] }}</h3>
                </a>
            </div>
        @endforeach
    </div>
@endsection
