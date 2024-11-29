<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoriaFactory extends Factory
{
    protected $model = Subcategoria::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'id_categoria' => Categoria::factory(), // Relación con Categoría
            'categoria' => Categoria::factory()
        ];
    }
}
