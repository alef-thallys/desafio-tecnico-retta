<div class="grid grid-cols-1 gap-6 md:grid-cols-3 md:gap-4">

    <div>
        <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Buscar por nome</label>
        <input id="search" type="text" wire:model.live.debounce.300ms="busca" placeholder="Digite o nome..."
               class="p-1 mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
    </div>

    <div>
        <label for="uf" class="block text-sm font-medium text-gray-700 dark:text-gray-300">UF</label>
        <select id="uf" wire:model.live="uf"
                class="p-1 mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
            <option value="">Todas as UFs</option>
            @foreach ($ufs as $uf_option)
                <option value="{{ $uf_option }}">{{ $uf_option }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="partido" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Partido</label>
        <select id="partido" wire:model.live="partido"
                class="p-1 mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
            <option value="">Todos os Partidos</option>
            @foreach ($partidos as $partido_option)
                <option value="{{ $partido_option }}">{{ $partido_option }}</option>
            @endforeach
        </select>
    </div>

</div>
