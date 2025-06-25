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

   /**
     * GET /api/materiales
     * Devuelve todos los materiales con su categoría.
     */
    public function index(): JsonResponse
    {
        $materiales = Material::with('categoria')->get();
        return response()->json($materiales);
    }
   /**
     * PUT/PATCH /api/materiales/{codigo}
     * Actualiza un material existente.
     */
    public function update(Request $request, int $codigo): JsonResponse
    {
        $material = Material::findOrFail($codigo);

        $data = $request->validate([
            'unidadMedida' => 'sometimes|required|string|max:255',
            'descripcion'  => 'sometimes|required|string|max:255',
            'ubicacion'    => 'sometimes|required|string|max:255',
            'idCategoria'  => 'sometimes|required|integer|exists:categorias,idCategoria',
        ]);

        $material->update($data);

        return response()->json($material);
    }
}
