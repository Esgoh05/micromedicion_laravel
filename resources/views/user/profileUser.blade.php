@extends('layouts.master')

@section('title')
    Devices | Micromedicion

@endsection


@section('content')

<div class="modal fade" id="exampleModalUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edita tu perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="../../assets/img/gota_welcome.png" alt="Gota Welcome" class="pngGotaWelcome">
        <form action="/user-profile/{{ Auth::user()->id}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" name="name" class="form-control" id="recipient-name" value="{{ Auth::user()->name }}">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Teléfono:</label>
            <input type="text" name="phone" class="form-control" id="recipient-name" value={{ Auth::user()->phone }}>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Correo electrónico:</label>
            <input type="text" name="email" class="form-control" id="recipient-name" value={{ Auth::user()->email }}>
          </div>
          <!-- <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" class="form-control" id="recipient-name">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
          </div> -->
          </div>
          <div class="modal-footer border-white">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog p-5" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edita tu perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="../../assets/img/gota_welcome.png" alt="Gota Welcome" class="pngGotaWelcome">
          <form action="/user-profile/{{ Auth::user()->id}}" method="POST">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
  
  
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nombre:</label>
              <input type="text" name="name" class="form-control" id="recipient-name" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Teléfono:</label>
              <input type="text" name="phone" class="form-control" id="recipient-name" value={{ Auth::user()->phone }}>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Correo electrónico:</label>
              <input type="text" name="email" class="form-control" id="recipient-name" value={{ Auth::user()->email }}>
            </div>
            <!-- <div class="form-group">
              <label for="recipient-name" class="col-form-label">Password:</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" class="form-control" id="recipient-name">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
            </div> -->
            </div>
            <div class="modal-footer border-white">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="contenedor-header">
                <!-- contenedor foto de perfil -->
                <div class="contenedor_izquierda">
                    <div class="card-img">
                    <img class="image-profile" src="{{ Auth::user()->foto_perfil }}" alt="mifoto">
                    </div>
                </div>
                <div class="contenedor_btn_hover">
                    <a class="nav-link" id="navbarDropdownMenuLinkPhoto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bi bi-camera-fill" style="font-size: 40px"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalUp" style="font-size: 15px; color:#0c2646; font-family: 'Times New Roman', Times, serif;">
                        <i class="bi bi-file-image" style="color: #2a5788;"></i>
                        Actualizar foto de perfil
                      </a>
                      <a class="dropdown-item" href="/user-profile" style="font-size: 15px; color:#0c2646; font-family: 'Times New Roman', Times, serif;">
                        <i class="bi bi-trash3" style="color: #2a5788;"></i>
                        Eliminar
                      </a>
                    </div>
                </div>
                <div class="contenedor_medio">
                    <div class="contenedor_title">
                        <h2> {{ Auth::user()->name }}</h2>
                        <p class="datos"><i class="bi bi-envelope"></i>{{ Auth::user()->email }}</p>
                        <p class="datos"><i class="bi bi-telephone"></i></i>{{ Auth::user()->phone }}</p>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          <i class="bi bi-pencil"></i>
                          Editar perfil
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>

@endsection