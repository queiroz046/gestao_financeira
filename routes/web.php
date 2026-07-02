<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Models\Transaction;

Route::get('/dashboard', function () {
    $user = auth()->user();
    
    // Calcula totais
    $receitas = $user->transactions()->whereHas('category', function($q) {
        $q->where('type', 'receita');
    })->sum('amount');
    
    $despesas = $user->transactions()->whereHas('category', function($q) {
        $q->where('type', 'despesa');
    })->sum('amount');

    return view('dashboard', compact('receitas', 'despesas'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('transactions', TransactionController::class);
});

require __DIR__.'/auth.php';
