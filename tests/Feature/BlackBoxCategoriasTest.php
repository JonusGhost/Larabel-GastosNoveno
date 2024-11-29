<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlackBoxCategoriasTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexRetornaTodasLasCategorias()
    {
        Categoria::factory(3)->create();

        $this->getJson('/api/categorias')
            ->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function testIndexRetornaTodasLasSubcategorias()
    {
        Subcategoria::factory(3)->create();

        $this->getJson('/api/subcategorias')
            ->assertStatus(200)
            ->assertJsonCount(3);
    }
}
