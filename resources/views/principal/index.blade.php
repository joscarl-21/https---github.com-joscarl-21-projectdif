@extends('layouts.app')

@section('content')

<main>
  <div class="container mt-3">
   <style>
    .card{
        flex: 50%;
        border: 5px solid black
        margin: 10px;
        display: flex;
        flex-direction: column;
    }
    img {
        width: 45%;
        text-align: center;
    }
    .head{
        padding-top: 5px;

    }
    .btn{
        display: flex;
        justify-content: center;
        border-radius: 30px;
    }
    .title{
        text-align: center;
        }
   </style>
    <h1 class="title">Intranet de DIF Zapopan</h1>

    <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="text-center head">
                        <img  src="/img/cards/calendario.png" alt="Eventos"> 
                    </div> 
                    <div class="card-body">
                     <h5 class="card-title">Eventos</h5>
                     <p class="card-text">Aqui se pueden ver todos los eventos</p>
                     <a href="{{route('eventos.index')}}" class="btn btn-primary" target="_blank">ir</a>
                    </div>
                 </div>
            </div>
            
        <div class="col-4">
            <div class="card">
                <div class="text-center head">
                    <img src="/img/cards/circular.png" alt="">
                </div>
                <div class="card-body">
                 <h5 class="card-title">Circulares</h5>
                 <p class="card-text">Aqui se pueden ver todos los Circulares</p>
                 <a target="_blank" href="{{route('circulares.index')}}" class="btn btn-primary">ir</a>
                </div>
             </div>
        </div>
           
        <div class="col-4">
            <div class="card">
                <div class="text-center head">
                    <img src="/img/cards/gestion.png" alt="">
                </div>
                <div class="card-body">
                 <h5 class="card-title">Plataforma de Gestión</h5>
                 <p class="card-text">Acceder a plataforma de Gestión</p>
                 <a href="http://servicios.difzapopan.gob.mx/Lab/" class="btn btn-primary" target="_blank">ir</a>
                </div>
             </div>
        </div>
    </div>        
<div class="row mt-3">

    <div class="col-4">
        <div class="card">
            <div class="text-center head">
                <img src="/img/cards/expediente.png" alt="">
            </div>
            <div class="card-body">
             <h5 class="card-title">SISE</h5>
             <p class="card-text">Acceder a plataforma SISE</p>
             <a href="http://sise.difzapopan.gob.mx/#/inicio" class="btn btn-primary" target="_blank">ir</a>
            </div>
         </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="text-center head">
                <img src="/img/cards/calle.png" alt="">
            </div>
            <div class="card-body">
             <h5 class="card-title">Situación de calle</h5>
             <p class="card-text">Acceder a plataforma</p>
             <a href="https://situaciondecalle.difzapopan.gob.mx/#/auth/login" class="btn btn-primary" target="_blank">ir</a>
            </div>
         </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="text-center head">
                <img src="/img/cards/cobro.png" alt="">
            </div>
            <div class="card-body">
             <h5 class="card-title">Ingresos</h5>
             <p class="card-text">Acceder a plataforma</p>
             <a href="http://ingresos.difzapopan.gob.mx/login" class="btn btn-primary" target="_blank">ir</a>
            </div>
         </div>
    </div>

</div>
        
              

    
    
  </div>
  </main>
@endsection
