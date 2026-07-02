<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = auth()->user()->transactions()->with('category')->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $categories = auth()->user()->categories()->get();
        return view('transactions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        auth()->user()->transactions()->create($data);

        return redirect()->route('transactions.index')->with('success', 'Transação criada com sucesso!');
    }

    public function edit($id)
    {
        $transaction = auth()->user()->transactions()->findOrFail($id);
        $categories = auth()->user()->categories()->get();
        return view('transactions.edit', compact('transaction', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $transaction = auth()->user()->transactions()->findOrFail($id);
        
        $data = $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $transaction->update($data);

        return redirect()->route('transactions.index')->with('success', 'Transação atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $transaction = auth()->user()->transactions()->findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transação deletada com sucesso!');
    }
}