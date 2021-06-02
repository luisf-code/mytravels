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
                    <th width="20%">&nbsp;</th>
                    <th width="20%">&nbsp;</th>
                </tr>
            </thead>
            @foreach( $query AS $d)
            <tbody class="text-center">
                <tr>
                    <td>{{ $d -> id }}</td>
                    <td>{{ $d -> titulo }}</td>
                    <td>{{ $d -> precio }}</td>
                    <td><a href="{{ url('recorridos-crud/'.$d -> id) }}" style="text-decoration: none;">Ver</a></td>
                    <td><a href="{{ url('recorridos-crud/'.$d -> id.'/edit') }}" style="text-decoration: none;">Actualizar</a></td>
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
        </table>

    </div>

@endSection
