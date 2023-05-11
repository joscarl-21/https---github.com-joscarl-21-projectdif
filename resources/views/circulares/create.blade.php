@extends('layouts.app')
@section('content')

<form action="{{ url('/circulares') }}"  method="post" enctype="multipart/form-data">
 @csrf

 @include('circulares.form',['modo'=>'Crear'])

 </form>
 @endsection