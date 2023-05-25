@extends('layouts.app')
@section('content')
@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif

@if (Auth::user()->rol=="2")
<a href="{{url('circulares/create')}}"  class="btn btn-success"> Crear un nuevo circular </a> 
@endif 
<br>
<br>

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>id del circular</th>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>PDF</th>
            @if (Auth::user()->rol=="2")
            <th>Acciones</th>
            @endif 
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
             @if (Auth::user()->rol=="2")
            <td>
                <a href="{{url('/circulares/'.$circulares->id.'/edit')}}" class="btn btn-success">Editar</a>
                 | 
                <form action="{{ url('/circulares/'.$circulares->id) }}" method="post" class="d-inline">
                @csrf
                {{method_field('DELETE') }}
                <input  type="submit" onclick="return confirm(' ¿Quires borrar? ')" value="Borrar" class="btn btn-danger">
                </form>
    
                </td>
            @endif  
        </tr>

    @endforeach
    </tbody>

</table>
@endsection