<div >
    <div class="row">


    </div>
    <div class="row mt-5">
        <div class="col-md-9">
            <div class="row">
                @foreach ($productos ?? [] as $producto)
                @if ($producto->stock > 0)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">{!! nl2br(e($producto->descripcion)) !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group mb-3">
                                    <form action="{{ route('cart.store', $producto->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $producto->id }}">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                                            <i class="fa-solid fa-cart-plus"></i> Añadir al carrito
                                        </button>
                                    </form>
                                </div>
                                <div class="text-right">
                                    <small class="text-muted">{{ $producto->stock }} disponibles</small>
                                    <br>
                                    <small class="text-muted">Precio: ${{ $producto->precio }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class="col-md-3">
            <div class="mb-3 d-flex align-items-end">
                <form wire:submit.prevent="filterProducts" class="d-flex">
                    <label for="categoria" class="form-label me-2">Categoria</label>
                    <select wire:model="categoria_id" class="form-select form-select-lg me-2" id="categoria">
                        <option value="" selected>Todas</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-success">Buscar</button>
                </form>
            </div>
        </div>
    </div>

</div>