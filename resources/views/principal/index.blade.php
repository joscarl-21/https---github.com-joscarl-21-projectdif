@extends('layouts.app')

@section('content')

<main>
  <div class="container mt-3">
   <style>
    .card {
        flex: 50%;
        border: 5px solid whitesmoke;
        margin: 10px;
        display: flex;
        flex-direction: column;
    }
    img {
        width: 45%;
        text-align: center;
    }
    .head {
        padding-top: 5px;
    }
    .btn {
        display: flex;
        justify-content: center;
        border-radius: 30px;
    }
    .title {
        text-align: center;
        margin-bottom: 20px;
        font-size: 2rem;
        color: #333;
    }
   </style>
    <h1 class="title">Intranet de DIF Zapopan</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="text-center head">
                    <img src="/img/cards/calendario.png" alt="Eventos"> 
                </div> 
                <div class="card-body">
                    <h5 class="card-title">Eventos</h5>
                    <p class="card-text">Aquí se pueden ver todos los eventos</p>
                    <a href="{{route('eventos.index')}}" class="btn btn-primary" target="_blank">Ir</a>
                </div>
            </div>
        </div>
            
        <div class="col-md-4">
            <div class="card">
                <div class="text-center head">
                    <img src="/img/cards/circular.png" alt="Circulares">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Circulares</h5>
                    <p class="card-text">Aquí se pueden ver todas las circulares</p>
                    <a target="_blank" href="{{route('circulares.index')}}" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
           
        <div class="col-md-4">
            <div class="card">
                <div class="text-center head">
                    <img src="/img/cards/gestion.png" alt="Plataforma de Gestión">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Plataforma de Gestión</h5>
                    <p class="card-text">Acceder a la plataforma de Gestión</p>
                    <a href="http://servicios.difzapopan.gob.mx/Lab/" class="btn btn-primary" target="_blank">Ir</a>
                </div>
            </div>
        </div>
    </div>        
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card">
                <div class="text-center head">
                    <img src="/img/cards/expediente.png" alt="SISE">
                </div>
                <div class="card-body">
                    <h5 class="card-title">SISE</h5>
                    <p class="card-text">Acceder a la plataforma SISE</p>
                    <a href="http://sise.difzapopan.gob.mx/#/inicio" class="btn btn-primary" target="_blank">Ir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="text-center head">
                    <img src="/img/cards/calle.png" alt="Situación de calle">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Situación de calle</h5>
                    <p class="card-text">Acceder a la plataforma</p>
                    <a href="https://situaciondecalle.difzapopan.gob.mx/#/auth/login" class="btn btn-primary" target="_blank">Ir</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="text-center head">
                    <img src="/img/cards/cobro.png" alt="Ingresos">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Ingresos</h5>
                    <p class="card-text">Acceder a la plataforma</p>
                    <a href="http://ingresos.difzapopan.gob.mx/login" class="btn btn-primary" target="_blank">Ir</a>
                </div>
            </div>
        </div>
    </div>
  </div>
</main>
@endsection
