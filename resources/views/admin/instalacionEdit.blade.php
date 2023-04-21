@extends('layouts.master')

@section('title')
   Editar Registro de Instalación | Micromedición

@endsection


@section('content')
<div class="conteiner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="editRole">Editar Registro de Instalación.</h4>
                </div>
                <div class="card-body">
                    <div class="rowPrueba">
                        <div class="col-md-6">
                            <form action="/installation-update/{{ $instalacion->id }}" method="POST">
                            {{ csrf_field() }}    
                            {{ method_field('PUT') }}

                                <div class="form-group">
                                        <label>Id Usuario</label>
                                        <input type="text" name="idUsuario" value="{{ $instalacion->idUsuario }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Id Dispositivo</label>
                                    <input type="text" name="idDispositivo" value="{{ $instalacion->idDispositivo }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Diámetro de tubería</label>
                                    <input type="text" name="diametroTuberia" value="{{ $instalacion->diametroTuberia }}" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-success">Actualizar</button>
                                <a href="/instalacion-register" class="btn btn-danger">Cancelar</a>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection