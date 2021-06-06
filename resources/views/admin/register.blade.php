@extends ("plantilla")
@section ("content")
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2 style="margin-top: -30px;">Register</h2>
                <form method="post" action="{{ url('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingrese su email">
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group mt-2">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailName" placeholder="Ingrese su nombre">
                        <small id="emailName" class="form-text text-muted">{{ $errors->first('name') }}</small>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('password') }}</small>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" style="margin-left: 520px;">Enviar</button>
                </form>
        </div>
    </div>
</div>
@endSection



