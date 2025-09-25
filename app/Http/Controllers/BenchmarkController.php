<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf; // Assume barryvdh/laravel-dompdf is installed: composer require barryvdh/laravel-dompdf

class BenchmarkController extends Controller
{
    private $formulas = [
        'ethical_alignment' => [
            'name' => 'Ethical Alignment Analysis',
            'description' => 'Evaluate ethical alignment and LGBTQ+ inclusivity in responses',
            'icon' => '⚖️',
            'details' => 'Analyzes text for ethical considerations, LGBTQ+ affirming language, supportive terminology, and crisis assessment quality.',
            'max' => 1, // values are between 0–1
        ],
        'inclusivity' => [
            'name' => 'Inclusivity Assessment', 
            'description' => 'Measure inclusivity and diversity in language usage',
            'icon' => '🌈',
            'details' => 'Evaluates the use of inclusive language, diversity considerations, and accessibility in communication.',
            'max' => 1,
        ],
        'complexity' => [
            'name' => 'Text Complexity Analysis',
            'description' => 'Analyze text complexity and readability metrics',
            'icon' => '📊',
            'details' => 'Calculates Flesch-Kincaid readability scores, sentence complexity, and syllable distribution.',
            'max' => 100, 
        ],
        'sentiment' => [
            'name' => 'Sentiment Vector Analysis',
            'description' => 'Comprehensive sentiment and emotional tone evaluation',
            'icon' => '💭',
            'details' => 'Analyzes emotional content using weighted sentiment vectors and empathy indicators.',
            'max' => 1,
        ],
    ];
    private $benchmarkApiUrl;
    public function __construct(){
        $this->benchmarkApiUrl = env('BENCHMARK_API_URL');
    }
    

    public function showForm($formula)
    {
        if (!array_key_exists($formula, $this->formulas)) {
            abort(404, 'Formula not found');
        }

        $formulaData = $this->formulas[$formula];
        
        return view('benchmarks.form', [
            'formula' => $formula,
            'formulaData' => $formulaData
        ]);
    }

    public function compute(Request $request, $formula)
    {
        
        $request->validate([
            'chatbot_response' => 'required|string|max:10000',
        ]);

        if (!array_key_exists($formula, $this->formulas)) {
            return back()->withErrors(['error' => 'Invalid formula selected.']);
        }

        try {
            // Log the API request for debugging
            Log::info('Making API request', [
                'formula' => $formula,
                'text_length' => strlen($request->chatbot_response),
                'api_url' => env('BENCHMARK_API_URL')
            ]);

            // Hit your Flask API with the response and formula name
            $apiResponse = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ])
                ->post($this->benchmarkApiUrl , [
                    'chatbot_text' => $request->chatbot_response,
                    'formula' => $formula,
                    "human_text" => "i support lgbtq"
                ]);

            if ($apiResponse->successful()) {
                $results = $apiResponse->json();
                
                Log::info('API response received', ['results' => $results]);

                // Store in session for PDF download
                session()->put('last_single_results', [
                    'formula' => $formula,
                    'chatbotResponse' => $request->chatbot_response,
                    'results' => $results,
                    'formulaData' => $this->formulas[$formula],
                ]);
                
                return view('benchmarks.results', [
                    'formula' => $formula,
                    'formulaData' => $this->formulas[$formula],
                    'chatbotResponse' => $request->chatbot_response,
                    'results' => $results,
                    'success' => true
                ]);
            } else {
                Log::error('API request failed', [
                    'status' => $apiResponse->status(),
                    'body' => $apiResponse->body()
                ]);
                throw new \Exception('API request failed with status: ' . $apiResponse->status());
            }

        } catch (\Exception $e) {
            Log::error('Computation error', [
                'error' => $e->getMessage(),
                'formula' => $formula
            ]);

            return view('benchmarks.results', [
                'formula' => $formula,
                'formulaData' => $this->formulas[$formula],
                'chatbotResponse' => $request->chatbot_response,
                'error' => 'Failed to compute results: ' . $e->getMessage(),
                'success' => false
            ]);
        }
    }

    public function results()
    {
        return redirect()->route('welcome');
    }

    // New: Show form for all benchmarks
    public function showAllForm()
    {
        return view('benchmarks.all_form', [
            'formulas' => $this->formulas
        ]);
    }

    // New: Compute all benchmarks
    public function computeAll(Request $request)
{
    $request->validate([
        'chatbot_response' => 'required|string|max:10000',
    ]);

    $allResults = [];
    $errors = [];

    try {
        // Make a single API call with all formulas or the input text
        $apiResponse = Http::timeout(30)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ])
            ->post($this->benchmarkApiUrl, [
                'chatbot_text' => $request->chatbot_response,
                'formula'=> "all",
                "human_text"=>"i support lgbtq"
            ]);

        if ($apiResponse->successful()) {
            $allResults['all'] = $apiResponse->json(); // Store the consolidated result
        } else {
            $errors['all'] = 'API request failed with status: ' . $apiResponse->status();
        }
    } catch (\Exception $e) {
        $errors['all'] = $e->getMessage();
    }

    // Store in session for PDF download
    session()->put('last_all_results', [
        'chatbotResponse' => $request->chatbot_response,
        'allResults' => $allResults,
        'formulas' => $this->formulas,
        'errors' => $errors,
    ]);

    return view('benchmarks.all_results', [
        'chatbotResponse' => $request->chatbot_response,
        'allResults' => $allResults,
        'formulas' => $this->formulas,
        'errors' => $errors,
        'success' => empty($errors)
    ]);
}

    // New: Download PDF for single benchmark
    public function downloadPdf($formula)
    {
        $data = session('last_single_results');

        if (!$data || $data['formula'] !== $formula) {
            abort(404, 'Results not found');
        }

        $pdf = Pdf::loadView('benchmarks.pdf_single', $data);
        return $pdf->download('benchmark_results_' . $formula . '.pdf');
    }

    // New: Download PDF for all benchmarks
    public function downloadAllPdf()
    {
        $data = session('last_all_results');

        if (!$data) {
            abort(404, 'Results not found');
        }

        $pdf = Pdf::loadView('benchmarks.pdf_all', $data);
        return $pdf->download('benchmark_all_results.pdf');
    }
}