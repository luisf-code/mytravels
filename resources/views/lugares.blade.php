@extends ("plantilla")
@section ("content")
<div class="container">
    <h2>Lugares</h2>
    @foreach($lugares AS $l)
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="font-size: xx-small;">
                <div class="carousel-item active">
                    <img src="{{ $l[0]  }}" class="d-block w-100" alt="atractivos turisticos">
                    <div class="carousel-caption d-none d-md-block">
                        <h4 style="color: black;">{{ $l[1]  }}</h4>
                        <p style="color: black;font-size:15px;"><strong>{{ $l[2]  }}</strong></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ $l[3]  }}" class="d-block w-100" alt="atractivos turisticos">
                    <div class="carousel-caption d-none d-md-block">
                        <h4 style="color: black;">{{ $l[4]  }}</h4>
                        <p style="color: black;font-size:15px;"><strong>{{ $l[5]  }}</strong></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ $l[6]  }}" class="d-block w-100" alt="atractivos turisticos">
                    <div class="carousel-caption d-none d-md-block">
                        <h4 style="color: black;">{{ $l[7]  }}</h4>
                        <p style="font-size:15px;"><strong>{{ $l[8] }}</strong></p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div><br>
    @endforeach

    <div class="row">
        <div class="col-6">
            @foreach($fincas AS $f)  
                <p style="font-size: large;" class="text-center"><strong>Fincas</strong></p> 
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="{{ $f[0]  }}" class="d-block w-100" alt="Alojamiento">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src= "{{ $f[1] }}" class="d-block w-100" alt="Alojamiento">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $f[2] }}" class="d-block w-100" alt="Alojamiento">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>     
            @endforeach
        </div>
        <div class="col-6">
            @foreach($hoteles AS $h) 
                <p style="font-size: large;" class="text-center"><strong>Hoteles</strong></p> 
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ $h[0] }}" class="d-block w-100" alt="Alojamiento">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $h[1] }}" class="d-block w-100" alt="Alojamiento">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $h[2] }}" class="d-block w-100" alt="Alojamiento">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>      
            @endforeach
        </div>
    </div> 
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

@endSection