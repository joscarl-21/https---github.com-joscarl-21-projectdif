@extends('layouts.app')
@section('content')
<form action="{{ url('/eventos') }}"  method="post">
 @csrf

 @include('eventos.form',['modo'=>'Crear'])
 </form>
 @endsection