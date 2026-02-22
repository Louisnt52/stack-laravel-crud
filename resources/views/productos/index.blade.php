@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Lista de Productos</h2>
        <a href="/productos/create" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
            Nuevo Producto
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Descripción</th>
                    <th class="py-3 px-4 text-left">Precio</th>
                    <th class="py-3 px-4 text-left">Stock</th>
                    <th class="py-3 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4">{{ $producto->id }}</td>
                    <td class="py-3 px-4">{{ $producto->nombre }}</td>
                    <td class="py-3 px-4">{{ $producto->descripcion ?: 'Sin descripción' }}</td>
                    <td class="py-3 px-4">${{ number_format($producto->precio, 2) }}</td>
                    <td class="py-3 px-4">{{ $producto->stock }}</td>
                    <td class="py-3 px-4">
                        <a href="/productos/{{ $producto->id }}" class="text-blue-500 hover:text-blue-700 mr-2">Ver</a>
                        <a href="/productos/{{ $producto->id }}/edit" class="text-yellow-500 hover:text-yellow-700 mr-2">Editar</a>
                        <form action="/productos/{{ $producto->id }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Estás seguro?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection