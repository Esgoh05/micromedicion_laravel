@extends('layouts.master')

@section('title')
    Instalación | Micromedición

@endsection


@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva instalación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="../../assets/img/gota_welcome.png" alt="Gota Welcome" class="pngGotaWelcome">
        <form action="/save-new-instalacion" method="POST"  class="needs-validation" novalidate>
        {{ csrf_field() }} 

          <!--Select Id. Modelo:User -->
          <div class="form-group">
            <label for="inputState">Correo electrónico</label>
            <select id="inputState1" name='idUsuario' class="form-control" style="width: 100%" required>
            <option value="" hidden selected>Selecciona un correo electrónico</option>
              @foreach ($userId as $prueba)
              <option value="{{ $prueba->id}}">{{ $prueba->email}} </option> 
              @endforeach 
            </select>
            <div id="validationServer04Feedback" class="invalid-feedback">
              Por favor, selecciona un campo.
            </div>
          </div>
          <!-- End Select Id. Modelo:User -->

          <!--Select Id - modelo dispositivo. Modelo:Device-->
          <div class="form-group">
            <label for="inputState">Id - Modelo de dispositivo</label>
            <select id="inputState" class="form-control" name="idDispositivo" style="width: 100%" required>
              <option value="" hidden selected>Seleccionar...</option>
              
              @foreach ($deviceIds as $deviceId)
                @if($deviceId->status_dispositivo == 1) 
                  <option value="{{ $deviceId->id}}"> {{ $deviceId->id}} -> {{ $deviceId->modeloSensor}}</option> 
                @endif
              @endforeach
              
            </select>
            <div id="validationServer04Feedback" class="invalid-feedback">
              Por favor, selecciona un campo.
            </div>
          </div>
          <!--End. Select Id - modelo dispositivo. Modelo:Device-->

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Diámetro de tubería (pulgadas):</label>
            <input type="text" name="diametroTuberia" class="form-control" id="recipient-name" required
              oninput="this.value = this.value
                .replace(/[^0-9\/ ]/g, '')            // solo números, espacio y diagonal
                .replace(/^\s+/, '')                  // sin espacio al inicio
                .replace(/\s{2,}/g, ' ')              // no más de un espacio
                .replace(/ ?\/ ?/g, '/')              // eliminar espacios antes/después de la diagonal
                .replace(/^([^\/]*\/[^\/]*)\/.*/, '$1') // solo una diagonal
              ">
            <label class="invalid-feedback">
              Por favor, completa este campo.
            </label>
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">SSID:</label>
            <input type="text" name="ssid" class="form-control" id="recipient-name" value="Default" required pattern="\S+">
            <label class="invalid-feedback">
              Por favor, completa este campo.
            </label>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password SSID:</label>
            <input type="text" name="passwordSsid" class="form-control" id="recipient-name" value="12345678" required oninput="this.value = this.value.replace(/\s/g, '')">
            <label class="invalid-feedback">
              Por favor, completa este campo.
            </label>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ubicación de dispositivo:</label>
              <input 
              type="text" 
              name="ubicacionDispositivo" 
              class="form-control" 
              id="recipient-name" 
              value="Default" 
              required 
              oninput="this.value = this.value.replace(/^\s+/, '').replace(/\s{2,}/g, ' ')">
            <label class="invalid-feedback">
              Por favor, completa este campo.
            </label>
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
<div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Usted está seguro de querer eliminar esta instalación?</h5>
        <!--Add data-ds-dismiss="modal". Version 5 de bootstrap.
             And aria-hidden="true". -->
        <button type="button" class="close" data-ds-dismiss="modal" aria-label="Close" aria-hidden="true">
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
          <i class="bi bi-house-gear"></i>
          Instalación
        </h2>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
          <i class="bi bi-plus"></i>
          Agregar nueva instalación
        </button>
      </div>  
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Instalaciones registradas</h2>
        <!-- @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif -->
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="installationDatatable" class="table">
            <thead class=" text-primary">
              <th>Id</th>  
              <th>Usuario</th>
              <th>Dispositivo</th>
              <th>Diámetro de tubería</th>
              <th>Ubicación de dispositivo</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </thead>
            <tbody>
              @foreach($instalacion as $row)
              <tr>
                <td>{{ $row->id }}</td>  
                {{-- <td>{{ $row->idUsuario }}</td> --}}
                <td>{{ $row->user->email ?? '—' }}</td>
                {{-- <td>{{ $row->idDispositivo }}</td> --}}
                <td>{{ $row->device->modeloSensor ?? '—' }}</td>
                <td>{{ $row->diametroTuberia }}</td>
                <td>{{ $row->ubicacionDispositivo }}</td>
                <td>
                    <a href="/instalacion-edit/{{ $row->id }}" class="btn btn-success">
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
  $('#inputState').select2({
    placeholder: 'Seleccionar una opción' 
  });

  $('#inputState1').select2({
    placeholder: 'Seleccionar correo electrónico' 
  });

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

  $(document).ready( function(){
      $('#installationDatatable').on('click','.deletebtn', function(){
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function () {
          return $(this).text();
        }).get();
        console.log(data);
        $('#delete').val(data[0]);
        $('#delete_modal').attr('action', '/installation-delete/'+data[0]);
        $('#deletemodalpop').modal('show');

      });
  });

  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>

@endsection

