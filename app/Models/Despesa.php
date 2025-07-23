<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Despesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'deputado_id',
        'ano',
        'mes',
        'tipo_despesa',
        'cod_documento',
        'data_documento',
        'nome_fornecedor',
        'cnpj_cpf_fornecedor',
        'valor_documento',
        'valor_liquido',
        'url_documento',
    ];

    public function deputado(): BelongsTo
    {
        return $this->belongsTo(Deputado::class);
    }
}
