<x-layouts.app>
    <div class="container mx-auto p-4 sm:p-6 lg:p-8">

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-4 sm:p-6 mb-8">
            <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">Filtros</h2>
            @livewire('search-deputados-filters')
        </div>

        @livewire('deputados-list')

    </div>
</x-layouts.app>
