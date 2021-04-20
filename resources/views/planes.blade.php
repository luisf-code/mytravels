@extends ("plantilla")
@section ("content")

<div class="container">
    <h2>Planes</h2>
    <h5>Descubre tu plan ideal</h5>
    <div>
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
    </div> 
    <br>
    <h2>Plus</h2>
    <h6>Agranda tu plan</h6>
    <div class="row">
        @foreach($adicional AS $a)
            <div class="col-sm-6" style="width: 20rem;">
                <div class="card text-center">
                <img src="{{ $a[0] }}" class="card-img-top" alt="plus">
                <div class="card-body">
                    <h5 class="card-title">{{$a[1]}}</h5>
                    <p class="card-text">{{$a[2]}}</p>
                    <a href="#" class="btn btn-info">Agregar plus</a>
                </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endSection

