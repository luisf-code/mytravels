@extends ("plantilla")
@section ("content")

<div class="container">
    <form action="{{ url( '/crud/'.$query -> id ) }}" method="POST">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            @method('PUT')
            <div class="mb-3">
                <div class="col-6">
                    <label for="txtdestinos" class="form-label" style="font-weight: 700;" >Nuevo destino</label>
                    <input type="text" class="form-control" id="txtdestinos" name="txtdestinos" placeholder="Ingrese un nuevo destino" value="{{ $query -> titulo }}">
                </div>                
            </div>
            <button type="submit" class="btn btn-secondary">Actualizar</button>
    </form>
</div>
    
@endSection