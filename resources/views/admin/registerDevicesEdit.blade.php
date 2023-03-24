@extends('layouts.master')

@section('title')
   Edit Device Registered | Micromedicion

@endsection


@section('content')
<div class="conteiner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="editRole">Edit Register Device.</h4>
                </div>
                <div class="card-body">
                    <div class="rowPrueba">
                        <div class="col-md-6">
                            <form action="/register-devices-update/{{ $device->id }}" method="POST">
                            {{ csrf_field() }}    
                            {{ method_field('PUT') }}

                                <div class="form-group">
                                        <label>Dirección Mac</label>
                                        <input type="text" name="direccionMac" value="{{ $device->direccionMac }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Sensor Model</label>
                                    <input type="text" name="modeloSensor" value="{{ $device->modeloSensor }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>K factor</label>
                                    <input type="text" name="factorK" value="{{ $device->factorK }}" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/role-register" class="btn btn-danger">Cancel</a>
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