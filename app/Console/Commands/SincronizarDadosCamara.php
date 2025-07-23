<?php

namespace App\Console\Commands;

use App\Jobs\SincronizarDespesasDeputado;
use App\Models\Deputado;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SincronizarDadosCamara extends Command
{
    protected $signature = 'app:sincronizar-dados-camara';
    protected $description = 'Busca deputados da API da câmara e enfileira a sincronização de suas despesas.';

    public function handle()
    {
        $this->info('Iniciando a busca por deputados na API...');
        $apiUrl = 'https://dadosabertos.camara.leg.br/api/v2/deputados?ordem=ASC&ordenarPor=nome';

        try {
            $response = Http::get($apiUrl);

            if ($response->successful()) {
                $deputadosApi = $response->json()['dados'];
                $totalDeputados = count($deputadosApi);

                $this->info("Encontrados {$totalDeputados} deputados. Despachando jobs para a fila...");

                $bar = $this->output->createProgressBar($totalDeputados);

                $bar->start();

                foreach ($deputadosApi as $deputadoData) {
                    $deputado = Deputado::updateOrCreate(
                        ['id' => $deputadoData['id']],
                        [
                            'nome' => $deputadoData['nome'],
                            'sigla_partido' => $deputadoData['siglaPartido'],
                            'sigla_uf' => $deputadoData['siglaUf'],
                            'id_legislatura' => $deputadoData['idLegislatura'],
                            'url_foto' => $deputadoData['urlFoto'],
                            'email' => $deputadoData['email'],
                        ]
                    );

                    SincronizarDespesasDeputado::dispatch($deputado->id);

                    $bar->advance();
                }

                $bar->finish();
                $this->newLine(2);

                $this->info('Todos os jobs foram despachados com sucesso!');

            } else {
                $this->error('Falha ao buscar a lista de deputados da API.');
                Log::error('Falha ao buscar a lista de deputados da API. Status: ' . $response->status());
            }
        } catch (\Exception $e) {
            $this->error('Ocorreu um erro crítico durante a sincronização: ' . $e->getMessage());
            Log::critical('Erro crítico em SincronizarDadosCamara: ' . $e->getMessage());
        }
        return 0;
    }
}
