@extends ("plantilla")
@section ("content")

<div class="container">
    <form action="{{ url( '/destinosAlojamientos-crud/'.$query -> id ) }}" method="POST">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            @method('PUT')
            <div class="mb-3">
                <div class="col-6">

                    <label for="txtDestiAloja" class="form-label" style="font-weight: 700; margin-bottom: 2px;" >Plan</label>
                    <input type="text" class="form-control" id="txtDestiAloja" name="txtDestiAloja" placeholder="Ingrese un nuevo plan" value="{{ $query -> titulo }}">

                    <label for="txtDescripcion" class="form-label mt-2" style="font-weight: 700; margin-bottom: 2px;" >Descripcion</label>
                    <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="Ingrese una descripcion" value="{{ $query -> descripcion }}">

                    <label for="txtPrecio" class="form-label mt-2" style="font-weight: 700; margin-bottom: 2px;" >Precio</label>
                    <input type="text" class="form-control" id="txtPrecio" name="txtPrecio" placeholder="Ingrese un precio" value="{{ $query -> valorCU }}">

                    <label for="txtDestino" class="form-label" style="font-weight: 700; margin-bottom: 2px;" >Destino</label>
                    <select class="form-select" aria-label="Default select example" name="txtDestino">
                        @foreach($destinoActual AS $d)
                            <option value="{{ $d -> id}}" selected>{{ $d -> titulo }}</option>
                        @endforeach
                        @foreach($destino AS $d)
                            <option value={{ $d -> id }}>{{ $d -> titulo }}</option>
                        @endforeach
                    </select>

                    <label for="txtAlojamiento" class="form-label" style="font-weight: 700; margin-bottom: 2px;" >Alojamiento</label>
                    <select class="form-select" aria-label="Default select example" name="txtAlojamiento">
                        @foreach($alojamientoActual AS $a)
                            <option value="{{ $a -> id}}" selected>{{ $a -> titulo }}</option>
                        @endforeach
                        @foreach($alojamiento AS $a)
                            <option value={{ $a -> id }}>{{ $a -> titulo }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Actualizar</button>
    </form>
</div>

@endSection
