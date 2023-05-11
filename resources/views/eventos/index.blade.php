@extends('layouts.app')
@section('content')
@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif
<a href="{{url('eventos/create')}}" class="btn btn-success"> Crear un nuevo evento </a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>id empleado</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Hora de inicio</th>
            <th>Hora que finaliza</th>
            <th>Ubicacion</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ( $eventos as $evento )
        
    
        <tr>
            <td>{{$evento->empleado_id}}</td>
            <td>{{$evento->descripcion}}</td>
            <td>{{$evento->fecha}}</td>
            <td>{{$evento->hora_inicio}}</td>
            <td>{{$evento->hora_fin}}</td>
            <td>{{$evento->ubicacion->nombre}}</td>

            <td>
            <a href="{{url('/eventos/'.$evento->id.'/edit')}}" class="btn btn-success">Editar</a>
             | 
            <form action="{{ url('/eventos/'.$evento->id) }}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm(' ¿Quires borrar? ')" value="Borrar">
            </form>

            </td>
        </tr>

    @endforeach
    </tbody>

</table>
@endsection