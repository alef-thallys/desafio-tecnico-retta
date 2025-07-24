<div>
    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
        Lista de Deputados
    </h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 sm:gap-6">
        @forelse ($deputados as $deputado)
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 p-4 flex flex-col items-center text-center">

                <img src="{{ $deputado->url_foto }}" alt="Foto de {{ $deputado->nome }}"
                     class="w-24 h-24 rounded-md mb-3 object-cover border-2 border-gray-200 dark:border-gray-600">

                <div class="flex-grow">
                    <h3 class="font-bold text-md text-gray-900 dark:text-white leading-tight">{{ $deputado->nome }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $deputado->sigla_partido }}
                        - {{ $deputado->sigla_uf }}</p>
                </div>

                <a href="{{ route('deputado.despesas', $deputado) }}"
                   wire:navigate
                   class="mt-4 w-full px-1 py-2 text-sm font-semibold bg-indigo-600 hover:bg-indigo-700 text-white rounded-md transition-colors">
                    Ver Despesas
                </a>
            </div>
        @empty
            <div class="col-span-full bg-white dark:bg-gray-800 rounded-lg shadow-md p-10 text-center">
                <p class="text-gray-500 dark:text-gray-400">
                    Nenhum deputado encontrado com os filtros atuais.
                </p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $deputados->links() }}
    </div>
</div>
