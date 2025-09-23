@extends('layouts.app')

<title>
    @isset($formulaData['name'])
      {{ $formulaData['name'] }} Results - Benchmark Calculator
    @else
      Benchmark Calculator
    @endisset
  </title>

@section('content')
<div class="py-16 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full shadow-xl mb-6">
                <span class="text-4xl">{{ $formulaData['icon'] }}</span>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $formulaData['name'] }} Results</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Detailed analysis of your provided text based on the selected formula.
            </p>
        </div>

        <!-- Results Card -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100 mb-12">
            @if ($success)
                <!-- Input Text Summary -->
                <div class="mb-12">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Analyzed Text</h2>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $chatbotResponse }}</p>
                    </div>
                </div>

                <!-- Results Display -->
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Analysis Results</h2>
                    <div class="grid gap-6">
                        @foreach ($results as $key => $value)
                            <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-6 rounded-2xl">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="text-lg font-semibold text-gray-900 capitalize">{{ str_replace('_', ' ', $key) }}</h3>
                                    @if (is_numeric($value))
                                        <span class="text-xl font-bold text-purple-600">{{ number_format($value, 2) }}</span>
                                    @else
                                        <span class="text-xl font-bold text-purple-600">{{ $value }}</span>
                                    @endif
                                </div>
                                @if (is_numeric($value))
                                    <div class="h-3 bg-gray-200 rounded-full overflow-hidden">
                                        @php
                                        $max = $formulaData['max'] ?? 1;
                                        $percentage = ($value / $max) * 100;
                                        $percentage = max(0, min($percentage, 100)); // clamp between 0–100
                                    @endphp
                                    
                                        <div class="h-full progress-bar" style="width: {{ $percentage }}%"></div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <!-- Error Display -->
                <div class="bg-red-50 p-8 rounded-2xl border border-red-200 text-center">
                    <div class="text-4xl mb-4">❌</div>
                    <h2 class="text-2xl font-semibold text-red-900 mb-4">Error Computing Results</h2>
                    <p class="text-red-700">{{ $error }}</p>
                </div>
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="{{ route('benchmark.form', $formula) }}" 
               class="inline-flex items-center px-10 py-4 bg-white text-purple-600 font-bold rounded-2xl shadow-md hover:shadow-lg transition-all justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Analyze Again
            </a>
            <a href="{{ route('benchmarks.select') }}" 
               class="inline-flex items-center px-10 py-4 btn-primary text-white font-bold rounded-2xl shadow-md hover:shadow-lg transition-all justify-center">
                <span>Choose Another Benchmark</span>
            </a>
        </div>
    </div>
</div>
@endsection