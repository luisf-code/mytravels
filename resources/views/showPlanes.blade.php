@extends ("plantilla")
@section ("content")
<div class="container">
        <section class="show">
            <h2>Bienvenido al plan <span style="color: #2980B9;">{{ $consulta[0] -> titulo }}</span></h2>
            <br>
            <div class="row">
                <div class="col-8">
                    <div class="img-reco">
                        <img src="../../.././img/p1.jpeg" alt="plan">
                    </div>
                    <br>
                    <h5 class="pinta2">Descripción</h5>
                    <p>{{ $consulta[0] -> descripcion }}</p>
                    <h5 class="pinta2">Precio</h5>
                    <p>${{ $consulta[0] -> valorCU }}</p>
                </div>
                <div class="col-4">
                    <div class="text-center">
                        <form action="{{ url('/planes/'. $consulta[0] -> url) }}" method="POST" style="max-width: 480px; margin: auto;">
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

                            <select class="form-select mb-2" aria-label="Default select example" name="TxtTransporte" id="select" onchange="abs()">
                                <option value="0">Con transporte</option>
                                <option value="1" selected>Sin transporte</option>
                            </select>

                            <label for="TxtDireccion" class="sr-only">Direccion</label>
                            <input type="text" id="input" name="TxtDireccion" class="form-control mb-2" placeholder="Direccion" required autofocus disabled>

                            <select class="form-select mb-2" aria-label="Default select example" name="TxtSim">
                                <option value="0">Con sim-card</option>
                                <option value="1" selected>Sin sim-card</option>
                            </select>

                            <!-- <input type="text" id="datepicker" name="TxtFecha" class="form-control mb-2" placeholder="Fecha" required autofocus onchange="handleDate()"/>

                            <select class="form-select mt-2" aria-label="Default select example" name="TxtHora">
                                <option value="" selected>Hora de reserva</option>
                                @foreach($hora AS $h)
                                    <option value={{ $h[0] }}>{{ $h[1] }}</option>
                                @endforeach
                            </select> -->

                            <p style="font-size: 9px; text-align: left; color:red">Sim Cards por persona</p>

                            <input type="text" id="txtDate" name="txtDate" class="form-control mb-2" value="<?php echo date('Y-m-d')?>">

                            <select name="txtTime" id="txtTime" class="form-control"></select>

                            @if($consulta[0] -> bloqueo == 0)
                            <div class="mt-3">
                                <button class="btn btn-lg btn-dark btn-block" style="color: #2980B9; font-weight: 900;">Reservar</button>
                            </div>
                            @endif
                            @if($consulta[0] -> bloqueo == 1)
                            <div class="alert alert-danger mt-3">
                                <p>Lo sentimos, este plan </br> no esta disponible de momento. </p>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        const INPUT = document.querySelector("#input");
        const OPTIONS = document.querySelector("#select ");
        function abs() {
            OPTIONS.value === "0"
                ? (INPUT.disabled = false)
                : (INPUT.disabled = true);
        }
    </script>
@endSection
