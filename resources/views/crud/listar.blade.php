@extends ("plantilla")
@section ("content")



<div class="container">

    @if (session('msg'))
    <div class="alert {{ session('class') }} mt-0.1 mb-4">
        {{ session('msg') }}
    </div>
    @endif

    <a href="{{ url('crud/create') }}" class="btn btn-primary mb-2">Crear un nuevo destino</a>
    <br>
    <br>
    <table class="table">
        <thead class="text-center">
            <tr>
                <th width="20%" style="font-weight: 900; font-size: larger;">Id</th>
                <th width="20%" style="font-weight: 900; font-size: larger;">Titulo</th>
                <th width="20%">&nbsp;</th>
                <th width="20%">&nbsp;</th>
                <th width="20%">&nbsp;</th>
            </tr>
        </thead>
        @foreach( $query AS $d)
        <tbody class="text-center">
            <tr>
                <td>{{ $d -> id }}</td>
                <td>{{ $d -> titulo }}</td>
                <td><a href="{{ url('crud/'.$d -> id) }}" style="text-decoration: none;">Ver</a></td>
                {{-- <td>
                    <!-- <button onclick=(hola({{$d}})) id="brayan" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> -->
                        ver
                    </button>
                </td> --}}
                <td><a href="{{ url('crud/'.$d -> id.'/edit') }}" style="text-decoration: none;">Actualizar</a></td>
                <td>
                    <form method="POST" action="{{ url('crud/'.$d -> id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
                </div>
            </div>
        </div>
    </table>

</div>

<script>
    const $BRAYAN = document.querySelector("#brayan");
    $BRAYAN.addEventListener(("click"), () => {
        console.log("click")
    })

    function hola(ja){
        console.log(ja)
    }
</script>

@endSection
