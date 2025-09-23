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