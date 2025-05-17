<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaTreinamento extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'lotacao'];

    public function alocacoes()
    {
        return $this->hasMany(AlocacaoEtapaEvento::class, 'sala_treinamento_id');
    }

    public function pessoas()
    {
        return $this->belongsToMany(PessoaParticipante::class, 'alocacoes_salas', 'sala_id', 'pessoa_id')
                    ->withTimestamps();
    }
}
