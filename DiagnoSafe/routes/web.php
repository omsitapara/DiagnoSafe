<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LungController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiabetesController;
use App\Http\Controllers\HeartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::get('/diabetes-predictor', [DiabetesController::class,'index'])->name('diabetes-predictor');
    Route::post('/diabetes-predictor', [DiabetesController::class,'predict'])->name('diabetes-predictor-pre');

    Route::get('/heart-predictor', [HeartController::class,'index'])->name('heart-predictor');
    Route::post('/heart-predictor', [HeartController::class,'predict'])->name('heart-predictor-pre');
    
    Route::get('/lung-predictor', [LungController::class,'index'])->name('lung-predictor');
    Route::post('/lung-predictor', [LungController::class,'predict'])->name('lung-predictor-pre');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
