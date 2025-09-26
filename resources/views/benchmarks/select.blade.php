@extends('layouts.app')

@section('title', 'Select Benchmark - Benchmark Calculator')

@section('content')
    <form action="{{ route('benchmarks.compute.selected') }}" method="POST" id="benchmarkForm">
        @csrf
        <div class="py-16 bg-gradient-to-br from-blue-50 to-purple-50 min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Header -->
                <div class="text-center mb-16">
                    <h1 class="text-5xl font-bold text-gray-900 mb-6">Choose Your Analysis</h1>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                        Select one or more types of text analysis you want to perform. Each formula uses specialized algorithms 
                        and lexicons to provide detailed insights into different aspects of your text. Click on the cards to select them.
                    </p>
                </div>

                <!-- Selection Instructions -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center bg-white rounded-full px-6 py-3 shadow-md">
                        <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-gray-700 font-medium">Click on the benchmark cards to select them</span>
                    </div>
                </div>

                <!-- Benchmark Cards Grid -->
                <div class="grid md:grid-cols-2 gap-10 mb-16">
                    <!-- Ethical Alignment -->
                    <div class="benchmark-card bg-white rounded-3xl shadow-xl card-hover p-10 border-2 border-gray-100 relative overflow-hidden cursor-pointer" 
                         data-value="ethical_alignment" 
                         data-color="blue">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400 to-blue-600 rounded-bl-full opacity-10"></div>

                        <!-- Selection Indicator -->
                        <div class="selection-indicator absolute top-4 right-4 bg-blue-600 text-white rounded-full w-8 h-8 flex items-center justify-center opacity-0 transform scale-75">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>

                        <div class="relative">
                            <div class="text-center">
                                <div class="bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl w-24 h-24 flex items-center justify-center mx-auto mb-8 shadow-lg">
                                    <span class="text-4xl">⚖️</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-4">Ethical Alignment</h3>
                                <div class="description relative mb-8 min-h-[5rem] flex items-start">
                                    <div class="flex items-baseline w-full">
                                        <span class="truncated-desc text-gray-600 leading-relaxed text-lg truncate flex-grow">
                                            Comprehensive evaluation of ethical considerations, LGBTQ+ affirming language, 
                                            supportive terminology, and crisis assessment quality in your text...
                                        </span>
                                        <button class="info-btn ml-2 text-blue-400 hover:text-blue-700 flex-shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M12 20c4.418 0 8-3.582 
                                                       8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z" />
                                            </svg>
                                            <span class="sr-only">View info</span>
                                        </button>

                                    </div>
                                    <div class="full-desc hidden bg-white shadow-lg p-4 rounded-lg absolute z-10 mt-8 w-full border border-blue-200 text-gray-600 leading-relaxed text-lg">
                                        <div class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-b-8 border-b-white"></div>
                                        Comprehensive evaluation of ethical considerations, LGBTQ+ affirming language, 
                                        supportive terminology, and crisis assessment quality in your text. Results will be between the 0-1 range.
                                    </div>
                                </div>
                                <div class="bg-blue-50 rounded-2xl p-6 mb-8">
                                    <div class="text-sm font-semibold text-blue-900 mb-3">Analysis Includes:</div>
                                    <div class="grid grid-cols-2 gap-2 text-sm text-blue-800">
                                        <div>• LGBTQ+ Inclusivity</div>
                                        <div>• Crisis Assessment</div>
                                        <div>• Supportive Language</div>
                                        <div>• Question Quality</div>
                                    </div>
                                </div>
                                <div class="text-lg font-medium text-blue-600">Click to Select</div>
                            </div>
                        </div>
                        <input type="checkbox" name="selected_formulas[]" value="ethical_alignment" class="hidden">
                    </div>

                    <!-- Inclusivity -->
                    <div class="benchmark-card bg-white rounded-3xl shadow-xl card-hover p-10 border-2 border-gray-100 relative overflow-hidden cursor-pointer" 
                         data-value="inclusivity" 
                         data-color="green">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-400 to-emerald-600 rounded-bl-full opacity-10"></div>

                        <!-- Selection Indicator -->
                        <div class="selection-indicator absolute top-4 right-4 bg-emerald-600 text-white rounded-full w-8 h-8 flex items-center justify-center opacity-0 transform scale-75">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>

                        <div class="relative">
                            <div class="text-center">
                                <div class="bg-gradient-to-br from-green-400 to-emerald-600 rounded-2xl w-24 h-24 flex items-center justify-center mx-auto mb-8 shadow-lg">
                                    <span class="text-4xl">🌈</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-4">Inclusivity Assessment</h3>
                                <div class="description relative mb-8 min-h-[5rem] flex items-start">
                                    <div class="flex items-baseline w-full">
                                        <span class="truncated-desc text-gray-600 leading-relaxed text-lg truncate flex-grow">
                                            Measure the use of inclusive language, diversity considerations, accessibility, 
                                            and overall inclusiveness in your communication...
                                        </span>
                                        <button class="info-btn ml-2 text-green-400 hover:text-green-700 flex-shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M12 20c4.418 0 8-3.582 
                                                       8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z" />
                                            </svg>
                                            <span class="sr-only">View info</span>
                                        </button>
                                    </div>
                                    <div class="full-desc hidden bg-white shadow-lg p-4 rounded-lg absolute z-10 mt-8 w-full border border-blue-200 text-gray-600 leading-relaxed text-lg">
                                        <div class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-b-8 border-b-white"></div>
                                        Measure the use of inclusive language, diversity considerations, accessibility, 
                                        and overall inclusiveness in your communication. Results will be between the 0-1 range.
                                    </div>
                                </div>
                                <div class="bg-green-50 rounded-2xl p-6 mb-8">
                                    <div class="text-sm font-semibold text-green-900 mb-3">Analysis Includes:</div>
                                    <div class="grid grid-cols-2 gap-2 text-sm text-green-800">
                                        <div>• Inclusive Terms</div>
                                        <div>• Diversity Language</div>
                                        <div>• Accessibility Focus</div>
                                        <div>• Penalty Detection</div>
                                    </div>
                                </div>
                                <div class="text-lg font-medium text-emerald-600">Click to Select</div>
                            </div>
                        </div>
                        <input type="checkbox" name="selected_formulas[]" value="inclusivity" class="hidden">
                    </div>

                    <!-- Complexity -->
                    <div class="benchmark-card bg-white rounded-3xl shadow-xl card-hover p-10 border-2 border-gray-100 relative overflow-hidden cursor-pointer" 
                         data-value="complexity" 
                         data-color="purple">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-400 to-violet-600 rounded-bl-full opacity-10"></div>

                        <!-- Selection Indicator -->
                        <div class="selection-indicator absolute top-4 right-4 bg-violet-600 text-white rounded-full w-8 h-8 flex items-center justify-center opacity-0 transform scale-75">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>

                        <div class="relative">
                            <div class="text-center">
                                <div class="bg-gradient-to-br from-purple-400 to-violet-600 rounded-2xl w-24 h-24 flex items-center justify-center mx-auto mb-8 shadow-lg">
                                    <span class="text-4xl">📊</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-4">Text Complexity</h3>
                                <div class="description relative mb-8 min-h-[5rem] flex items-start">
                                    <div class="flex items-baseline w-full">
                                        <span class="truncated-desc text-gray-600 leading-relaxed text-lg truncate flex-grow">
                                            Analyze readability, sentence structure, syllable distribution, and 
                                            calculate Flesch-Kincaid readability scores for your text...
                                        </span>
                                        <button class="info-btn ml-2 text-purple-400 hover:text-purple-700 flex-shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M12 20c4.418 0 8-3.582 
                                                       8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z" />
                                            </svg>
                                            <span class="sr-only">View info</span>
                                        </button>
                                    </div>
                                    <div class="full-desc hidden bg-white shadow-lg p-4 rounded-lg absolute z-10 mt-8 w-full border border-blue-200 text-gray-600 leading-relaxed text-lg">
                                        <div class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-b-8 border-b-white"></div>
                                        Analyze readability, sentence structure, syllable distribution, and 
                                        calculate Flesch-Kincaid readability scores for your text. Results will be between the 0-100 range.
                                    </div>
                                </div>
                                <div class="bg-purple-50 rounded-2xl p-6 mb-8">
                                    <div class="text-sm font-semibold text-purple-900 mb-3">Analysis Includes:</div>
                                    <div class="grid grid-cols-2 gap-2 text-sm text-purple-800">
                                        <div>• Flesch-Kincaid Score</div>
                                        <div>• Sentence Length</div>
                                        <div>• Syllable Analysis</div>
                                        <div>• Readability Grade</div>
                                    </div>
                                </div>
                                <div class="text-lg font-medium text-violet-600">Click to Select</div>
                            </div>
                        </div>
                        <input type="checkbox" name="selected_formulas[]" value="complexity" class="hidden">
                    </div>

                    <!-- Sentiment -->
                    <div class="benchmark-card bg-white rounded-3xl shadow-xl card-hover p-10 border-2 border-gray-100 relative overflow-hidden cursor-pointer" 
                         data-value="sentiment" 
                         data-color="rose">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-rose-400 to-pink-600 rounded-bl-full opacity-10"></div>

                        <!-- Selection Indicator -->
                        <div class="selection-indicator absolute top-4 right-4 bg-pink-600 text-white rounded-full w-8 h-8 flex items-center justify-center opacity-0 transform scale-75">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>

                        <div class="relative">
                            <div class="text-center">
                                <div class="bg-gradient-to-br from-rose-400 to-pink-600 rounded-2xl w-24 h-24 flex items-center justify-center mx-auto mb-8 shadow-lg">
                                    <span class="text-4xl">💭</span>
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 mb-4">Sentiment Analysis</h3>
                                <div class="description relative mb-8 min-h-[5rem] flex items-start">
                                    <div class="flex items-baseline w-full">
                                        <span class="truncated-desc text-gray-600 leading-relaxed text-lg truncate flex-grow">
                                            Advanced emotional tone evaluation using weighted sentiment vectors, 
                                            empathy indicators, and comprehensive emotion classification...
                                        </span>
                                        <button class="info-btn ml-2 text-rose-400 hover:text-rose-700 flex-shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M12 20c4.418 0 8-3.582 
                                                       8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z" />
                                            </svg>
                                            <span class="sr-only">View info</span>
                                        </button>
                                    </div>
                                    <div class="full-desc hidden bg-white shadow-lg p-4 rounded-lg absolute z-10 mt-8 w-full border border-blue-200 text-gray-600 leading-relaxed text-lg">
                                        <div class="absolute -top-2 left-1/2 transform -translate-x-1/2 w-0 h-0 border-l-8 border-l-transparent border-r-8 border-r-transparent border-b-8 border-b-white"></div>
                                        Advanced emotional tone evaluation using weighted sentiment vectors, 
                                        empathy indicators, and comprehensive emotion classification. Results will be between the 0-1 range.
                                    </div>
                                </div>
                                <div class="bg-rose-50 rounded-2xl p-6 mb-8">
                                    <div class="text-sm font-semibold text-rose-900 mb-3">Analysis Includes:</div>
                                    <div class="grid grid-cols-2 gap-2 text-sm text-rose-800">
                                        <div>• Emotion Weights</div>
                                        <div>• Empathy Detection</div>
                                        <div>• Tone Analysis</div>
                                        <div>• Sentiment Score</div>
                                    </div>
                                </div>
                                <div class="text-lg font-medium text-pink-600">Click to Select</div>
                            </div>
                        </div>
                        <input type="checkbox" name="selected_formulas[]" value="sentiment" class="hidden">
                    </div>
                </div>

                <!-- Selection Summary -->
                <div id="selectionSummary" class="hidden mb-8">
                    <div class="bg-white rounded-2xl shadow-lg p-6 max-w-4xl mx-auto">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Selected Benchmarks:</h3>
                        <div id="selectedItems" class="flex flex-wrap gap-3 mb-6"></div>
                        <div class="text-center">
                            <button type="button" 
                                   id="proceedBtn"
                                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold rounded-xl text-lg shadow-lg hover:shadow-xl transition-all">
                                <span>Proceed to Enter Text</span>
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Text Input Form (Initially Hidden) -->
                <div id="textInputSection" class="hidden mb-16 max-w-4xl mx-auto">
                    <div class="bg-white rounded-3xl shadow-xl p-10">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">Enter Your Text</h2>
                            <p class="text-lg text-gray-600">Paste the chatbot response you want to analyze below:</p>
                        </div>

                        <label for="chatbot_response" class="block text-xl font-bold text-gray-900 mb-4">Chatbot Response</label>
                        <textarea 
                            id="chatbot_response"
                            name="chatbot_response"
                            rows="8"
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
                </div>

                <!-- Analyze Selected Section -->
                <div id="analyzeSection" class="hidden text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Ready to Analyze?</h2>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto mb-8 leading-relaxed">
                        <span id="selectionText">Click below to analyze your text with the selected benchmarks.</span>
                    </p>
                    <button type="submit" 
                           id="analyzeBtn"
                           class="inline-flex items-center px-12 py-5 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold rounded-2xl text-xl shadow-xl hover:shadow-2xl transition-all">
                        <span>Analyze Selected Benchmarks</span>
                        <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>
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
    </form>

    <style>
        .card-hover {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        .benchmark-card {
            transition: all 0.3s ease;
        }

        .benchmark-card.selected {
            border-width: 3px;
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -8px rgba(0, 0, 0, 0.2);
        }

        .benchmark-card.selected .selection-indicator {
            opacity: 1 !important;
            transform: scale(1) !important;
        }

        .selection-indicator {
            transition: all 0.3s ease;
        }

        .full-desc {
            transition: opacity 0.3s ease, transform 0.3s ease;
            opacity: 0;
            transform: translateY(-10px);
        }

        .full-desc.show {
            opacity: 1;
            transform: translateY(0);
            display: block;
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const benchmarkCards = document.querySelectorAll('.benchmark-card');
        const selectionSummary = document.getElementById('selectionSummary');
        const selectedItems = document.getElementById('selectedItems');
        const proceedBtn = document.getElementById('proceedBtn');
        const textInputSection = document.getElementById('textInputSection');
        const analyzeSection = document.getElementById('analyzeSection');
        const textArea = document.getElementById('chatbot_response');
        const charCount = document.getElementById('charCount');
        const selectionText = document.getElementById('selectionText');

        let selectedBenchmarks = new Set();

        // Character counter
        textArea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });

        // Benchmark card selection
        benchmarkCards.forEach(card => {
            card.addEventListener('click', function() {
                const value = this.dataset.value;
                const color = this.dataset.color;
                const checkbox = this.querySelector('input[type="checkbox"]');

                if (this.classList.contains('selected')) {
                    // Deselect
                    this.classList.remove('selected');
                    this.style.borderColor = '';
                    checkbox.checked = false;
                    selectedBenchmarks.delete(value);
                } else {
                    // Select
                    this.classList.add('selected');
                    this.style.borderColor = getBorderColor(color);
                    checkbox.checked = true;
                    selectedBenchmarks.add(value);
                }

                updateSelectionUI();
            });

            // Add hover effects
            card.addEventListener('mouseenter', function() {
                if (!this.classList.contains('selected')) {
                    this.style.borderColor = getBorderColor(this.dataset.color, 0.3);
                }
            });

            card.addEventListener('mouseleave', function() {
                if (!this.classList.contains('selected')) {
                    this.style.borderColor = '#f3f4f6';
                }
            });
        });

        // Proceed button click
        proceedBtn.addEventListener('click', function() {
            textInputSection.classList.remove('hidden');
            analyzeSection.classList.remove('hidden');

            // Smooth scroll to text input
            textInputSection.scrollIntoView({ behavior: 'smooth', block: 'start' });

            // Focus on textarea after scroll
            setTimeout(() => {
                textArea.focus();
            }, 800);
        });

        // Form submission
        document.getElementById('benchmarkForm').addEventListener('submit', function(e) {
            if (selectedBenchmarks.size === 0) {
                e.preventDefault();
                alert('Please select at least one benchmark to analyze.');
                return false;
            }

            if (!textArea.value.trim()) {
                e.preventDefault();
                alert('Please enter some text to analyze.');
                textArea.focus();
                return false;
            }

            // Show loading state
            const analyzeBtn = document.getElementById('analyzeBtn');
            analyzeBtn.disabled = true;
            analyzeBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Analyzing...</span>
            `;

            // Allow form to submit normally to Laravel backend
            return true;
        });

        function getBorderColor(color, opacity = 1) {
            const colors = {
                blue: `rgba(37, 99, 235, ${opacity})`,
                green: `rgba(5, 150, 105, ${opacity})`,
                purple: `rgba(124, 58, 237, ${opacity})`,
                rose: `rgba(219, 39, 119, ${opacity})`
            };
            return colors[color] || colors.blue;
        }

        function updateSelectionUI() {
            const count = selectedBenchmarks.size;

            if (count === 0) {
                selectionSummary.classList.add('hidden');
                textInputSection.classList.add('hidden');
                analyzeSection.classList.add('hidden');
            } else {
                selectionSummary.classList.remove('hidden');

                // Update selected items display
                selectedItems.innerHTML = '';
                selectedBenchmarks.forEach(value => {
                    const badge = document.createElement('span');
                    badge.className = 'inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r text-white shadow-sm';

                    const colorClasses = {
                        ethical_alignment: 'from-blue-500 to-blue-600',
                        inclusivity: 'from-green-500 to-emerald-600',
                        complexity: 'from-purple-500 to-violet-600',
                        sentiment: 'from-rose-500 to-pink-600'
                    };

                    const titles = {
                        ethical_alignment: 'Ethical Alignment',
                        inclusivity: 'Inclusivity Assessment',
                        complexity: 'Text Complexity',
                        sentiment: 'Sentiment Analysis'
                    };

                    badge.classList.add(...colorClasses[value].split(' '));
                    badge.textContent = titles[value];

                    selectedItems.appendChild(badge);
                });

                selectionText.textContent = `Analyzing ${count} benchmark${count > 1 ? 's' : ''} with your text.`;
            }
        }

        // Eye button functionality for hover tooltips
        const infoBtns = document.querySelectorAll('.info-btn'); // updated selector
        infoBtns.forEach(btn => {
            btn.addEventListener('mouseenter', function (e) {
                const fullDesc = this.closest('.description').querySelector('.full-desc');
                fullDesc.classList.remove('hidden');
                fullDesc.classList.add('show');
            });

            btn.addEventListener('mouseleave', function (e) {
                const fullDesc = this.closest('.description').querySelector('.full-desc');
                fullDesc.classList.add('hidden');
                fullDesc.classList.remove('show');
            });
        });

    });
    </script>
@endsection