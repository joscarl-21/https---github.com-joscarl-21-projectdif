@extends('layouts.app')

@section('content')
@if(Session::has('mensaje'))
<div class="alert alert-success" role="alert">
    {{ Session::get('mensaje') }}
</div>
@endif

@if (Auth::user()->rol=="2")
<div class="mb-3">
    <a href="{{url('eventos/create')}}" class="btn btn-success">Crear un nuevo evento</a>
</div>
@endif

<div class="mb-3">
    <a href="#" class="btn btn-primary">Inicio</a>
</div>

<table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <th>Empleado encargado</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Hora de inicio</th>
            <th>Hora de finalización</th>
            <th>Ubicación</th>
            @if (Auth::user()->rol=="2")
            <th>Acciones</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($eventos as $evento)
        <tr>
            <td>{{$evento->empleado->name}}</td>
            <td>{{$evento->descripcion}}</td>
            <td>{{$evento->fecha}}</td>
            <td>{{$evento->hora_inicio}}</td>
            <td>{{$evento->hora_fin}}</td>
            <td>{{$evento->ubicacion->centro}}</td>
            @if (Auth::user()->rol=="2")
            <td>
                <a href="{{url('/eventos/'.$evento->id.'/edit')}}" class="btn btn-success">Editar</a>
                <form action="{{ url('/eventos/'.$evento->id) }}" class="d-inline" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
