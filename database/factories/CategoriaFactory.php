<?php

namespace Database\Factories;

use \App\Models\User;
use \App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'id_usuario' => User::factory() // Relación con User
        ];
    }
}
