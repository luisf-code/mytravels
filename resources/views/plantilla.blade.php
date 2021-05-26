<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My travels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/lightpick.css">
</head>
<body>

    <header class="hero">
        <!-- <div class="container"> -->
            <nav class="nav">
                <a id="logo" href="{{url('/')}}" class="fas fa-map-marked-alt">Travels</a>
                <a href="{{url('/')}}" class="nav__items nav__items--cta">Inicio</a>
                <a href="{{url('/lugares')}}" class="nav__items">Lugares</a>
                <a href="{{url('/planes')}}" class="nav__items">Planes</a>
                <a href="{{url('/contacto')}}" class="nav__items">Contacto</a>
            </nav>
        <!-- </div>            -->
    </header>

        <div class="cuerpo">
            @yield('content')
        </div>

    <footer class="footer">
        <div class="container footer__grid">
            <nav class="nav nav--footer">
                <a class="nav__items nav__items--footer"href="{{url('/')}}">Inicio</a>
                <a class="nav__items nav__items--footer"href="{{url('/lugares')}}">Lugares</a>
                <a class="nav__items nav__items--footer"href="{{url('/planes')}}">Planes</a>
                <a class="nav__items nav__items--footer"href="{{url('/contacto')}}">Contacto</a>
                <a class="nav__items nav__items--footer"href="{{ '/crud','App\Http\Controllers\Crud\crudcontroller' }}">CRUD</a>
            </nav>

            <section class="footer__contact">
                <h3 class="footer__title">Contacto</h3>
                <div class="footer__icons">

                    <span class="footer__container-icons">
                        <a class="fab fa-facebook-f footer__icon" href="#"></a>
                    </span>
                    <span class="footer__container-icons">
                        <a class="fab fa-instagram footer__icon" href="#"></a>
                    </span>
                    <span class="footer__container-icons">
                        <a class="fab fa-whatsapp footer__icon" href="#"></a>
                    </span>

                </div>
            </section>
        </div>
        <h3><small id="f">&#169 Sitio creado por luisf y bsquiroz</small></h3>
    </footer>
    <script src="https://kit.fontawesome.com/183b331691.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="/js/lightpick.js"></script>
    <script src="/js/index.js"></script>
</body>
</html>
