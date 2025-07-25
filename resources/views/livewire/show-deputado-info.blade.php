<div x-data="{ isOpen: false }" class="bg-white dark:bg-gray-800 rounded-xl shadow-md transition-all duration-300 overflow-hidden">

    {{-- CABEÇALHO CLICÁVEL --}}
    <div @click="isOpen = !isOpen" class="px-4 sm:px-6 py-4 flex justify-between items-center cursor-pointer border-b border-gray-200 dark:border-gray-700">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            Informações
        </h3>
        <button class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-200">
            <span x-text="isOpen ? 'Ocultar' : 'Expandir'"></span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transition-transform duration-300" :class="{ 'rotate-180': isOpen }" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    {{-- CONTEÚDO EXPANSÍVEL --}}
    <div x-show="isOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">

        <dl>
            {{-- ITEM DA LISTA - DADOS PESSOAIS --}}
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50 dark:bg-gray-800">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nome Civil</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">{{ $deputado->nomeCivil ?? ($deputado['nomeCivil'] ?? 'N/A') }}</dd>
            </div>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-white dark:bg-gray-900">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">CPF</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">{{ $deputado->cpf ?? ($deputado['cpf'] ?? 'N/A') }}</dd>
            </div>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50 dark:bg-gray-800">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nascimento</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">{{ \Carbon\Carbon::parse($deputado->dataNascimento ?? ($deputado['dataNascimento'] ?? now()))->format('d/m/Y') }} em {{ $deputado->municipioNascimento ?? ($deputado['municipioNascimento'] ?? '') }} - {{ $deputado->ufNascimento ?? ($deputado['ufNascimento'] ?? '') }}</dd>
            </div>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-white dark:bg-gray-900">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Escolaridade</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">{{ $deputado->escolaridade ?? ($deputado['escolaridade'] ?? 'N/A') }}</dd>
            </div>

            {{-- ITEM DA LISTA - DADOS DO MANDATO --}}
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50 dark:bg-gray-800">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Situação no Mandato</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">{{ $deputado->ultimoStatus->situacao ?? ($deputado['ultimoStatus']['situacao'] ?? 'N/A') }}</dd>
            </div>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-white dark:bg-gray-900">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Condição Eleitoral</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">{{ $deputado->ultimoStatus->condicaoEleitoral ?? ($deputado['ultimoStatus']['condicaoEleitoral'] ?? 'N/A') }}</dd>
            </div>

            {{-- ITEM DA LISTA - GABINETE --}}
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50 dark:bg-gray-800">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Gabinete</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">Nº {{ $deputado->ultimoStatus->gabinete->nome ?? ($deputado['ultimoStatus']['gabinete']['nome'] ?? '') }}, Prédio {{ $deputado->ultimoStatus->gabinete->predio ?? ($deputado['ultimoStatus']['gabinete']['predio'] ?? '') }}, {{ $deputado->ultimoStatus->gabinete->andar ?? ($deputado['ultimoStatus']['gabinete']['andar'] ?? '') }}º andar</dd>
            </div>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-white dark:bg-gray-900">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Contatos</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                    <p>Telefone: {{ $deputado->ultimoStatus->gabinete->telefone ?? ($deputado['ultimoStatus']['gabinete']['telefone'] ?? 'N/A') }}</p>
                    <p><a href="mailto:{{ $deputado->ultimoStatus->email ?? ($deputado['ultimoStatus']['email'] ?? '#') }}" class="text-indigo-600 hover:underline dark:text-indigo-400">{{ $deputado->ultimoStatus->email ?? ($deputado['ultimoStatus']['email'] ?? 'N/A') }}</a></p>
                </dd>
            </div>

            {{-- ITEM DA LISTA - LINKS E REDES --}}
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 bg-gray-50 dark:bg-gray-800">
                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Links e Redes</dt>
                <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2 space-y-2">
                    @if ($deputado->urlWebsite ?? ($deputado['urlWebsite'] ?? null))
                        <a href="{{ $deputado->urlWebsite ?? ($deputado['urlWebsite']) }}" target="_blank" rel="noopener noreferrer" class="flex items-center text-indigo-600 hover:underline dark:text-indigo-400">Website Oficial <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg></a>
                    @endif

                    @forelse (($deputado->redeSocial ?? ($deputado['redeSocial'] ?? [])) as $rede)
                        <a href="{{ $rede }}" target="_blank" rel="noopener noreferrer" class="flex items-center text-indigo-600 hover:underline dark:text-indigo-400">{{ parse_url($rede, PHP_URL_HOST) }} <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg></a>
                    @empty
                        <p class="text-gray-500">Nenhuma rede social informada.</p>
                    @endforelse
                </dd>
            </div>

        </dl>
    </div>
</div>
