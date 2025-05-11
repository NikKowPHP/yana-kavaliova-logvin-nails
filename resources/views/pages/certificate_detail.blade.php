@extends('layouts.app')

@section('title', $certificate['title_pl'] . ' - Yana Kavaliova-Logvin')

@section('content')
    <div class="mb-10">
        <a href="{{ route('landing') }}" class="inline-flex items-center text-apple-blue hover:text-apple-blue-dark transition-colors group text-sm font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 transform transition-transform duration-200 ease-in-out group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Powrót do strony głównej
        </a>
    </div>

    <h2 class="text-3xl sm:text-4xl font-bold text-apple-gray-900 mb-4">{{ $certificate['title_pl'] }}</h2>

    @isset($certificate['description_pl'])
        <p class="text-lg text-apple-gray-600 mb-10">{{ $certificate['description_pl'] }}</p>
    @endisset

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-apple-gray-50 p-6 rounded-xl shadow-soft-sm">
            <h3 class="text-xl font-semibold text-apple-gray-800 mb-4">Oryginalny Dokument</h3>
            @if ($certificate['original_file_type'] === 'image')
                <a href="{{ asset($certificate['original_file_path']) }}" target="_blank" title="Zobacz oryginalny dokument w pełnym rozmiarze">
                    <img src="{{ asset($certificate['original_file_path']) }}" alt="Oryginał - {{ $certificate['title_pl'] }}" class="w-full h-auto rounded-lg shadow-md border border-apple-gray-200 hover:shadow-lg transition-shadow duration-300">
                </a>
            @else
                 <a href="{{ asset($certificate['original_file_path']) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-apple-blue text-white text-sm font-medium rounded-md hover:bg-apple-blue-dark transition-colors">
                    Zobacz oryginał (PDF)
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            @endif
        </div>

        <div class="bg-apple-gray-50 p-6 rounded-xl shadow-soft-sm">
            <h3 class="text-xl font-semibold text-apple-gray-800 mb-4">Tłumaczenie (PL)</h3>
            @isset($certificate['translation_pl'])
                <div class="prose prose-sm text-apple-gray-700 whitespace-pre-line max-w-none">
                    <p>{{ $certificate['translation_pl'] }}</p>
                </div>
            @else
                <p class="text-apple-gray-500 italic">Brak dostępnego tłumaczenia.</p>
            @endisset
        </div>
    </div>
@endsection