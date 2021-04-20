@extends ("plantilla")
@section ("content")
<div class="container">
    <div>
        <div>
            <h2>¿Quiénes somos?</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod, orci conubia viverra vel placerat class erat lacinia dictum, leo accumsan litora aliquam habitasse aliquet donec mattis. Pretium commodo mus eleifend vivamus suspendisse vehicula accumsan libero metus nam eget lobortis, sagittis iaculis facilisi dis in suscipit volutpat fringilla turpis id class. Pretium tempus felis odio nullam commodo rutrum class in porta, tristique elementum laoreet ultricies scelerisque condimentum curae hendrerit, ullamcorper volutpat imperdiet ante tellus facilisis feugiat morbi. Magna diam fusce penatibus montes massa porta in leo ante egestas eros habitant id, ornare proin nec conubia bibendum etiam curabitur vestibulum suspendisse cum scelerisque. Ullamcorper congue elementum cras neque mauris maecenas torquent, tellus suscipit senectus imperdiet phasellus risus diam, commodo eros purus convallis a aliquet.</p>
        </div>
        <div>
            <h2>¿Por qué viajar con nosotros?</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, scelerisque sollicitudin posuere tincidunt potenti. Aptent vitae sociosqu nec dis facilisi eu feugiat senectus euismod, orci conubia viverra vel placerat class erat lacinia dictum, leo accumsan litora aliquam habitasse aliquet donec mattis. Pretium commodo mus eleifend vivamus suspendisse vehicula accumsan libero metus nam eget lobortis, sagittis iaculis facilisi dis in suscipit volutpat fringilla turpis id class. Pretium tempus felis odio nullam commodo rutrum class in porta, tristique elementum laoreet ultricies scelerisque condimentum curae hendrerit, ullamcorper volutpat imperdiet ante tellus facilisis feugiat morbi. Magna diam fusce penatibus montes massa porta in leo ante egestas eros habitant id, ornare proin nec conubia bibendum etiam curabitur vestibulum suspendisse cum scelerisque. Ullamcorper congue elementum cras neque mauris maecenas torquent, tellus suscipit senectus imperdiet phasellus risus diam, commodo eros purus convallis a aliquet.</p>
        </div>
        <div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../../.././img/v1.jpg" class="d-block w-100" alt="atractivos turisticos">
                    </div>
                    <div class="carousel-item">
                        <img src="../../.././img/v2.jpg" class="d-block w-100" alt="atractivos turisticos">
                    </div>
                    <div class="carousel-item">
                        <img src="../../.././img/v3.jpg" class="d-block w-100" alt="atractivos turisticos">
                    </div>
                    <div class="carousel-item">
                        <img src="../../.././img/v4.jpg" class="d-block w-100" alt="atractivos turisticos">
                    </div>
                    <div class="carousel-item">
                        <img src="../../.././img/v5.jpg" class="d-block w-100" alt="atractivos turisticos">
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
        </div>
    </div>
    <div>

        <!-- @foreach($query AS $q)
                    <p>{{ $q -> id." ".$q -> titulo }}</p>
                @endforeach -->

        <!-- @foreach($queryDA AS $q)
        <p>{{ $q -> id." ".$q -> titulo." ".$q -> valorCU }}</p>
        @endforeach
        <br> -->
        <!-- @foreach($queryTA AS $q)
                    <p>{{ $q -> id." ".$q -> titulo }}</p>
        @endforeach -->

        <br>
        <h2>Testimonios</h2>
        <div class="row">
            @foreach($testimonios AS $t)
            <div class="col-4">
                <div class="card mt-4" style="width: 18rem;">
                    <img src="{{ $t[0] }}" class="card-img-top" alt="perfiles de los testimonios">
                    <div class="card-body">
                        <h5 class="card-title">{{ $t[1] }}</h5>
                        <p class="card-text">{{ $t[2] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br>
    <form id="form" action="{{ url('/presupuesto') }}" method="POST">
        @csrf
        <label for="dinero">Ingresa tu presupuesto</label>
        <input type="number" name="dinero" required><br>
        <label for="alojamiento" class="mt-3">¿Qué tipo de plan deseas?</label>
        <select name="alojamiento" required>
            <option value="">Selección</option>
            @foreach($queryTA AS $q)
                <option value="{{ $q -> titulo }}">{{ $q -> titulo }}</option>
            @endforeach
        </select><br>
        <button id="btn" type="submit" class="btn btn-dark">Buscar</button>
    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endSection