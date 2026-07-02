<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Transações
            </h2>
            <a href="{{ route('transactions.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-sm transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nova Transação
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-start">
                <p class="text-sm font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        @if($transactions->isEmpty())
            <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                <h3 class="mt-2 text-sm font-semibold text-gray-900">Nenhuma transação</h3>
                <a href="{{ route('transactions.create') }}" class="mt-6 inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg">Nova Transação</a>
            </div>
        @else
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Data</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Descrição</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Categoria</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase">Valor</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($transactions as $transaction)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $transaction->date->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $transaction->description }}</td>
                                    <td class="px-6 py-4 text-sm">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $transaction->category->type === 'receita' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $transaction->category->name }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-right">
                                        <span class="{{ $transaction->category->type === 'receita' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $transaction->category->type === 'receita' ? '+' : '-' }} {{ $transaction->formatted_amount }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('transactions.edit', $transaction) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" onsubmit="return confirm('Tem certeza?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Deletar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-8">{{ $transactions->links() }}</div>
        @endif
        </div>
    </div>
</x-app-layout>