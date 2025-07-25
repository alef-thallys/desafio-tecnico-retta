<?php

namespace App\Livewire;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ShowDeputadoInfo extends Component
{

    public int $deputadoId;
    public $deputado;

    public function mount(int $deputadoId)
    {
        $this->deputadoId = $deputadoId;
        $this->fetchDeputadoData();
    }

    public function fetchDeputadoData()
    {
        $apiUrl = "https://dadosabertos.camara.leg.br/api/v2/deputados/{$this->deputadoId}";

        try {
            $response = Http::get($apiUrl);
            $response->throw();

            $deputadoData = $response->json('dados');

            if (!is_array($deputadoData) || !$deputadoData) {
                session()->flash('error', 'Deputado não encontrado ou dados inválidos.');
                return redirect()->route('welcome');
            }

            $this->deputado = $deputadoData;

        } catch (RequestException $e) {
            session()->flash('error', 'Deputado não encontrado ou erro na comunicação com a API.');
            return redirect()->route('welcome');
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro inesperado: ' . $e->getMessage());
            return redirect()->route('welcome');
        }
    }

    public function render()
    {
        return view('livewire.show-deputado-info',
            [
                'deputado' => $this->deputado,
            ]);
    }
}
