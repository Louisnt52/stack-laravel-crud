@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Detalle del Producto</h2>
        <a href="/productos" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
            Volver
        </a>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="col-span-2 md:col-span-1">
            <p class="text-gray-600 font-bold">ID:</p>
            <p class="text-gray-800">{{ $producto->id }}</p>
        </div>
        <div class="col-span-2 md:col-span-1">
            <p class="text-gray-600 font-bold">Nombre:</p>
            <p class="text-gray-800">{{ $producto->nombre }}</p>
        </div>
        <div class="col-span-2">
            <p class="text-gray-600 font-bold">Descripción:</p>
            <p class="text-gray-800">{{ $producto->descripcion ?: 'Sin descripción' }}</p>
        </div>
        <div class="col-span-2 md:col-span-1">
            <p class="text-gray-600 font-bold">Precio:</p>
            <p class="text-gray-800">${{ number_format($producto->precio, 2) }}</p>
        </div>
        <div class="col-span-2 md:col-span-1">
            <p class="text-gray-600 font-bold">Stock:</p>
            <p class="text-gray-800">{{ $producto->stock }}</p>
        </div>
        <div class="col-span-2">
            <p class="text-gray-600 font-bold">Fecha de creación:</p>
            <p class="text-gray-800">{{ $producto->created_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="col-span-2">
            <p class="text-gray-600 font-bold">Última actualización:</p>
            <p class="text-gray-800">{{ $producto->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="flex justify-end space-x-3 mt-6">
        <a href="/productos/{{ $producto->id }}/edit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">
            Editar
        </a>
        <form action="/productos/{{ $producto->id }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg" onclick="return confirm('¿Estás seguro?')">
                Eliminar
            </button>
        </form>
    </div>
</div>
@endsection