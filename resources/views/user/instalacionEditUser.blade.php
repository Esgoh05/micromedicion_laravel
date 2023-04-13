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
                            <form action="/installation-update-user/{{ $instalacion->id }}" method="POST">
                            {{ csrf_field() }}    
                            {{ method_field('PUT') }}

                                <div class="form-group">
                                        <label>SSID</label>
                                        <input type="text" name="ssid" value="{{ $instalacion->ssid }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="passwordSsid" value="{{ $instalacion->passwordSsid }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Device Position</label>
                                    <input type="text" name="ubicacionDispositivo" value="{{ $instalacion->ubicacionDispositivo }}" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/user-installation" class="btn btn-danger">Cancel</a>
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