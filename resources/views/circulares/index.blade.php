@extends('layouts.app')

@section('content')

<main>
  <div class="container mt-3">
   <style>
    .btn {
        border-radius: 30px;
        margin-right: 10px;
    }
    .title {
        text-align: center;
        margin-bottom: 20px;
        font-size: 2rem;
        color: #333;
    }
   </style>
    <h1 class="title">Circulares</h1>

    @if(Session::has('mensaje'))
        <div class="alert alert-info">{{ Session::get('mensaje') }}</div>
    @endif

    @if (Auth::user()->rol == "2")
        <a href="{{ url('circulares/create') }}" class="btn btn-success">Crear un nuevo circular</a>
    @endif
    <br>
    <br>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Id Circular</th>
                <th>Título</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>PDF</th>
                @if (Auth::user()->rol == "2")
                    <th>Acciones</th>
                @endif
            </tr>
        </thead>

        <tbody>
        @foreach ($circulares as $circular)
            <tr>
                <td>{{ $circular->id }}</td>
                <td>{{ $circular->titulo }}</td>
                <td>{{ $circular->fecha }}</td>
                <td>{{ $circular->descripcion }}</td>
                <td>
                    @if ($circular->PDF)
                        <a href="{{ asset('storage/'.$circular->PDF) }}" class="btn btn-primary" target="_blank">Ver PDF</a>
                    @else
                        Sin PDF adjunto
                    @endif
                </td>
                @if (Auth::user()->rol == "2")
                    <td>
                        <a href="{{ url('/circulares/'.$circular->id.'/edit') }}" class="btn btn-success">Editar</a>
                        <form action="{{ url('/circulares/'.$circular->id) }}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger">
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</main>
@endsection
