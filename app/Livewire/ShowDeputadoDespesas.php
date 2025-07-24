<?php

namespace App\Livewire;

use App\Models\Deputado;
use Livewire\Component;

class ShowDeputadoDespesas extends Component
{
    public Deputado $deputado;

    public function mount(Deputado $deputado)
    {
        $this->deputado = $deputado->load([
            'despesas' => function ($query) {
                $query->orderBy('ano', 'desc')
                    ->orderBy('mes', 'desc');
            }
        ]);
    }

    public function render()
    {
        return view('livewire.show-deputado-despesas')
            ->layout('components.layouts.app', ['title' => 'Despesas de ' . $this->deputado->nome]);
    }
}
