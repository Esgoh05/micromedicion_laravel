@extends('layouts.master')

@section('title')
   Editar Registro de Usuarios| Micromedición

@endsection


@section('content')
<div class="conteiner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="editRole">Editar Registro de Usuarios.</h4>
                </div>
                <div class="card-body">
                    <div class="rowPrueba">
                        <div class="col-md-6">
                            <form action="/role-register-update/{{ $users->id }}" method="POST">
                            {{ csrf_field() }}    
                            {{ method_field('PUT') }}

                                <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="name" value="{{ $users->name }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input type="text" name="phone" value="{{ $users->phone }}" class="form-control">
                                </div>

                                <div class="form-group">
                                        <label>Asignar tipo de usuario</label>
                                        <select name="usertype" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label>Correo electrónico</label>
                                    <input type="text" name="email" value="{{ $users->email }}" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-success">Actualizar</button>
                                <a href="/role-register" class="btn btn-danger">Cancelar</a>
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