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
    <!-- <table width="100%" class="text-center">
        <tr>
            <td width="20%" style="font-weight: 900; font-size: larger;">Id</td>
            <td width="20%" style="font-weight: 900; font-size: larger;">Titulo</td>
            <td width="20%">&nbsp;</td>
            <td width="20%">&nbsp;</td>
            <td width="20%">&nbsp;</td>
        </tr>
        @foreach( $query AS $d)
        <tr>
            <td>{{ $d -> id }}</td>
            <td>{{ $d -> titulo }}</td>
            <td><a href="{{ url('crud/'.$d -> id) }}" style="text-decoration: none;">Ver</a></td>
            <td><a href="{{ url('crud/'.$d -> id.'/edit') }}" style="text-decoration: none;">Actualizar</a></td>
            <td>
                <form method="POST" action="{{ url('crud/'.$d -> id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table> -->
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
    </table>
    
</div>

@endSection