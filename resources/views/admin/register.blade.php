@extends('layouts.master')

@section('title')
    Registro de Usuarios | Micromedición

@endsection


@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="../../assets/img/gota_welcome.png" alt="Gota Welcome" class="pngGotaWelcome">
        <form action="/save-new-user" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }} 


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Teléfono:</label>
            <input type="text" name="phone" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="inputState">Asignar tipo de usuario:</label>
            <select id="inputState" class="form-control" name="usertype">
              <option value="" hidden selected>Selecciona uno</option>
              <option value="admin">Admin</option>
              <option value="user">User</option> 
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Correo Electrónico:</label>
            <input type="text" name="email" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Contraseña:</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" class="form-control" id="recipient-name">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div>

          <div>
            <label for="formFile" class="form-label">Foto de perfil:</label>
            <input class="form-control" type="file" id="formFile" name="foto_perfil">
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
        <h5 class="modal-title" id="exampleModalLabel">¿Usted está seguro de querer eliminar este usuario?</h5>
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
        <button type="submit" class="btn btn-primary btn-prueba">Si, eliminar</button>
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
                <h3 class="card-title">
                  <i class="bi bi-people-fill"></i>
                  Usuarios
                </h3>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                  <i class="bi bi-plus"></i>
                  Agregar nuevo usuario
                </button>
              </div>  
            </div>

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Usuarios registrados</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="userDatatable" class="table">
                    <thead class=" text-primary">
                      <th>ID</th>  
                      <th>Nombre</th>
                      <th>Teléfono</th>
                      <th>Tipo de usuario</th>
                      <th>Correo electrónico</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </thead>
                    <tbody>
                      @foreach($users as $row)
                      <tr>
                        <td>{{ $row->id }}</td>  
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->usertype }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <a href="/role-edit/{{ $row->id }}" class="btn btn-success">
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
          $('#userDatatable').DataTable();
      });

      var table = $('#userDatatable').DataTable({
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
          $('#userDatatable').on('click','.deletebtn', function(){
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
              return $(this).text();
            }).get();
            console.log(data);
            $('#delete').val(data[0]);
            $('#delete_modal').attr('action', '/role-delete/'+data[0]);
            $('#deletemodalpop').modal('show');
          });
      });
    </script>

@endsection