@extends('layouts.master')

@section('title')
    Registro de Usuarios | Micromedición

@endsection


@section('content')

<!--INICIO Sección. Modal registro de usuario -->
<section class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/save-new-user" method="POST" enctype="multipart/form-data" class="needs-validation" id="crearUsuariosForm" novalidate>
        {{ csrf_field() }} 
          <div class="modal-body">
            <img src="../../assets/img/gota_welcome.png" alt="Gota Welcome" class="pngGotaWelcome">
            

              <!--INICIO. Input modal: nombre de usuario-->
              <div class="form-group">
                <label for="name" class="col-form-label">Nombre:</label>
                {{-- <input type="text" name="name" id="name" class="form-control" autocomplete="off" required> --}}
                <input type="text" name="name" id="name" class="form-control" autocomplete="off" required
                pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$"
                title="Solo letras y espacios"
                oninput="this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ ]/g, '').replace(/^\s+/, '')">         
                <label class="invalid-feedback" for="name">
                  Por favor, completa este campo.
                </label>
              </div>
              <!--FIN. Input modal: nombre de usuario-->
              
              <!--INICIO. Input modal: telefono de usuario-->
              <div class="form-group">
                <label for="phone" class="col-form-label">Teléfono:</label>
                <input type="tel" name="phone" id="phone" class="form-control" autocomplete="on" pattern="^\d{10}$" 
                  oninput="this.value = this.value.replace(/\s/g, '')" required>
                <label class="invalid-feedback" for="phone">
                  Por favor, completa este campo.
                </label>
              </div>
              <!--FIN. Input modal: telefono de usuario-->
              
              <!--INICIO. Select modal: tipo de usuario-->
              <div class="form-group">
                <label for="inputState">Asignar tipo de usuario:</label>
                <select id="inputState" class="form-control" name="usertype" required>
                  <option value="" hidden selected>Selecciona uno</option>
                  <option value="admin">Admin</option>
                  <option value="user">User</option> 
                </select>
                <div id="validationServer04Feedback" class="invalid-feedback">
                  Por favor, selecciona un campo.
                </div>
              </div>
              <!--FIN. Select modal: tipo de usuario-->
              
              <!--INICIO. Input modal: correo electrónico de usuario-->
              <div class="form-group">
                <label for="email" class="col-form-label">Correo electrónico:</label>
                <input type="email" name="email" id="email" class="form-control"
                       autocomplete="off" required
                       pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$"
                       title="Ingresa un correo válido sin espacios, con '@' y al menos un punto."
                       oninput="this.value = this.value.replace(/\s/g, '')">
              </div>              
              <!--FIN. Input modal: correo electrónico de usuario-->
              
              <!--INICIO. Input modal: contraseña de correo electrónico-->
              {{-- <div class="form-group">
                <label for="password" class="col-form-label">Contraseña:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" class="form-control" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              </div> --}}
              <!--FIN. Input modal: contraseña de correo electrónico-->

              <!--INICIO. Input modal: foto de perfil-->
              <!-- <div>
                <label for="formFile" class="form-label">Foto de perfil:</label>
                <input class="form-control" type="file" id="formFile" name="foto_perfil" required>
              </div> -->
              <!--FIN. Input modal: foto de perfil-->
              
          </div>

          <!--INICIO. Modal footer-->
          <div class="modal-footer border-white">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" form="crearUsuariosForm">Guardar</button>
          </div>
          <!--FIN. Modal footer-->

      </form>
        
    </div>
  </div>
</section>
<!--FIN Sección. Modal registro de usuario-->

<!-- INICIO. Modal eliminar-->
<section class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
</section>
<!-- FIN. Modal eliminar -->

<!-- INICIO. Sección agregar nuevo usuario -->
<section class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">
          <i class="bi bi-people-fill"></i>
          Usuarios
        </h2>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
          <i class="bi bi-plus"></i>
          Agregar nuevo usuario
        </button>
      </div>  
    </div>       
  </div>  
</section>
<!-- FIN. Sección agregar nuevo usuario -->

<!-- INICIO. Sección tabla registro de usuarios registrados -->
<section class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Usuarios registrados</h2>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="userDatatable" class="table">
            <thead class="text-primary">
              <th>ID</th>  
              <th>Nombre</th>
              <th>Teléfono</th>
              <th>Tipo de usuario</th>
              <th>Correo electrónico</th>
              <th>Estatus usuario</th>
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
                  @if ($row->instalacion_count > 0)
                    Vinculado
                    <i class="biHose bi-house-check-fill"></i>
                  @else
                    Activo
                    <i class="biActivo bi-circle-fill"></i>
                  @endif
                </td>
                <td>
                    <a href="/role-edit/{{ $row->id }}" class="btn btn-success">
                      <i class="bi bi-pencil"></i>
                      Editar
                    </a>
                </td>
                <td>
                  @if ($row->instalacion_count > 0)
                  <a href="#" class="btn deletebtndisable" disabled>
                  
                    <i class="bi bi-trash3"></i>
                    Eliminar
                  </a>
                @else
                <a href="javascript:void(0)" class="btn btn-danger deletebtn">
                  <i class="bi bi-trash3"></i>
                  Eliminar
                </a>  
                @endif
                  {{-- <a href="javascript:void(0)" class="btn btn-danger deletebtn">
                    <i class="bi bi-trash3"></i>
                    Eliminar
                  </a> --}}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>    
</section>
<!-- FIN. Sección tabla registro de usuarios registrados -->

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