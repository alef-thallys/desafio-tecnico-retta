<?php

namespace App\Jobs;

use App\Models\Despesa;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SincronizarDespesasDeputado implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $deputadoId;

    public function __construct(int $deputadoId)
    {
        $this->deputadoId = $deputadoId;
    }

    public function handle(): void
    {
        $apiUrl = "https://dadosabertos.camara.leg.br/api/v2/deputados/{$this->deputadoId}/despesas?ordem=DESC&ordenarPor=ano&itens=1000";

        try {
            $response = Http::get($apiUrl);

            if ($response->successful()) {
                $despesas = $response->json()['dados'];

                foreach ($despesas as $despesa) {
                    Despesa::updateOrCreate(
                        ['cod_documento' => $despesa['codDocumento']],
                        [
                            'deputado_id' => $this->deputadoId,
                            'ano' => $despesa['ano'],
                            'mes' => $despesa['mes'],
                            'tipo_despesa' => $despesa['tipoDespesa'],
                            'data_documento' => $despesa['dataDocumento'],
                            'nome_fornecedor' => $despesa['nomeFornecedor'],
                            'cnpj_cpf_fornecedor' => $despesa['cnpjCpfFornecedor'],
                            'valor_documento' => $despesa['valorDocumento'],
                            'valor_liquido' => $despesa['valorLiquido'],
                            'url_documento' => $despesa['urlDocumento'],
                        ]
                    );
                }
            } else {
                Log::error("Falha ao buscar despesas para o deputado ID: {$this->deputadoId}. Status: " . $response->status());
            }
        } catch (\Exception $e) {
            Log::error("Erro no job de sincronização de despesas para o deputado ID: {$this->deputadoId}. Erro: " . $e->getMessage());
        }
    }
}
