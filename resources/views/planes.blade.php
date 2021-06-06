@extends ("plantilla")
@section ("content")

<div class="container">

    @if (session('msg'))
    <div class="alert {{ session('class') }} mt-0.1 mb-4">
        {{ session('msg') }}
    </div>
    @endif

    <h2>Planes</h2>
    <h5>Descubre tu plan ideal</h5>
    <div>
        <div class="container__grid">
            @foreach($queryDA AS $p)
                <div class="item__grid ">
                    <div class="recorrido-img">
                        <img src="../../.././img/p1.jpeg" alt="planes turisicos">
                    </div>
                    <div class="recorridos mt-2">
                        <h5 style="margin-bottom: 15px;"><b>{{ $p -> titulo }}</b></h5>
                        <p><b>Desde: ${{ $p -> valorCU }}</b></p>
                        <p style="margin-top: -9px;"><b>Por persona</b></p>
                        @if($p -> bloqueo == 0)
                            <a href="{{ url('planes/'. $p -> url) }}" class="btn btn-primary">Ver plan</a>
                        @endif
                        @if($p -> bloqueo == 1)
                            <div class="alert alert-danger">
                                <h6>Lo sentimos, de momento no contamos con este plan.</h6>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <br>
    <div>
        <h3>Tours</h3>
        <h4>Estos son nuestros recorridos</h4>
        <div class="container__grid">
            @foreach($queryR AS $qR)
                <div class="item__grid ">
                    <div class="recorrido-img">
                        <img src="../../.././img/show.jpeg" alt="recorrido">
                    </div>
                    <div class="recorridos mt-2">
                        <h5><strong><i>{{ $qR -> id }}</i> {{ $qR -> titulo }}</strong></h5>
                        <h5><strong>${{ $qR -> precio }}</strong></h5>
                        <div class="optiones-recorridos">
                            @if($qR -> bloqueo == 0)
                                <a href="{{ url('planes/tours/'. $qR -> url) }}" class="btn btn-success mb-2 hola">Ver más</strong></a>
                            @endif
                            @if($qR -> bloqueo == 1)
                            <div class="alert alert-danger">
                                <p>Lo sentimos, este recorrido </br> no esta disponible de momento. </p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <br>
    <h4>Plus</h4>
    <h7>Agranda tu plan</h7>
    <div class="row">
        @foreach($adicional AS $a)
            <div class="col-sm-6" style="width: 20rem;">
                <div class="card text-center">
                    <img src="{{ $a[0] }}" class="card-img-top" alt="plus">
                    <div class="card-body">
                        <h5 class="card-title">{{$a[1]}}</h5>
                        <p class="card-text">{{$a[2]}}</p>
                        <a href="#" class="btn btn-secondary">Agregar plus</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endSection

