@extends('layouts.master')

@section('title')
    Historial | Micromedición

@endsection


@section('content')
        
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    <i class="bi bi-clipboard2-data"></i>
                    Historial
                </h2>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>Id</th>  
                                <th>Id Usuario</th>
                                <th>Id Dispositivo</th>
                                <th>Diámetro de tubería</th>
                                <th>Ubicación de dispositivo</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>

@endsection


@section('scripts')

@endsection