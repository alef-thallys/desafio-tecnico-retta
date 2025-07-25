<?php

namespace App\Livewire;

use App\Models\Despesa;
use Livewire\Component;

class SearchDespesasFilters extends Component
{
    public int $deputadoId;

    public string $tipo_despesa = '';
    public string $fornecedor = '';
    public string $ordenarPorData = 'desc';

    public $tiposOptions = [];
    public $fornecedoresOptions = [];

    public function mount(int $deputadoId)
    {
        $this->deputadoId = $deputadoId;

        $query = Despesa::where('deputado_id', $this->deputadoId);

        $this->tiposOptions = (clone $query)->distinct()->orderBy('tipo_despesa')->pluck('tipo_despesa');
        $this->fornecedoresOptions = (clone $query)->distinct()->orderBy('nome_fornecedor')->pluck('nome_fornecedor');
        $this->ordenarPorData = (clone $query)->orderBy('data_documento', 'desc')->pluck('data_documento')->first() ? 'desc' : 'asc';
    }

    public function updated()
    {
        $this->dispatch('despesaFiltersUpdated',
            tipo: $this->tipo_despesa,
            fornecedor: $this->fornecedor,
            ordenarPorData: $this->ordenarPorData
        );
    }

    public function render()
    {
        return view('livewire.search-despesas-filters');
    }
}
