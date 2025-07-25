<div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-4 bg-gray-50 dark:bg-gray-800/50 rounded-lg">
    <div>
        <label for="tipo_despesa" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Filtrar por Tipo</label>
        <select id="tipo_despesa" wire:model.live="tipo_despesa" class="p-1 mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
            <option value="">Todos os Tipos</option>
            @foreach($tiposOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="fornecedor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Filtrar por Fornecedor</label>
        <select id="fornecedor" wire:model.live="fornecedor" class="p-1 mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
            <option value="">Todos os Fornecedores</option>
            @foreach($fornecedoresOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="ordenacao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ordenar por</label>
        <select id="ordenacao" wire:model.live="ordenarPorData" class="p-1 mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white sm:text-sm">
            <option value="desc">Mais recentes</option>
            <option value="asc">Mais antigos</option>
        </select>
    </div>
</div>
