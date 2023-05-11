@extends('layouts.app')
@section('content')

<form action="{{url('/circulares/'.$circulares->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('circulares.form',['modo'=>'Editar'])

</form>

@endsection