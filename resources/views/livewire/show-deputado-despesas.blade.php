<div class="container mx-auto p-4 sm:p-6 lg:p-8">

    <div class="mb-6">
        <a href="/" wire:navigate
           class="inline-flex items-center text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200 font-medium transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                      clip-rule="evenodd"/>
            </svg>
            Voltar para a lista
        </a>
    </div>

    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-6 mb-8">
        <img src="{{ $deputado->url_foto }}" alt="Foto de {{ $deputado->nome }}"
             class="w-32 h-32 rounded-full object-cover border-4 border-white dark:border-gray-700 shadow-lg">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white text-center md:text-left">{{ $deputado->nome }}</h1>
            <p class="text-xl text-gray-600 dark:text-gray-400 text-center md:text-left">{{ $deputado->sigla_partido }}
                - {{ $deputado->sigla_uf }}</p>
        </div>
    </div>

    <div class="my-8">
        @livewire('search-despesas-filters', ['deputadoId' => $deputado->id], key($deputado->id))
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md">
        <div class="px-4 sm:px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detalhes das Despesas</h2>
        </div>

        <div class="w-full overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="hidden md:table-header-group bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Data
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Tipo
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Fornecedor
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Valor (R$)
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        Documento
                    </th>
                </tr>
                </thead>
                <tbody class="bg-transparen">
                @forelse ($despesas as $despesa)
                    <tr class="block mb-4 bg-white dark:bg-gray-800 rounded-lg shadow-md md:table-row md:shadow-none md:rounded-none md:border-t md:border-gray-200 md:dark:border-gray-700">
                        <td class="p-3 flex justify-between items-center text-sm border-b border-gray-200 dark:border-gray-700 md:table-cell md:px-6 md:py-4 md:border-none">
                            <span class="font-semibold text-gray-600 dark:text-gray-300 md:hidden">Data</span>
                            <span>{{ \Carbon\Carbon::parse($despesa->data_documento)->format('d/m/Y') }}</span>
                        </td>

                        <td class="p-3 flex justify-between items-center text-sm border-b border-gray-200 dark:border-gray-700 md:table-cell md:px-6 md:py-4 md:border-none">
                            <span class="font-semibold text-gray-600 dark:text-gray-300 md:hidden">Tipo</span>
                            <span class="text-right md:text-left md:max-w-xs"
                                  title="{{ $despesa->tipo_despesa }}">{{ $despesa->tipo_despesa }}</span>
                        </td>

                        {{--                        <td class="p-3 flex justify-between items-center text-sm border-b border-gray-200 dark:border-gray-700 md:table-cell md:px-6 md:py-4 md:border-none">--}}
                        {{--                            <span class="font-semibold text-gray-600 dark:text-gray-300 md:hidden">Tipo</span>--}}
                        {{--                            <span class="text-right max-w-[180px] truncate md:text-left md:max-w-xs" title="{{ $despesa->tipo_despesa }}">--}}
                        {{--                                {{ \Illuminate\Support\Str::limit($despesa->tipo_despesa, 25) }}--}}
                        {{--                            </span>--}}
                        {{--                        </td>--}}

                        <td class="p-3 flex justify-between items-center text-sm border-b border-gray-200 dark:border-gray-700 md:table-cell md:px-6 md:py-4 md:border-none">
                            <span class="font-semibold text-gray-600 dark:text-gray-300 md:hidden">Fornecedor</span>
                            <span class="text-right md:text-left md:max-w-xs"
                                  title="{{ $despesa->nome_fornecedor }}">{{ $despesa->nome_fornecedor }}</span>
                        </td>

                        <td class="p-3 flex justify-between items-center text-sm border-b border-gray-200 dark:border-gray-700 md:table-cell md:text-right md:px-6 md:py-4 md:border-none">
                            <span class="font-semibold text-gray-600 dark:text-gray-300 md:hidden">Valor (R$)</span>
                            <span class="font-mono">{{ number_format($despesa->valor_liquido, 2, ',', '.') }}</span>
                        </td>

                        <td class="p-3 flex justify-between items-center text-sm md:table-cell md:text-center md:px-6 md:py-4 md:border-none">
                            <span class="font-semibold text-gray-600 dark:text-gray-300 md:hidden">Documento</span>
                            <span>
                            @if($despesa->url_documento)
                                    <a href="{{ $despesa->url_documento }}" target="_blank"
                                       class="font-semibold text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200">
                                    Ver
                                </a>
                                @else
                                    <span class="text-gray-400">N/A</span>
                                @endif
                        </span>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-8 text-gray-500 dark:text-gray-400">
                            Nenhuma despesa encontrada com os filtros atuais.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-gray-200 dark:border-gray-700">
            {{ $despesas->links() }}
        </div>
    </div>
</div>
