@extends ("plantilla")
@section ("content")

<div class="container">
    <section class="show">
        <h2>Bienvenido al recorrido <span>{{ $consulta[0] -> titulo }}</span></h2>
        <br>
        <div class="row">
            <div class="col-8">
                <div class="img-reco">
                    <img src="../../.././img/show.jpeg" alt="hola">
                </div>
                <br>
                <h5 class="pinta">Descripción</h5>
                <p>{{ $consulta[0] -> descripcion }}</p>
                <h5 class="pinta">Precio</h5>
                <p>${{ $consulta[0] -> precio }}</p>
            </div>
            <div class="col-4">
                <div class="text-center">
                    <form action="{{ url('/planes/tours/'. $consulta[0] -> url) }}" method="POST" style="max-width: 480px; margin: auto;">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">

                        <h4 style="margin-bottom: 3%; margin-top:-4%;">Reserva ahora</h4>

                        <label for="TxtNombre" class="sr-only">Nombre</label>
                        <input type="text" id="TxtNombre" name="TxtNombre" class="form-control mb-2" placeholder="Nombre" required autofocus>

                        <label for="TxtApellido" class="sr-only">Apellido</label>
                        <input type="text" id="TxtApellido" name="TxtApellido" class="form-control mb-2" placeholder="Apellido" required autofocus>

                        <label for="TxtDocumento" class="sr-only">Documento</label>
                        <input type="number" id="TxtDocumento" name="TxtDocumento" class="form-control mb-2" min="0" placeholder="Documento" required autofocus>

                        <label for="TxtCant_personas" class="sr-only">Cantidad de personas</label>
                        <input type="number" id="TxtCant_personas" name="TxtCant_personas" class="form-control mb-2" min="0" placeholder="Cantidad de personas" required autofocus>

                        <input type="text" id="txtDate" name="txtDate" class="form-control mb-2" value="<?php echo date('Y-m-d') ?>" placeholder="Fecha de reserva">

                        <select class="form-select" aria-label="Default select example" name="txtTime">
                            <option value="" selected>Hora de reserva</option>
                            @foreach($hora AS $h)
                            <option value={{ $h[0] }}>{{ $h[1] }}</option>
                            @endforeach
                        </select>

                        <!-- <select name="txtTime" id="txtTime" class="form-control"></select> ---no se deja seleccionar una hora diferente a la que muestra por defecto - esto lo hizo el profesor-->

                        @if($consulta[0] -> bloqueo == 0)
                        <div class="mt-3">
                            <button class="btn btn-lg btn-dark btn-block" style="color: var(--color-primary); font-weight: 900;">Reservar</button>
                        </div>
                        @endif
                        @if($consulta[0] -> bloqueo == 1)
                        <!-- <div class="alert alert-danger mt-3">
                            <p>Lo sentimos, este recorrido </br> no esta disponible de momento. </p>
                        </div> -->
                            <script>
                                window.location.replace('/planes');
                            </script>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endSection
