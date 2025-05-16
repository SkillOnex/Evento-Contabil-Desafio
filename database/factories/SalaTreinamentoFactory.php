<?php

namespace Database\Factories;

use App\Models\SalaTreinamento;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaTreinamentoFactory extends Factory
{
    protected $model = SalaTreinamento::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company,
            'lotacao' => $this->faker->numberBetween(10, 100),
        ];
    }
}
