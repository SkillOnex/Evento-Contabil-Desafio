<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlocacaoEtapaEvento extends Model
{
    protected $fillable = [
        'pessoa_participante_id',
        'sala_treinamento_id',
        'espaco_cafe_id',
        'etapa', // 1 ou 2
    ];

    public function pessoaParticipante()
    {
        return $this->belongsTo(PessoaParticipante::class);
    }

    public function salaTreinamento()
    {
        return $this->belongsTo(SalaTreinamento::class);
    }

    public function espacoCafe()
    {
        return $this->belongsTo(EspacoCafe::class);
    }
}
