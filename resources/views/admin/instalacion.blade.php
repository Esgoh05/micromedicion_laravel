@extends('layouts.master')

@section('title')
    Devices | Micromedicion

@endsection


@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new device</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/save-new-instalacion" method="POST">
        {{ csrf_field() }} 


          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Id Usuario:</label>
            <div class="input-group">
            <input type="text" name="idUsuario" class="form-control" id="recipient-name" placeholder="Search...">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="now-ui-icons ui-1_zoom-bold"></i>
                </div>
              </div>
            </div>
          </div>

          <!--Select Id. Modelo:User -->
          <div class="form-group">
            <label for="inputState">Email</label>
            <select id="inputState" class="form-control">
              @foreach ($userId as $prueba)
              <option value="{{ $prueba->id}}"> {{ $prueba->email}} </option> 
              @endforeach
            </select>
          </div>


          <form action="/search-email" method="GET">
          {{ csrf_field() }} 
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Id Dispositivo:</label>
                <div class="input-group">
                <input type="text" name="idDispositivo" class="form-control" id="recipient-name" placeholder="Search..." value="{{ old('idDispositivo') }}">
                <button type="button" id="searchModelo" class="btn btn-primary float-right">Search</button>   
              </div>     
              </div>
          </form>

            <form class="form-inline" action="/search-byemail" method="GET">
            {{ csrf_field() }} 
              <input class="form-control mr-sm-2" name="buscar" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

          <!--Select Id - modelo dispositivo modelo:Device-->
          <div class="form-group">
            <label for="inputState">Id - modelo dispositivo</label>
            <select id="inputState" class="form-control">
              @foreach ($deviceIds as $deviceId)
              <option value="{{ $deviceId->id}}"> {{ $deviceId->id}} -> {{ $deviceId->modeloSensor}}</option> 
              @endforeach
              <!--<option selected>Choose a email...</option>
              <option>...</option> -->
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Diametro de tuberia:</label>
            <input type="text" name="diametroTuberia" class="form-control" id="recipient-name" value="1/2">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">SSID:</label>
            <input type="text" name="ssid" class="form-control" id="recipient-name" value="Default">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password SSID:</label>
            <input type="text" name="passwordSsid" class="form-control" id="recipient-name" value="12345678">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Ubicacion de dispositivo:</label>
            <input type="text" name="ubicacionDispositivo" class="form-control" id="recipient-name" value="Default">
          </div>
          
          <!--<div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div> -->
        
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>

<div class="row">
<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Instalacion
                 
                </h4>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">ADD</button>
              </div>  
            </div>

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
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Id</th>  
                      <th>Id Usuario</th>
                      <th>Id Dispositivo</th>
                      <th>Diametro de tuberia</th>
                      <th>Ubicacion de dispositivo</th>
                      <th>EDIT</th>
                      <th>DELETE</th>
                    </thead>
                    <tbody>
                      @foreach($instalacion as $row)
                      <tr>
                        <td>{{ $row->id }}</td>  
                        <td>{{ $row->idUsuario }}</td>
                        <td>{{ $row->idDispositivo }}</td>
                        <td>{{ $row->diametroTuberia }}</td>
                        <td>{{ $row->ubicacionDispositivo }}</td>
                        <td>
                            <a href="/role-edit/{{ $row->id }}" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                            <form action="/role-delete/{{ $row->id }}" method="post">
                              {{  csrf_field()  }}
                              {{  method_field('DELETE')  }}
                              <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
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

@endsection