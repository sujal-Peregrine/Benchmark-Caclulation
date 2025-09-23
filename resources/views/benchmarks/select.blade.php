@extends('layouts.app')

@section('title', 'Select Benchmark - Benchmark Calculator')

@section('content')
<div class="py-16 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold text-gray-900 mb-6">Choose Your Analysis</h1>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Select the type of text analysis you want to perform. Each formula uses specialized algorithms 
                and lexicons to provide detailed insights into different aspects of your text.
            </p>
        </div>

        <!-- Benchmark Cards Grid -->
        <div class="grid md:grid-cols-2 gap-10 mb-16">
            <!-- Ethical Alignment -->
            <div class="bg-white rounded-3xl shadow-xl card-hover p-10 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-blue-600 rounded-bl-full opacity-10"></div>
                <div class="relative">
                    <div class="text-center">
                        <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl w-24 h-24 flex items-center justify-center mx-auto mb-8 shadow-lg">
                            <span class="text-4xl">⚖️</span>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Ethical Alignment</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                            Comprehensive evaluation of ethical considerations, LGBTQ+ affirming language, 
                            supportive terminology, and crisis assessment quality in your text.
                        </p>
                        <div class="bg-blue-50 rounded-2xl p-6 mb-8">
                            <div class="text-sm font-semibold text-blue-900 mb-3">Analysis Includes:</div>
                            <div class="grid grid-cols-2 gap-2 text-sm text-blue-800">
                                <div>• LGBTQ+ Inclusivity</div>
                                <div>• Crisis Assessment</div>
                                <div>• Supportive Language</div>
                                <div>• Question Quality</div>
                            </div>
                        </div>
                        <a href="{{ route('benchmark.form', 'ethical_alignment') }}" 
                           class="inline-flex items-center px-10 py-4 btn-primary text-white font-bold rounded-2xl text-lg w-full justify-center shadow-lg">
                            <span>Analyze Ethics</span>
                            <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Inclusivity -->
            <div class="bg-white rounded-3xl shadow-xl card-hover p-10 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-400 to-emerald-600 rounded-bl-full opacity-10"></div>
                <div class="relative">
                    <div class="text-center">
                        <div class="bg-gradient-to-br from-green-400 to-emerald-600 rounded-2xl w-24 h-24 flex items-center justify-center mx-auto mb-8 shadow-lg">
                            <span class="text-4xl">🌈</span>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Inclusivity Assessment</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                            Measure the use of inclusive language, diversity considerations, accessibility, 
                            and overall inclusiveness in your communication.
                        </p>
                        <div class="bg-green-50 rounded-2xl p-6 mb-8">
                            <div class="text-sm font-semibold text-green-900 mb-3">Analysis Includes:</div>
                            <div class="grid grid-cols-2 gap-2 text-sm text-green-800">
                                <div>• Inclusive Terms</div>
                                <div>• Diversity Language</div>
                                <div>• Accessibility Focus</div>
                                <div>• Penalty Detection</div>
                            </div>
                        </div>
                        <a href="{{ route('benchmark.form', 'inclusivity') }}" 
                           class="inline-flex items-center px-10 py-4 btn-primary text-white font-bold rounded-2xl text-lg w-full justify-center shadow-lg">
                            <span>Analyze Inclusivity</span>
                            <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Complexity -->
            <div class="bg-white rounded-3xl shadow-xl card-hover p-10 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-400 to-violet-600 rounded-bl-full opacity-10"></div>
                <div class="relative">
                    <div class="text-center">
                        <div class="bg-gradient-to-br from-purple-400 to-violet-600 rounded-2xl w-24 h-24 flex items-center justify-center mx-auto mb-8 shadow-lg">
                            <span class="text-4xl">📊</span>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Text Complexity</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                            Analyze readability, sentence structure, syllable distribution, and 
                            calculate Flesch-Kincaid readability scores for your text.
                        </p>
                        <div class="bg-purple-50 rounded-2xl p-6 mb-8">
                            <div class="text-sm font-semibold text-purple-900 mb-3">Analysis Includes:</div>
                            <div class="grid grid-cols-2 gap-2 text-sm text-purple-800">
                                <div>• Flesch-Kincaid Score</div>
                                <div>• Sentence Length</div>
                                <div>• Syllable Analysis</div>
                                <div>• Readability Grade</div>
                            </div>
                        </div>
                        <a href="{{ route('benchmark.form', 'complexity') }}" 
                           class="inline-flex items-center px-10 py-4 btn-primary text-white font-bold rounded-2xl text-lg w-full justify-center shadow-lg">
                            <span>Analyze Complexity</span>
                            <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sentiment -->
            <div class="bg-white rounded-3xl shadow-xl card-hover p-10 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-rose-400 to-pink-600 rounded-bl-full opacity-10"></div>
                <div class="relative">
                    <div class="text-center">
                        <div class="bg-gradient-to-br from-rose-400 to-pink-600 rounded-2xl w-24 h-24 flex items-center justify-center mx-auto mb-8 shadow-lg">
                            <span class="text-4xl">💭</span>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-4">Sentiment Analysis</h3>
                        <p class="text-gray-600 mb-8 leading-relaxed text-lg">
                            Advanced emotional tone evaluation using weighted sentiment vectors, 
                            empathy indicators, and comprehensive emotion classification.
                        </p>
                        <div class="bg-rose-50 rounded-2xl p-6 mb-8">
                            <div class="text-sm font-semibold text-rose-900 mb-3">Analysis Includes:</div>
                            <div class="grid grid-cols-2 gap-2 text-sm text-rose-800">
                                <div>• Emotion Weights</div>
                                <div>• Empathy Detection</div>
                                <div>• Tone Analysis</div>
                                <div>• Sentiment Score</div>
                            </div>
                        </div>
                        <a href="{{ route('benchmark.form', 'sentiment') }}" 
                           class="inline-flex items-center px-10 py-4 btn-primary text-white font-bold rounded-2xl text-lg w-full justify-center shadow-lg">
                            <span>Analyze Sentiment</span>
                            <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center">
            <a href="{{ route('welcome') }}" 
               class="inline-flex items-center px-8 py-4 text-gray-600 hover:text-gray-900 font-medium rounded-full bg-white shadow-md hover:shadow-lg transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Home
            </a>
        </div>
    </div>
</div>
@endsection