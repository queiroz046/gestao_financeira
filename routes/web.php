<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Rota inicial redirecionando para o login
Route::get('/', function () {
    return redirect()->route('login');
});

// Grupo de rotas que exigem autenticação
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard com a lógica de cálculo dos totais
    Route::get('/dashboard', function () {
        $user = auth()->user();
        
        $receitas = $user->transactions()->whereHas('category', function($q) {
            $q->where('type', 'receita');
        })->sum('amount');
        
        $despesas = $user->transactions()->whereHas('category', function($q) {
            $q->where('type', 'despesa');
        })->sum('amount');

        return view('dashboard', compact('receitas', 'despesas'));
    })->name('dashboard');

    // Rotas de Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Recursos (CRUDs)
    Route::resource('categories', CategoryController::class);
    Route::resource('transactions', TransactionController::class);
});

require __DIR__.'/auth.php';