@extends ("plantilla")
@section ("content")
<?php
$msg = '';
if(session('msg'))
    $msg = '<h4>'.session('msg').'</h4>';

?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Login</h1>
            {!! $msg !!}
                <form method="post" action="{{ url('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Ingrese su email">
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <small id="emailHelp" class="form-text text-muted">{{ $errors->first('password') }}</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>
</div>

@endSection
