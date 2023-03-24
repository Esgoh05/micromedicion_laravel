@extends('layouts.master')

@section('title')
   Edit Installation's Registry | Micromedicion

@endsection


@section('content')
<div class="conteiner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="editRole">Edit Installation's Registry.</h4>
                </div>
                <div class="card-body">
                    <div class="rowPrueba">
                        <div class="col-md-6">
                            <form action="/installation-update/{{ $instalacion->id }}" method="POST">
                            {{ csrf_field() }}    
                            {{ method_field('PUT') }}

                                <div class="form-group">
                                        <label>User Id</label>
                                        <input type="text" name="idUsuario" value="{{ $instalacion->idUsuario }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Device Id</label>
                                    <input type="text" name="idDispositivo" value="{{ $instalacion->idDispositivo }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Pipe Size</label>
                                    <input type="text" name="diametroTuberia" value="{{ $instalacion->diametroTuberia }}" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/instalacion-register" class="btn btn-danger">Cancel</a>
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