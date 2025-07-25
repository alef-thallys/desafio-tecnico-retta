<?php

namespace App\Livewire;

use App\Models\Deputado;
use App\Models\Despesa;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDeputadoDespesas extends Component
{
    use WithPagination;

    public Deputado $deputado;

    public string $tipoFilter = '';
    public string $fornecedorFilter = '';
    public string $ordenarPorData = 'desc';

    #[On('despesaFiltersUpdated')]
    public function applyFilters(string $tipo, string $fornecedor, string $ordenarPorData)
    {
        $this->tipoFilter = $tipo;
        $this->fornecedorFilter = $fornecedor;
        $this->ordenarPorData = $ordenarPorData;
        $this->resetPage();
    }

    public function mount(Deputado $deputado)
    {
        $this->deputado = $deputado;
    }

    public function render()
    {
        $despesas = Despesa::where('deputado_id', $this->deputado->id)
            ->when($this->tipoFilter, fn ($query) => $query->where('tipo_despesa', $this->tipoFilter))
            ->when($this->fornecedorFilter, fn ($query) => $query->where('nome_fornecedor', $this->fornecedorFilter))
            ->orderBy('ano', $this->ordenarPorData)
            ->orderBy('mes', $this->ordenarPorData)
            ->paginate(15);

        return view('livewire.show-deputado-despesas', [
            'despesas' => $despesas,
        ])->layout('components.layouts.app', ['title' => 'Despesas de ' . $this->deputado->nome]);
    }
}
