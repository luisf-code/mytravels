@extends ("plantilla")
@section ("content")

<div class="container">
    <form action="{{ url('/destinosAlojamientos-crud')}}" method="POST">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="mb-3">
                <div class="col-6">
                    <label for="txtDestiAloja" class="form-label" style="font-weight: 700; margin-bottom: 2px;" >Nuevo destino</label>
                    <input type="text" class="form-control" id="txtDestiAloja" name="txtDestiAloja" placeholder="Ingrese un nuevo destino" required>

                    <label for="txtDescripcion" class="form-label mt-2" style="font-weight: 700; margin-bottom: 2px;" >Descripcion</label>
                    <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Ingrese una descripcion" required>

                    <label for="txtPrecio" class="form-label mt-2" style="font-weight: 700; margin-bottom: 2px;" >Precio</label>
                    <input type="text" class="form-control mb-2" id="txtPrecio" name="txtPrecio" placeholder="Ingrese un precio" required>

                    <label for="txtDestino" class="form-label" style="font-weight: 700; margin-bottom: 2px;" >Destino</label>
                    <select class="form-select" aria-label="Default select example" name="txtDestino">
                        <option value="" selected></option>
                        @foreach($destino AS $d)
                            <option value={{ $d -> id }}>{{ $d -> titulo }}</option>
                        @endforeach
                    </select>

                    <label for="txtAlojamiento" class="form-label" style="font-weight: 700; margin-bottom: 2px;" >Alojamiento</label>
                    <select class="form-select" aria-label="Default select example" name="txtAlojamiento">
                        <option value="" selected></option>
                        @foreach($alojamiento AS $a)
                            <option value={{ $a -> id }}>{{ $a -> titulo }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Crear</button>
    </form>
</div>

@endSection
