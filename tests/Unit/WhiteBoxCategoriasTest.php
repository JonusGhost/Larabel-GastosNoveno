<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WhiteBoxCategoriasTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreValidarDatosCategoria()
    {
        $user = User::factory()->create();
        $data = [
            'nombre' => 'Categoría Prueba',
            'id_usuario' => $user->id,
        ];

        $this->postJson('/api/categorias/save', $data)
            ->assertStatus(201)
            ->assertJsonFragment(['nombre' => 'Categoría Prueba']);
    }

    public function testStoreFallaSinDatosRequeridosCategorias()
    {
        $data = []; // Sin datos enviados

        $this->postJson('/api/categorias/save', $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['nombre', 'id_usuario']);
    }

    public function testStoreValidarDatosSubcategoria()
    {
        $categoria = Categoria::factory()->create();
        $data = [
            'nombre' => 'Subcategoría Prueba',
            'id_categoria' => $categoria->id,
            'categoria' => $categoria->nombre,
        ];

        $this->postJson('/api/subcategorias/save', $data)
            ->assertStatus(201)
            ->assertJsonFragment(['nombre' => 'Subcategoría Prueba']);
    }

    public function testStoreFallaSinDatosRequeridosSubcategorias()
    {
        $data = []; // Sin datos enviados

        $this->postJson('/api/subcategorias/save', $data)
            ->assertStatus(422)
            ->assertJsonValidationErrors(['nombre', 'id_categoria', 'categoria']);
    }
}
