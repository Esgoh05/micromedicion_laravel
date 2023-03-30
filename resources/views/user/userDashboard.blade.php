@extends('layouts.master')

@section('title')
    Historial | Micromedicion

@endsection


@section('content')
        
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Abstract</h4>
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
                                <th>User Id</th>
                                <th>Device Id</th>
                                <th>Pipe Size</th>
                                <th>Device Position</th>
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