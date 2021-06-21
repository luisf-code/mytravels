@extends ("plantilla")
@section ("content")

<div class="container">
    <form action="{{ url('/recorridos-crud')}}" method="POST" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="mb-3">
                <div class="col-6">
                    <label for="txtRecorrido" class="form-label" style="font-weight: 700; margin-bottom: 2px;" >Nuevo recorrido</label>
                    <input type="text" class="form-control" id="txtRecorrido" name="txtRecorrido" placeholder="Ingrese un nuevo recorrido" required>

                    <label for="txtDescripcion" class="form-label mt-2" style="font-weight: 700; margin-bottom: 2px;" >Descripcion</label>
                    <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Ingrese una descripcion" required>

                    <label for="txtPrecio" class="form-label mt-2" style="font-weight: 700; margin-bottom: 2px;" >Precio</label>
                    <input type="text" class="form-control mb-2" id="txtPrecio" name="txtPrecio" placeholder="Ingrese un precio" required>

                    <label for="txtDestiAloja" class="form-label" style="font-weight: 700; margin-bottom: 2px;" >Origen</label>
                    <select class="form-select" aria-label="Default select example" name="txtDestiAloja">
                        <option value="" selected>Destino</option>
                        @foreach($data AS $destino)
                            <option value={{ $destino -> id }}>{{ $destino -> titulo }}</option>
                        @endforeach
                    </select>

                    <!-- <div class="form-group">
                        <label">Imagen</label>
                        <input class="form-control" name="txtImagen" type="file" accept="image/jpeg" >
                    </div> -->

                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Crear</button>
    </form>
</div>

@endSection
