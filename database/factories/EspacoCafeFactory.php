<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EspacoCafeFactory extends Factory
{
    protected $model = \App\Models\EspacoCafe::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company,
            'lotacao' => (string) $this->faker->numberBetween(10, 100),
        ];
    }
}
