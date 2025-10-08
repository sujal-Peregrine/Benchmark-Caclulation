<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Benchmark Calculator')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon1.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
        }
        .progress-bar {
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 md:py-2">
            <!-- Main Header Row -->
            <div class="flex items-center justify-between md:space-x-8">
    
                <!-- Left side: Logos and Title -->
                <div class="flex items-center space-x-3 sm:space-x-4 md:space-x-6">
                    <!-- Footer Logo (always visible) -->
                    <div class="flex items-center flex-shrink-0">
                        <a href="{{ route('welcome') }}" class="block h-16 w-16 sm:h-20 sm:w-20 md:h-20 md:w-20">
                            <img src="{{ asset('images/footer.png') }}" alt="Right Logo" class="h-full w-full object-contain">
                        </a>
                    </div>
    
                    <!-- Main Logo + Title -->
                    <div class="flex items-center">
                        <a href="{{ route('welcome') }}" class="flex items-center">
                            <img src="{{ asset('images/logo.png') }}" alt="BenchmarkPro Logo" class="h-8 sm:h-10 md:h-12 w-auto mr-2 sm:mr-3">
                            <span class="text-sm sm:text-base md:text-xl lg:text-2xl xl:text-3xl font-bold gradient-bg bg-clip-text text-transparent text-center md:text-left leading-tight">
                                GAYL BENCHMARK TOOL
                            </span>
                        </a>
                    </div>
                </div>
    
                <!-- Right side: Contact info (desktop) and Burger button (mobile) -->
                <div class="flex items-center">
                    <!-- Contact info - visible on md+ screens -->
                    <div class="hidden md:block text-right text-sm lg:text-base xl:text-lg flex-shrink-0">
                        <div class="text-gray-600">
                            For inquiries, please contact Sam Abdella:
                        </div>
                        <a href="mailto:sn3136@columbia.edu" class="text-blue-600 hover:text-blue-800 hover:underline transition-colors duration-200 font-medium">
                            sn3136@columbia.edu
                        </a>
                    </div>
    
                    <!-- Burger Menu Button - visible on mobile only -->
                    <button id="mobileMenuBtn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
    
            </div>
    
            <!-- Mobile Menu Dropdown -->
            <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4 border-t pt-4">
                <div class="text-center text-sm">
                    <div class="text-gray-600 mb-2">
                        For inquiries, please contact Sam Abdella:
                    </div>
                    <a href="mailto:sn3136@columbia.edu" class="text-blue-600 hover:text-blue-800 hover:underline transition-colors duration-200 font-medium">
                        sn3136@columbia.edu
                    </a>
                </div>
    
            </div>
        </div>
    </header>
    
    
    
     {{-- <nav class="hidden md:flex space-x-8">
                <a href="{{ route('welcome') }}" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Home</a>
                <a href="{{ route('benchmarks.select') }}" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Benchmarks</a>
            </nav>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="text-gray-600 hover:text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div> --}}
    

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    {{-- mt-16 --}}
    <footer class="bg-white border-t"> 
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center text-gray-600">
                <p>&copy; {{ date('Y') }} gAyl Benchmark Tool.</p>
                <p class="mt-2 text-sm">Columbia University.All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Character counter
        function updateCharCounter(textareaId, counterId) {
            const textarea = document.getElementById(textareaId);
            const counter = document.getElementById(counterId);
            if (textarea && counter) {
                textarea.addEventListener('input', function() {
                    counter.textContent = this.value.length;
                });
            }
        }

        // Form submission loading state
        function handleFormSubmission(formId, buttonId) {
            const form = document.getElementById(formId);
            const button = document.getElementById(buttonId);
            if (form && button) {
                form.addEventListener('submit', function() {
                    button.disabled = true;
                    button.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Processing...
                    `;
                });
            }
        }

        
    document.addEventListener('DOMContentLoaded', function() {
        const menuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                
                // Animate the burger icon
                const svg = menuBtn.querySelector('svg path');
                if (!mobileMenu.classList.contains('hidden')) {
                    // Change to X icon
                    svg.setAttribute('d', 'M6 18L18 6M6 6l12 12');
                } else {
                    // Change back to burger
                    svg.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                }
            });
        }
    });

        // Initialize when DOM loads
        document.addEventListener('DOMContentLoaded', function() {
            updateCharCounter('chatbot_response', 'charCount');
            handleFormSubmission('benchmarkForm', 'computeBtn');
        });
    </script>
</body>
</html>