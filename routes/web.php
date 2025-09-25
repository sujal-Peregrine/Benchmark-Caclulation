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

// Form page for specific benchmark
Route::get('/benchmark/{formula}', [BenchmarkController::class, 'showForm'])->name('benchmark.form');

// Process form and show results
Route::post('/benchmark/{formula}/compute', [BenchmarkController::class, 'compute'])->name('benchmark.compute');

// Results page
Route::get('/results', [BenchmarkController::class, 'results'])->name('benchmark.results');

// New: Form page for all benchmarks
Route::get('/benchmarks/all', [BenchmarkController::class, 'showAllForm'])->name('benchmarks.all.form');

// New: Process form and show results for all
Route::post('/benchmarks/all/compute', [BenchmarkController::class, 'computeAll'])->name('benchmarks.all.compute');

// New: Download PDF for single benchmark
Route::get('/benchmark/{formula}/download', [BenchmarkController::class, 'downloadPdf'])->name('benchmark.download');

// New: Download PDF for all benchmarks
Route::get('/benchmarks/all/download', [BenchmarkController::class, 'downloadAllPdf'])->name('benchmarks.all.download');