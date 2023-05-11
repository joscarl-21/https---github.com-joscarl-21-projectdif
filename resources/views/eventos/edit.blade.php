
@extends('layouts.app')
@section('content')
<form action="{{ url('/eventos/'.$eventos->id )}}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('eventos.form',['modo'=>'Editar'])
</form>

@endsection