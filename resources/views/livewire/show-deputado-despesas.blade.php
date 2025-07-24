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

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md">
            <div class="px-4 sm:px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Detalhes das Despesas</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
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
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($deputado->despesas as $despesa)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ \Carbon\Carbon::parse($despesa->data_documento)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 text-sm max-w-xs truncate"
                                title="{{ $despesa->tipo_despesa }}">{{ $despesa->tipo_despesa }}</td>
                            <td class="px-6 py-4 text-sm max-w-xs truncate"
                                title="{{ $despesa->nome_fornecedor }}">{{ $despesa->nome_fornecedor }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-mono">{{ number_format($despesa->valor_liquido, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                @if($despesa->url_documento)
                                    <a href="{{ $despesa->url_documento }}" target="_blank"
                                       class="font-semibold text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200">
                                        Ver
                                    </a>
                                @else
                                    <span class="text-gray-400">N/A</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-8 text-gray-500 dark:text-gray-400">
                                Nenhuma despesa encontrada para este deputado.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
 </div>
