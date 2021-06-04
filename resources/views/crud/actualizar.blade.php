@extends ("plantilla")
@section ("content")

<div class="container">
    <form action="{{ url( '/crud/'.$query -> id ) }}" method="POST">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            @method('PUT')
            <div class="mb-3">
                <div class="col-6">
                    <label for="txtdestinos" class="form-label mt-2" style="font-weight: 700; margin-bottom: 2px;" >Nuevo destino</label>
                    <input type="text" class="form-control" id="txtdestinos" name="txtdestinos" placeholder="Ingrese un nuevo destino" value="{{ $query -> titulo }}">
                    <label for="txtDescripcion" class="form-label mt-2" style="font-weight: 700; margin-bottom: 2px;" >Descripcion</label>
                    <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Ingresa una descripcion" value="{{ $query -> descripcion }}">
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Actualizar</button>
    </form>
</div>

@endSection
