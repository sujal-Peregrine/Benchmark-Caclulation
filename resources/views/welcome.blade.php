@extends('layouts.app')

@section('title', 'Welcome - Benchmark Calculator')

@section('content')
<div class="relative min-h-screen flex items-center justify-center">
    <!-- Background with Gradient -->
    <div class="absolute inset-0 z-0">
        <div class="gradient-bg h-full w-full opacity-90"></div>
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
    </div>
    
    <!-- Content -->
    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
        <!-- Logo Section -->
        <div class="mb-12">
            <div class="inline-flex items-center justify-center w-32 h-32 bg-white rounded-full shadow-2xl mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-20 w-auto object-contain">
            </div>
                     
            <h1 class="text-2xl sm:text-4xl md:text-5xl font-bold mb-4 sm:mb-6 leading-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-red-500 via-yellow-400 via-green-400 via-blue-500 to-purple-600">
                    gAyi
                </span> 
                <span class="text-white">BENCHMARK TOOL</span>
            </h1>
            
            <p class="text-xl md:text-2xl text-white opacity-90 mb-4">
                Advanced Text Analysis & Benchmark Calculator
            </p>
            <p class="text-lg text-white opacity-80 max-w-3xl mx-auto leading-relaxed">
                Evaluate ethical alignment, inclusivity, complexity, and sentiment in your text using cutting-edge NLP algorithms
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-white">
                <div class="text-3xl mb-3">⚖️</div>
                <h3 class="text-lg font-semibold mb-2">Ethical Analysis</h3>
                <p class="text-sm opacity-90">LGBTQ+ inclusivity and ethical alignment assessment</p>
            </div>
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-white">
                <div class="text-3xl mb-3">🌈</div>
                <h3 class="text-lg font-semibold mb-2">Inclusivity Metrics</h3>
                <p class="text-sm opacity-90">Comprehensive diversity and inclusion evaluation</p>
            </div>
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-white">
                <div class="text-3xl mb-3">📊</div>
                <h3 class="text-lg font-semibold mb-2">Text Complexity</h3>
                <p class="text-sm opacity-90">Readability and complexity analysis</p>
            </div>
            <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-6 text-white">
                <div class="text-3xl mb-3">💭</div>
                <h3 class="text-lg font-semibold mb-2">Sentiment Analysis</h3>
                <p class="text-sm opacity-90">Advanced emotional tone evaluation</p>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="mb-8">
            <a href="{{ route('benchmarks.select') }}" 
               class="inline-flex items-center px-12 py-5 text-xl font-bold text-purple-800 bg-white rounded-full hover:bg-gray-50 transform hover:scale-105 transition-all duration-300 shadow-xl hover:shadow-2xl">
                <span class="mr-4">Get Started</span>
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
            <div class="animate-bounce text-white opacity-60">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
{{-- <div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">Why Choose BenchmarkPro?</h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Our platform provides comprehensive text analysis using state-of-the-art natural language processing algorithms, 
                delivering insights that matter for ethical AI and inclusive communication.
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center group">
                <div class="bg-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-200 transition-colors">
                    <span class="text-3xl">🔬</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Scientific Accuracy</h3>
                <p class="text-gray-600 leading-relaxed">NLTK-powered analysis with validated algorithms and comprehensive lexicons</p>
            </div>
            <div class="text-center group">
                <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6 group-hover:bg-green-200 transition-colors">
                    <span class="text-3xl">⚡</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Real-time Results</h3>
                <p class="text-gray-600 leading-relaxed">Lightning-fast processing with immediate feedback and detailed metrics</p>
            </div>
            <div class="text-center group">
                <div class="bg-purple-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-200 transition-colors">
                    <span class="text-3xl">🎯</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Specialized Focus</h3>
                <p class="text-gray-600 leading-relaxed">Tailored for ethical AI, social work, and inclusive communication analysis</p>
            </div>
            <div class="text-center group">
                <div class="bg-orange-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6 group-hover:bg-orange-200 transition-colors">
                    <span class="text-3xl">📈</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Comprehensive Reports</h3>
                <p class="text-gray-600 leading-relaxed">Detailed scoring with actionable insights and improvement recommendations</p>
            </div>
        </div>
    </div>
</div> --}}
@endsection