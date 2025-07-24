<x-layouts.app>
    <x-slot:title>
        Página Inicial
    </x-slot>

    <div>
        <header>
            <h1>
                Busca de Deputados
            </h1>
            <p>
                Utilize os filtros abaixo para encontrar deputados.
            </p>
        </header>

        <div>
            @livewire('search-filters')
            @livewire('deputados-list')
        </div>
    </div>
</x-layouts.app>
