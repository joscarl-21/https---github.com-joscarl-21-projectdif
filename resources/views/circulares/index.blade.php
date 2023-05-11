@extends('layouts.app')
@section('content')
@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif
<a href="{{url('circulares/create')}}"  class="btn btn-success"> Crear un nuevo circular </a>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>id del circular</th>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>PDF</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach ( $circulares as $circulares )
        
    
        <tr>
            <td>{{$circulares->id}}</td>
            <td>{{$circulares->titulo}}</td>
            <td>{{$circulares->fecha}}</td>
            <td>{{$circulares->descripcion}}</td>
            <td>{{$circulares->PDF}}</td>

            <td>
            <a href="{{url('/circulares/'.$circulares->id.'/edit')}}" class="btn btn-success">Editar</a>
             | 
            <form action="{{ url('/circulares/'.$circulares->id) }}" method="post" class="d-inline">
            @csrf
            {{method_field('DELETE') }}
            <input  type="submit" onclick="return confirm(' ¿Quires borrar? ')" value="Borrar" class="btn btn-danger">
            </form>

            </td>
        </tr>

    @endforeach
    </tbody>

</table>
@endsection