<?php

namespace Database\Factories;

use App\Models\PessoaParticipante;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaParticipanteFactory extends Factory
{
    protected $model = PessoaParticipante::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->firstName,
            'sobrenome' => $this->faker->lastName,
        ];
    }
}
