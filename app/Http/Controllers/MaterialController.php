<?php
namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class MaterialController extends Controller
{
  
    /**
     * POST /api/materiales
     * Crea un nuevo material, validando que la categoría exista.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'unidadMedida' => 'required|string|max:255',
            'descripcion'  => 'required|string|max:255',
            'ubicacion'    => 'required|string|max:255',
            'idCategoria'  => 'required|integer|exists:categorias,idCategoria',
        ]);

        $material = Material::create($data);

        return response()->json($material, 201);
    }

  
}
