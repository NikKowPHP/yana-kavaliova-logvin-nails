@extends('layouts.app')

@section('title', $certificate['title_pl'] . ' - Yana Kavaliova-Logvin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">{{ $certificate['title_pl'] }}</h2>

    @isset($certificate['description_pl'])
        <p class="text-gray-700 mb-6">{{ $certificate['description_pl'] }}</p>
    @endisset

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-xl font-semibold mb-2">Oryginalny Dokument</h3>
            @if ($certificate['original_file_type'] === 'image')
                <img src="{{ asset($certificate['original_file_path']) }}" alt="Oryginał - {{ $certificate['title_pl'] }}" class="w-full h-auto rounded shadow">
            @elseif ($certificate['original_file_type'] === 'pdf')
                <a href="{{ asset($certificate['original_file_path']) }}" target="_blank" class="text-blue-600 hover:underline">Zobacz oryginał (PDF)</a>
            @endif
        </div>

        <div>
            <h3 class="text-xl font-semibold mb-2">Dokument Przetłumaczony (PL)</h3>
            @if ($certificate['translated_file_type'] === 'image')
                <img src="{{ asset($certificate['translated_file_path']) }}" alt="Tłumaczenie PL - {{ $certificate['title_pl'] }}" class="w-full h-auto rounded shadow">
            @elseif ($certificate['translated_file_type'] === 'pdf')
                <a href="{{ asset($certificate['translated_file_path']) }}" target="_blank" class="text-blue-600 hover:underline">Zobacz tłumaczenie (PDF)</a>
            @endif
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ route('landing') }}" class="text-blue-600 hover:underline">&larr; Powrót do strony głównej</a>
    </div>
@endsection
