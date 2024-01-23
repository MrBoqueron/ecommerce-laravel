<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Productos;
use App\Models\Categoria;

class ProductFilter extends Component
{
    public $productos;
    public $categorias;
    public $categoria_id;


    public function filterProducts()
    {
        // Construir la consulta de productos
        $query = Productos::query();

        // Filtrar por categoría si se ha seleccionado una
        if ($this->categoria_id) {
            $query->where('id_categoria', $this->categoria_id);
        }

        // Obtener todos los productos
        $this->productos = $query->orderBy('id_categoria', 'asc')->get();
    }

    public function render()
    {
        // Obtener todas las categorías
        $this->categorias = Categoria::all();

        // Llamar al método para filtrar los productos
        $this->filterProducts();

        // Renderizar la vista
        return view('livewire.product-filter');
    }
}
