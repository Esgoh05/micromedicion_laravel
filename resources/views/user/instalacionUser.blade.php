@extends('layouts.master')

@section('title')
    Dispositivos | Micromedición

@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h2 class="card-title">
            <i class="bi bi-house-check"></i>
            Dispositivos registrados
          </h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="installationDatatable" class="table">
              <thead class=" text-primary">
                <th>Id Dispositivo</th>
                <th>Diámetro de tubería</th>
                <th>SSID</th>
                <th>Contraseña WiFi</th>
                <th>Ubicación de dispositivo</th>
                <th>Editar</th>
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
                      <a href="/edit-installation-user/{{ $row->id }}" class="btn btn-success">
                        <i class="bi bi-pencil"></i>
                        Editar
                      </a>
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

    var table = $('#installationDatatable').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });

  </script>

@endsection