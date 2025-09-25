@extends('layouts.app')

@section('title', 'All Benchmarks - Benchmark Calculator')

@section('content')
<div class="py-16 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full shadow-xl mb-6">
                <span class="text-4xl">📊</span>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">All Benchmarks</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Enter your text to analyze using all available formulas at once.
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100">
            <form id="benchmarkForm" action="{{ route('benchmarks.all.compute') }}" method="POST">
                @csrf
                <div class="mb-8">
                    <label for="chatbot_response" class="block text-lg font-semibold text-gray-900 mb-4">
                        Enter Chatbot Response
                    </label>
                    <textarea 
                        id="chatbot_response"
                        name="chatbot_response"
                        rows="10"
                        class="w-full px-6 py-4 text-gray-900 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all resize-vertical"
                        placeholder="Paste your chatbot response here... (up to 10,000 characters)"
                        maxlength="10000"
                        required
                    ></textarea>
                    <div class="flex justify-between mt-3 text-sm text-gray-500">
                        <span>Provide the text you want to analyze</span>
                        <span>Characters: <span id="charCount">0</span>/10000</span>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button 
                        id="computeBtn"
                        type="submit" 
                        class="inline-flex items-center px-12 py-4 btn-primary text-white font-bold rounded-2xl text-lg shadow-lg hover:shadow-xl transition-all">
                        <span>Compute All Results</span>
                        <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Back Button -->
        <div class="text-center mt-8">
            <a href="{{ route('benchmarks.select') }}" 
               class="inline-flex items-center px-8 py-4 text-gray-600 hover:text-gray-900 font-medium rounded-full bg-white shadow-md hover:shadow-lg transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Selection
            </a>
        </div>
    </div>
</div>
@endsection