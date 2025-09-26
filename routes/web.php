<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BenchmarkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Welcome page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Benchmark selection page
Route::get('/benchmarks', function () {
    return view('benchmarks.select');
})->name('benchmarks.select');

// New: Process selected benchmarks
Route::post('/benchmarks/compute-selected', [BenchmarkController::class, 'computeSelected'])->name('benchmarks.compute.selected');

// Results page
Route::get('/results', [BenchmarkController::class, 'results'])->name('benchmark.multi_results');

// New: Download PDF for single benchmark
Route::get('/benchmark/{formula}/download', [BenchmarkController::class, 'downloadPdf'])->name('benchmark.download');

// New: Download PDF for multiple benchmarks
Route::get('/benchmarks/multi/download', [BenchmarkController::class, 'downloadMultiPdf'])->name('benchmarks.multi.download');