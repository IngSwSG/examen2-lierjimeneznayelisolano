<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Categoria;
use App\Models\Material;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente()
    {
        $categoria = Categoria::create(['nombre' => 'Categoría Test']);

        $payload = [
            'unidadMedida' => 'kg',
            'descripcion'  => 'Material de prueba',
            'ubicacion'    => 'Bodega Central',
            'idCategoria'  => $categoria->idCategoria,
        ];

        $response = $this->postJson('/api/materiales', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'descripcion' => 'Material de prueba',
                     'idCategoria' => $categoria->idCategoria,
                 ]);

        $this->assertDatabaseHas('materiales', [
            'descripcion' => 'Material de prueba',
        ]);
    }

    /** @test */
    public function dadoUnMaterialConCategoriaNoExistente_devuelveErrorValidacion()
    {
        $payload = [
            'unidadMedida' => 'm',
            'descripcion'  => 'Otro material',
            'ubicacion'    => 'Bodega',
            'idCategoria'  => 999, // no existe
        ];

        $this->postJson('/api/materiales', $payload)
             ->assertStatus(422)
             ->assertJsonValidationErrors('idCategoria');
    }



    /**
     * Otro escenario de prueba recomendable:
     * Validar que si envío una categoría que no existe
     * el endpoint devuelva 422.
     *
     * Nombre sugerido del método:
     * dadoUnMaterialConCategoriaNoExistente_devuelveErrorValidacion()
     */
}
