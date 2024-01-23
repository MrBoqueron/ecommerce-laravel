<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    use HasFactory;

    protected $table = 'direcciones_usuarios';

    protected $fillable = [
        'id',
        'pais',
        'ciudad',
        'calle',
        'numero',
        'cp',
        'id_usuario',
        'provincia'
    ];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

}
