<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf; 

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
        $this->benchmarkApiUrl = 'http://51.79.100.173:5001/evaluate';
    }
    

    public function results()
    {
        return redirect()->route('welcome');
    }

    // New: Compute selected benchmarks
    public function computeSelected(Request $request)
    {
        $request->validate([
            'chatbot_response' => 'required|string|max:10000',
            'selected_formulas' => 'required|array|min:1',
            'selected_formulas.*' => 'in:' . implode(',', array_keys($this->formulas)),
        ]);

        $selected = $request->input('selected_formulas');
        $chatbotResponse = $request->chatbot_response;
        $humanText = "i support lgbtq";

        $results = [];
        $errors = [];
        $success = true;

        try {
            if (count($selected) === 1) {
                $formula = $selected[0];

                Log::info('Making API request for single', [
                    'formula' => $formula,
                    'text_length' => strlen($chatbotResponse),
                    'api_url' => $this->benchmarkApiUrl
                ]);

                $apiResponse = Http::timeout(30)
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json'
                    ])
                    ->post($this->benchmarkApiUrl, [
                        'chatbot_text' => $chatbotResponse,
                        'formula' => $formula,
                        'human_text' => $humanText
                    ]);

                if ($apiResponse->successful()) {
                    $results = $apiResponse->json();
                    Log::info('API response received', ['results' => $results]);
                } else {
                    Log::error('API request failed', [
                        'status' => $apiResponse->status(),
                        'body' => $apiResponse->body()
                    ]);
                    $errors[$formula] = 'API request failed with status: ' . $apiResponse->status();
                    $success = false;
                }

                session()->put('last_single_results', [
                    'formula' => $formula,
                    'chatbotResponse' => $chatbotResponse,
                    'results' => $results,
                    'formulaData' => $this->formulas[$formula],
                ]);

                return view('benchmarks.multi_results', [
                    'selected' => [$formula],          // wrap single formula in array
                    'chatbotResponse' => $chatbotResponse,
                    'results' => $results,
                    'formulas' => $this->formulas,     // needed in Blade
                    'success' => $success,
                    'errors' => $errors                // optional, unify structure
                ]);
            } else {
                // Multiple: Call "all" and filter
                Log::info('Making API request for all (multiple selected)', [
                    'selected' => $selected,
                    'text_length' => strlen($chatbotResponse),
                    'api_url' => $this->benchmarkApiUrl
                ]);

                $apiResponse = Http::timeout(30)
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json'
                    ])
                    ->post($this->benchmarkApiUrl, [
                        'chatbot_text' => $chatbotResponse,
                        'formula' => 'all',
                        'human_text' => $humanText
                    ]);

                if ($apiResponse->successful()) {
                    $allResults = $apiResponse->json();
                    Log::info('API response received', ['results' => $allResults]);

                    foreach ($selected as $formula) {
                        $results[$formula] = $allResults[$formula] ?? 0;
                    }
                } else {
                    Log::error('API request failed', [
                        'status' => $apiResponse->status(),
                        'body' => $apiResponse->body()
                    ]);
                    $errors['all'] = 'API request failed with status: ' . $apiResponse->status();
                    $success = false;
                }

                session()->put('last_multi_results', [
                    'selected' => $selected,
                    'chatbotResponse' => $chatbotResponse,
                    'results' => $results,
                    'formulas' => $this->formulas,
                ]);

                return view('benchmarks.multi_results', [
                    'selected' => $selected,
                    'chatbotResponse' => $chatbotResponse,
                    'results' => $results,
                    'formulas' => $this->formulas,
                    'errors' => $errors,
                    'success' => $success
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Computation error', ['error' => $e->getMessage()]);

            $errorMessage = 'Failed to compute results: ' . $e->getMessage();
            if (count($selected) === 1) {
                return view('benchmarks.multi_results', [
                    'formula' => $selected[0],
                    'formulaData' => $this->formulas[$selected[0]],
                    'chatbotResponse' => $chatbotResponse,
                    'error' => $errorMessage,
                    'success' => false
                ]);
            } else {
                return view('benchmarks.multi_results', [
                    'selected' => $selected,
                    'chatbotResponse' => $chatbotResponse,
                    'formulas' => $this->formulas,
                    'errors' => ['all' => $errorMessage],
                    'success' => false
                ]);
            }
        }
    }

    // Download PDF for single benchmark
    public function downloadPdf($formula)
    {
        $data = session('last_single_results');

        if (!$data || $data['formula'] !== $formula) {
            abort(404, 'Results not found');
        }

        $pdf = Pdf::loadView('benchmarks.pdf_single', $data);
        return $pdf->download('benchmark_results_' . $formula . '.pdf');
    }

    // New: Download PDF for multiple benchmarks
    public function downloadMultiPdf()
    {
        $data = session('last_multi_results');

        if (!$data) {
            abort(404, 'Results not found');
        }

        $pdf = Pdf::loadView('benchmarks.pdf_multi', $data);
        return $pdf->download('benchmark_multi_results.pdf');
    }
}