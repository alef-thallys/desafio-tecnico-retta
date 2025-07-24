<?php

namespace App\Livewire;

use App\Models\Deputado;
use Livewire\Component;

class SearchFilters extends Component
{
    public string $busca = '';
    public string $uf = '';
    public string $partido = '';

    public $ufs = [];
    public $partidos = [];

    public function mount()
    {
        $this->ufs = Deputado::distinct()->orderBy('sigla_uf')->pluck('sigla_uf');
        $this->partidos = Deputado::distinct()->orderBy('sigla_partido')->pluck('sigla_partido');
    }

    public function updated(string $value)
    {
        $this->dispatch('filters-changed',
            search: $this->busca,
            uf: $this->uf,
            partido: $this->partido
        );
    }

    public function render()
    {
        return view('livewire.search-deputados-filters');
    }
}
