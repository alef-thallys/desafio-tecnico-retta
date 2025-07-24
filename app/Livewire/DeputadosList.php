<?php

namespace App\Livewire;

use App\Models\Deputado;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class DeputadosList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $uf = '';
    public string $partido = '';

    #[On('filters-changed')]
    public function updateFilters(string $search, string $uf, string $partido)
    {
        $this->search = $search;
        $this->uf = $uf;
        $this->partido = $partido;
        $this->resetPage();
    }

    public function render()
    {
        $deputados = Deputado::query()
            ->when($this->search, function ($query) {
                $query->where('nome', 'like', '%' . $this->search . '%');
            })
            ->when($this->uf, function ($query) {
                $query->where('sigla_uf', $this->uf);
            })
            ->when($this->partido, function ($query) {
                $query->where('sigla_partido', $this->partido);
            })
            ->orderBy("nome")->paginate(20);

        return view('livewire.deputados-list', [
            'deputados' => $deputados,
        ]);
    }
}
