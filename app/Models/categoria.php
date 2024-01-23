<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nombre', 'created_at', 'updated_at'];

    public function productos()
    {
        return $this->hasMany(Productos::class);
    }

}
