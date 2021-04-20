@extends ("plantilla")
@section ("content")

<div class="container">
    <form action="{{ url('/crud')}}" method="POST">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="mb-3">
                <div class="col-6">
                    <label for="txtdestinos" class="form-label" style="font-weight: 700;" >Nuevo destino</label>
                    <input type="text" class="form-control" id="txtdestinos" name="txtdestinos" placeholder="Ingrese un nuevo destino">
                </div>                
            </div>
            <button type="submit" class="btn btn-secondary">Crear</button>
    </form>
</div>
    
@endSection