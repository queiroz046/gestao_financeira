<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = auth()->user()->categories()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:receita,despesa',
        ]);

        auth()->user()->categories()->create($data);

        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        $category = auth()->user()->categories()->findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = auth()->user()->categories()->findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:receita,despesa',
        ]);

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $category = auth()->user()->categories()->findOrFail($id);
        
        if ($category->transactions()->exists()) {
            return redirect()->route('categories.index')->with('error', 'Não é possível deletar categoria com transações.');
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoria deletada com sucesso!');
    }
}