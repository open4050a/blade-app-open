<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TermController;

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

Route::middleware('auth')->group(function () {
    Route::get('/plan', [PlanController::class, 'index'])->name('plan.index');
    Route::get('/plan/show/{id}', [PlanController::class, 'show'])->name('plan.show');
    Route::get('/plan/quotation/{id}', [PlanController::class, 'quotation'])->name('plan.quotation');
    Route::post('/plan/confirm', [PlanController::class, 'confirm'])->name('plan.confirm');
    Route::post('/plan/store', [PlanController::class, 'store'])->name('plan.store');
    Route::post('/plan/search', [PlanController::class, 'search'])->name('plan.search');
});

Route::middleware('auth')->group(function () {
    Route::get('/notice', [NoticeController::class, 'index'])->name('notice.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/term', [TermController::class, 'index'])->name('term.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
