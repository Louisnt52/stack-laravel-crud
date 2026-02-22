<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductoController extends Controller
{
    /**
     * GET /api/productos
     * Listar todos los productos
     */
    public function index()
    {
        try {
            $productos = Producto::all();
            
            return response()->json([
                'success' => true,
                'message' => 'Productos obtenidos exitosamente',
                'data' => $productos,
                'total' => $productos->count()
            ], Response::HTTP_OK); // 200
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener productos',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500
        }
    }

    /**
     * GET /api/productos/{id}
     * Mostrar un producto específico
     */
    public function show($id)
    {
        try {
            $producto = Producto::find($id);

            if (!$producto) {
                return response()->json([
                    'success' => false,
                    'message' => 'Producto no encontrado'
                ], Response::HTTP_NOT_FOUND); // 404
            }

            return response()->json([
                'success' => true,
                'message' => 'Producto obtenido exitosamente',
                'data' => $producto
            ], Response::HTTP_OK); // 200

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el producto',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500
        }
    }

    /**
     * POST /api/productos
     * Crear un nuevo producto
     */
    public function store(Request $request)
    {
        try {
            // Validaciones
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'precio' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0'
            ]);

            // Crear producto
            $producto = Producto::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Producto creado exitosamente',
                'data' => $producto
            ], Response::HTTP_CREATED); // 201

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY); // 422

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el producto',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500
        }
    }

    /**
     * PUT /api/productos/{id}
     * Actualizar un producto existente
     */
    public function update(Request $request, $id)
    {
        try {
            // Buscar producto
            $producto = Producto::find($id);

            if (!$producto) {
                return response()->json([
                    'success' => false,
                    'message' => 'Producto no encontrado'
                ], Response::HTTP_NOT_FOUND); // 404
            }

            // Validaciones
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'precio' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0'
            ]);

            // Actualizar producto
            $producto->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Producto actualizado exitosamente',
                'data' => $producto
            ], Response::HTTP_OK); // 200

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY); // 422

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el producto',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500
        }
    }

    /**
     * DELETE /api/productos/{id}
     * Eliminar un producto
     */
    public function destroy($id)
    {
        try {
            // Buscar producto
            $producto = Producto::find($id);

            if (!$producto) {
                return response()->json([
                    'success' => false,
                    'message' => 'Producto no encontrado'
                ], Response::HTTP_NOT_FOUND); // 404
            }

            // Eliminar producto
            $producto->delete();

            return response()->json([
                'success' => true,
                'message' => 'Producto eliminado exitosamente'
            ], Response::HTTP_OK); // 200

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el producto',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500
        }
    }
}