@extends ("plantilla")
@section ("content")

    <div class="container">

        @if (session('msg'))
        <div class="alert {{ session('class') }} mt-0.1 mb-4">
            {{ session('msg') }}
        </div>
        @endif

        <a href="{{ url('recorridos-crud/create') }}" class="btn btn-primary mb-2">Crear un nuevo recorrido</a>
        <br>
        <br>
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th width="20%" style="font-weight: 900; font-size: larger;">Id</th>
                    <th width="20%" style="font-weight: 900; font-size: larger;">Titulo</th>
                    <th width="20%" style="font-weight: 900; font-size: larger;">Precio</th>
                </tr>
            </thead>
            @foreach( $query AS $d)
            <tbody class="text-center">
                <tr>
                    <td>{{ $d -> id }}</td>
                    <td>{{ $d -> titulo }}</td>
                    <td>{{ $d -> precio }}</td>
                    @if($d -> bloqueo == 0)
                        <td>
                        <a href="{{ url('recorridos-crud/'.$d -> id) }}">
                            <button class="btn btn-warning">
                                bloquear
                            </button>
                        </a>
                    </td>
                    @endif
                    @if($d -> bloqueo == 1)
                        <td>
                        <a href="{{ url('recorridos-crud/'.$d -> id) }}">
                            <button class="btn btn-dark">
                                desbloquear
                            </button>
                        </a>
                    </td>
                    @endif
                    <td>
                        <button onclick="hola({{$d}})" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            ver
                        </button>
                    </td>
                    <td><button type="submit" class="btn btn-secondary"><a href="{{ url('recorridos-crud/'.$d -> id.'/edit') }}" style="text-decoration: none; color: white;">Actualizar</a></button></td>
                    <td>
                        <form method="POST" action="{{ url('recorridos-crud/'.$d -> id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="text-center">
                                <img src="../../.././img/p3.jpeg" alt="hola">
                            </div>
                            <br>
                            <p id="descripcion"></p>
                            <b id="precio"></b>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        </table>
    </div>

    <script>
        function hola(params){
            const $TITULO = document.querySelector("#staticBackdropLabel")
            const $DESCRIPCION = document.querySelector("#descripcion")
            const $PRECIO = document.querySelector("#precio")

            $TITULO.textContent = params.titulo;
            $DESCRIPCION.textContent= params.descripcion
            $PRECIO.textContent= `$ ${params.precio}`
        }
    </script>

@endSection
