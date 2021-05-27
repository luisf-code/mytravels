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
        <div class="row">
                @foreach($queryDA AS $p)
                <div class="col-3">
                    <div class="card mt-3" style="width: 18rem;">
                        <img src="../../.././img/p1.jpeg" class="card-img-top" alt="planes turisicos">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p -> titulo }}</h5>
                            <!-- <p class="card-text">{{ $p -> descripcion }}</p> -->
                            <p>Desde</p>
                            <p>{{ $p -> valorCU }}</p>
                            <p>Por persona</p>
                            <a href="{{ url('planes/'. $p -> url) }}" class="btn btn-primary">Ver plan</a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>





    <!-- <div>
        <p></p>
        <div class="row">
            @foreach($planes AS $p)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $p[0] }}" class="card-img-top" alt="planes turisicos">
                    <div class="card-body">
                        <h5 class="card-title">{{ $p[1] }}</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content to build on the card title and make up the bulk of the card's.</p>
                        <p>Desde</p>
                        <p>{{$p[2]}}</p>
                        <p>Por persona</p>
                        <a href="#" class="btn btn-primary">Ver plan</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div> -->
    <!-- <br>
    <br>
    <h3>Recorridos</h3>
    <h6>Escoge el recorrido que más te guste</h6>
    <div>
        <p></p>
        <div class="row">
            @foreach($queryDA AS $qDA)
                <div class="col-3">
                    <div class="card mt-4" style="width: 18rem;" id="recorrido">
                        <img src="../../.././img/destino_alojamiento.jpeg" class="card-img-top" alt="recorridos turisicos">
                        <div class="card-body">
                            <h5 class="card-title">{{ $qDA -> titulo }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content to build on the card title and make up the bulk of the card's.</p>
                            <p>Desde</p>
                            <p>{{ $qDA -> valorCU }}</p>
                            <p>Por persona</p>
                            <a href="#" class="btn btn-info">Ver recorrido</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> -->

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
                        <h5><strong><i>{{ $qR -> id }}</i> {{ $qR -> titulo }}</h5>
                        <h5><strong>${{ $qR -> precio }}</strong></h5>
                        <a href="{{ url('planes/tours/'. $qR -> url) }}" class="btn btn-success mb-2">Ver más</strong></a>
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

