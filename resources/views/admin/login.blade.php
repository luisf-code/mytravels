@extends ("plantilla")
@section ("content")
<?php
$msg = '';
if(session('msg'))
    $msg = '<h4>'.session('msg').'</h4>';

?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2 style="margin-top: -30px;">Login</h2>
            {!! $msg !!}
                <form method="post" action="{{ url('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingrese su email">
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('password') }}</small>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                        <button type="submit" class="btn btn-primary me-md-2">Aceptar</button>
                        <button type="submit" class="btn btn-primary" ><a href="{{ url('/register') }}" style="text-decoration: none; color: white;">Registrarse</a></button>
                    </div>


                </form>
        </div>
    </div>
</div>

@endSection
