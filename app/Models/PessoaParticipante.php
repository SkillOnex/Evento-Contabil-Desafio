<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaParticipante extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'sobrenome'];

    public function alocacoes()
    {
        return $this->hasMany(AlocacaoEtapaEvento::class, 'pessoa_participante_id');
    }
}
