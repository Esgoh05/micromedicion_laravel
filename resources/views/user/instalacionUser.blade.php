@extends('layouts.master')

@section('title')
    Devices | Micromedicion

@endsection


@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Registered Devices</h4>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="installationDatatable" class="table">
                    <thead class=" text-primary">
                      <th>Device Id</th>
                      <th>Pipe Size</th>
                      <th>SSID</th>
                      <th>WiFi Password</th>
                      <th>Device Position</th>
                      <th>EDIT</th>
                    </thead>
                    <tbody>
                      @foreach($instalacion as $row)
                      <tr>
                        <td>{{ $row->idDispositivo }}</td>
                        <td>{{ $row->diametroTuberia }}</td>
                        <td>{{ $row->ssid }}</td>
                        <td>{{ $row->passwordSsid }}</td>
                        <td>{{ $row->ubicacionDispositivo }}</td>
                        <td>
                            <a href="/edit-installation-user/{{ $row->id }}" class="btn btn-success">EDIT</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
</div>

@endsection


@section('scripts')
  <script>
    $(document).ready( function() {
    $('#installationDatatable').DataTable();
    });
  </script>

@endsection