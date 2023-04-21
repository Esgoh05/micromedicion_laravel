@extends('layouts.master')

@section('title')
    Panel principal | Micromedición

@endsection


@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">
                  <i class="bi bi-people-fill"></i>
                  Usuarios
                </h2>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="usersDatatable">
                  <thead class="text-primary">
                      <th>ID</th>  
                      <th>Nombre</th>
                      <th>Teléfono</th>
                      <th>Tipo de usuario</th>
                      <th>Correo electrónico</th>
                    </thead>
                    <tbody>
                      @foreach($users as $row)
                      <tr>
                        <td>{{ $row->id }}</td>  
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->usertype }}</td>
                        <td>{{ $row->email }}</td>
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
        $('#usersDatatable').DataTable();
      });

      var table = $('#usersDatatable').DataTable({
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