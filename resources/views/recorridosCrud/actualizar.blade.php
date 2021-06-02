@extends ("plantilla")
@section ("content")

<div class="container">
    <form action="{{ url( '/recorridos-crud/'.$query -> id ) }}" method="POST">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            @method('PUT')
            <div class="mb-3">
                <div class="col-6">

                    <label for="txtRecorrido" class="form-label" style="font-weight: 700; margin-bottom: 2px;" >Recorrido</label>
                    <input type="text" class="form-control" id="txtRecorrido" name="txtRecorrido" placeholder="Actualiza el recorrido" value="{{ $query -> titulo }}">

                    <label for="txtDescripcion" class="form-label mt-2" style="font-weight: 700; margin-bottom: 2px;" >Descripcion</label>
                    <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Ingrese una descripcion" value="{{ $query -> descripcion }}">

                    <label for="txtPrecio" class="form-label mt-2" style="font-weight: 700; margin-bottom: 2px;" >Precio</label>
                    <input type="text" class="form-control" id="txtPrecio" name="txtPrecio" placeholder="Ingrese un precio" value="{{ $query -> precio }}">

                    <label for="txtDestiAloja" class="form-label" style="font-weight: 700; margin-bottom: 2px;" >Origen</label>
                    <select class="form-select" aria-label="Default select example" name="txtDestiAloja">
                        @foreach($luis AS $t)
                            <option value={{ $t -> id }} selected>{{ $t -> titulo }}</option>
                        @endforeach
                        @foreach($destiAloja AS $destino)
                            <option value={{ $destino -> id }}>{{ $destino -> titulo }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Actualizar</button>
    </form>
</div>

@endSection
