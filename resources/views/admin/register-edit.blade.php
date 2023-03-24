@extends('layouts.master')

@section('title')
   Edit User Registration| Micromedicion

@endsection


@section('content')
<div class="conteiner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="editRole">Edit User Registration.</h4>
                </div>
                <div class="card-body">
                    <div class="rowPrueba">
                        <div class="col-md-6">
                            <form action="/role-register-update/{{ $users->id }}" method="POST">
                            {{ csrf_field() }}    
                            {{ method_field('PUT') }}

                                <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ $users->name }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ $users->phone }}" class="form-control">
                                </div>

                                <div class="form-group">
                                        <label>Give Role</label>
                                        <select name="usertype" class="form-control">
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ $users->email }}" class="form-control">
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