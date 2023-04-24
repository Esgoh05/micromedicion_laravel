@extends('layouts.master')

@section('title')
    Dispositivos | Micromedición

@endsection


@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo dispositivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="../../assets/img/gota_welcome.png" alt="Gota Welcome" class="pngGotaWelcome">
        <form action="/save-new-device" method="POST">
        {{ csrf_field() }} 

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Dirección Mac:</label>
            <input type="text" name="direccionMac" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Modelo del sensor:</label>
            <input type="text" name="modeloSensor" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Factor K:</label>
            <input type="text" name="factorK" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label>Estado del dispositivo:</label>
            <select name="status_dispositivo" class="form-control">
                <option value="1">Activo</option>
                <option value="2">Instalado</option>
                <option value="3">Baja</option>
            </select>
          </div>
          </div>
          <div class="modal-footer border-white">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Delete-->
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Usted está seguro de querer eliminar este dispositivo?</h5>
        <!--Add data-ds-dismiss="modal". Version 5 de bootstrap.
             And aria-hidden="true". -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="delete_modal" method="post">
        {{  csrf_field()  }}
        {{  method_field('DELETE')  }}
      <div class="modal-body">
        <input type="hidden" id="delete">
        <img class="pngGotitaStop" src="../../assets/img/gotita_stop.jpg" alt="">
      </div>
      <div class="modal-footer border-white">
        <!--Add data-ds-dismiss="modal". Version 5 de bootstrap -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Si, eliminar.</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Delete -->

<div class="row">
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">
                  <i class="bi bi-cpu"></i>
                  Dispositivos
                </h2>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                  <i class="bi bi-plus"></i>
                  Agregar nuevo dispositivo
                </button>
              </div>  
            </div>
          </div>
        </div>

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title">Dispositivos registrados</h2>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="deviceDatatable" class="table">
                    <thead class=" text-primary">
                      <th>Id</th>  
                      <th>Dirección Mac</th>
                      <th>Modelo del sensor</th>
                      <th>Factor K</th>
                      <th>Estado del dispositivo</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </thead>
                    <tbody>
                      @foreach($devices as $row)
                      <tr>
                        <td>{{ $row->id }}</td>  
                        <td>{{ $row->direccionMac }}</td>
                        <td>{{ $row->modeloSensor }}</td>
                        <td>{{ $row->factorK }}</td>
                        @switch(true)
                            @case($row->status_dispositivo == 1)
                            <td>
                              Activo
                              <i class="bi bi-circle-fill"></i>
                            </td>
                            @break

                            @case($row->status_dispositivo == 2)
                            <td>
                              Instalado
                              <i class="biHose bi-house-check-fill"></i>
                            </td>
                                @break
                        @endswitch
                        <td>
                            <a href="/devices-edit/{{ $row->id }}" class="btn btn-success">
                              <i class="bi bi-pencil"></i>
                              Editar
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-danger deletebtn">
                              <i class="bi bi-trash3"></i>
                              Eliminar
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
      $('#deviceDatatable').DataTable();
  });

  var table = $('#deviceDatatable').DataTable({
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

  $(document).ready( function(){
      $('#deviceDatatable').on('click','.deletebtn', function(){
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
          return $(this).text();
        }).get();
        console.log(data);
        $('#delete').val(data[0]);
        $('#delete_modal').attr('action', '/device-delete/'+data[0]);
        $('#deletemodalpop').modal('show');

      });
  });
</script>

@endsection