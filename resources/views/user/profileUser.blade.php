@extends('layouts.master')

@section('title')
    Devices | Micromedicion

@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="contenedor-header">
                <!-- contenedor foto de perfil -->
                <div class="contenedor_izquierda">
                    <div class="card-img">
                    <img class="image-profile" src="../assets/img/fanny.jpg" alt="myfoto">
                    </div>
                </div>
                <div class="contenedor_btn_hover">
                    <a class="btn_update_foto" href="#"><i class="bi bi-camera-fill" style="font-size: 40px"></i></a>
                </div>
                <div class="contenedor_medio">
                    <div class="contenedor_title">
                        <h2> {{ Auth::user()->name }}</h2>
                        <p class="datos"><i class="bi bi-envelope"></i>{{ Auth::user()->email }}</p>
                        <p class="datos"><i class="bi bi-telephone"></i></i>{{ Auth::user()->phone }}</p>
                        <button class="btn btn-success">Edit Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>

@endsection