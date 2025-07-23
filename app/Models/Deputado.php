<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deputado extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nome',
        'sigla_partido',
        'sigla_uf',
        'id_legislatura',
        'url_foto',
        'email',
    ];

    public function despesas(): HasMany
    {
        return $this->hasMany(Despesa::class);
    }
}
