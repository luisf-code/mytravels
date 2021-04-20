@extends ("plantilla")
@section ("content")

    <div class="container">
        <h2>Contacto</h2>

        <div class="text-center">
            <form style="max-width: 480px; margin: auto;">
                <h2 class="h3 mb-3 font-weight-normal">Formulario</h2>

                <label for="nombre" class="sr-only">Nombre</label>
                <input type="text" id="nombre" class="form-control mb-2" placeholder="Nombre" required autofocus>
                <label for="apellido" class="sr-only">Apellido</label>
                <input type="text" id="apellido" class="form-control mb-2" placeholder="Apellido" required autofocus>
                <label for="documento" class="sr-only">Documento</label>
                <input type="number" id="documento" class="form-control mb-2" placeholder="Documento" required autofocus>           
                <label for="emailAddress" class="sr-only">Email address</label>
                <input type="email" id="emailAddress" class="form-control mb-2" placeholder="Correo" required autofocus>
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" placeholder="Contraseña" class="form-control">

                <div class="mt-3">
                    <button class="btn btn-lg btn-dark btn-block">Sign in</button>
                </div>

            </form>
        </div>
    </div>

@endSection