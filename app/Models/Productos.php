<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'imagen',
        'descripcion',
        'marca',
        'stock',
        'precio',
        'id_categoria',
    ];

    public function id_categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria'); // Ajusta 'id_categoria' según tu estructura de base de datos
    }    
}
