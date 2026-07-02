<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-sm font-medium text-gray-500">Total Receitas</div>
                    <div class="text-3xl font-bold text-green-600">R$ {{ number_format($receitas, 2, ',', '.') }}</div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-500">
                    <div class="text-sm font-medium text-gray-500">Total Despesas</div>
                    <div class="text-3xl font-bold text-red-600">R$ {{ number_format($despesas, 2, ',', '.') }}</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Você está logado!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>