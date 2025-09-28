@extends('layouts.app')

@section('title', 'Selected Benchmarks Results - Benchmark Calculator')

@section('content')
<div class="py-16 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full shadow-xl mb-6">
                <span class="text-4xl">📊</span>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Benchmarks Results</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Comprehensive analysis of your provided text across selected formulas.
            </p>
        </div>

        <!-- Input Text Summary -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100 mb-12">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Analyzed Text</h2>
            <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $chatbotResponse }}</p>
            </div>
        </div>

        <!-- Results Display -->
        @if ($success)
            <div class="grid md:grid-cols-2 gap-10">
                @foreach ($selected as $formula)
                    @php
                        $formulaData = $formulas[$formula];
                        $primaryMetric = $formula;
                        $primaryValue = $results[$primaryMetric] ?? 0;
                        $max = $formulaData['max'] ?? 1;
                        $percentage = ($primaryValue / $max) * 100;
                        $percentage = max(0, min($percentage, 100));
                    @endphp

                    <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100">
                        <div class="text-center mb-6">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full shadow-md mb-4">
                                <span class="text-3xl">{{ $formulaData['icon'] }}</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">{{ $formulaData['name'] }}</h3>
                        </div>

                        <!-- Only show this formula's metric -->
                        <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-4 rounded-xl">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="text-md font-semibold text-gray-900 capitalize">{{ $primaryMetric }}</h4>
                                <span class="text-lg font-bold text-purple-600">{{ number_format($primaryValue, 2) }}</span>
                            </div>
                            <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full progress-bar" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Error Display -->
            <div class="bg-red-50 p-8 rounded-2xl border border-red-200 text-center">
                <div class="text-4xl mb-4">❌</div>
                <h2 class="text-2xl font-semibold text-red-900 mb-4">Error Computing Results</h2>
                <p class="text-red-700">Some errors occurred during computation. Please try again or check the input.</p>
                @if (!empty($errors))
                    <ul class="mt-4 text-red-700">
                        @foreach ($errors as $key => $error)
                            <li>{{ $key }}: {{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="flex flex-col md:flex-row justify-center gap-4 mt-12">
            <a href="{{ route('benchmarks.select') }}" 
               class="inline-flex items-center px-10 py-4 bg-white text-purple-600 font-bold rounded-2xl shadow-md hover:shadow-lg transition-all justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Analyze Again
            </a>
            @if ($success)
            @if(count($selected) === 1)
                <a href="{{ route('benchmark.download', $selected[0]) }}" 
                   class="inline-flex items-center px-10 py-4 bg-green-600 text-white font-bold rounded-2xl shadow-md hover:shadow-lg transition-all justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download PDF
                </a>
            @else
                <a href="{{ route('benchmarks.multi.download') }}" 
                   class="inline-flex items-center px-10 py-4 bg-green-600 text-white font-bold rounded-2xl shadow-md hover:shadow-lg transition-all justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Download PDF
                </a>
            @endif
        @endif
        </div>
    </div>
</div>
@endsection