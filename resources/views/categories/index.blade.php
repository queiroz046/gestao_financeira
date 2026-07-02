<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categorias
            </h2>
            <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-sm transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nova Categoria
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if(session('success') || session('error'))
            <div class="mb-6 p-4 rounded-lg flex items-start {{ session('success') ? 'bg-green-100 text-green-700 border border-green-400' : 'bg-red-100 text-red-700 border border-red-400' }}">
                <p class="text-sm font-semibold">{{ session('success') ?? session('error') }}</p>
            </div>
        @endif

        @if($categories->isEmpty())
            <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                <h3 class="mt-2 text-sm font-semibold text-gray-900">Nenhuma categoria</h3>
                <p class="mt-1 text-sm text-gray-500">Comece criando sua primeira categoria.</p>
            </div>
        @else
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($categories as $category)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 border border-gray-100 overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">{{ $category->name }}</h3>
                                    <span class="mt-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $category->type === 'receita' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($category->type) }}
                                    </span>
                                </div>
                            </div>

                            <div class="mt-6 pt-4 border-t border-gray-100">
                                <p class="text-sm text-gray-500">
                                    <span class="font-bold text-gray-900">{{ $category->transactions()->count() }}</span> transações vinculadas
                                </p>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-6 py-4 flex items-center gap-3">
                            <a href="{{ route('categories.edit', $category) }}" class="flex-1 text-center px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition duration-150">
                                Editar
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="flex-1" onsubmit="return confirm('Tem certeza? Esta ação é irreversível.');">
                                @csrf @method('DELETE')
                                <button type="submit" class="w-full px-4 py-2 bg-red-50 text-red-600 text-sm font-medium rounded-lg hover:bg-red-100 transition duration-150">
                                    Deletar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $categories->links() }}
            </div>
        @endif
        </div>
    </div>
</x-app-layout>