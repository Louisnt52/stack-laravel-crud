<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre','descripcion','precio', 'stock'];

    public $timestamps = true;
    
    // Opcional: casts para tipos de datos
    protected $casts = [
        'precio' => 'decimal:2',
        'stock' => 'integer',
    ];
}