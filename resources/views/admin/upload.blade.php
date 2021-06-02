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
        {!! $msg !!}
            <form method="post" action="{{ url('upload') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label">Imágenes</label>
                    <input class="form-control" name="files[]" type="file" multiple accept="image/png, image/jpeg" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

@endSection
