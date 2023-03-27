@extends('layouts.master')

@section('title')
    Devices | Micromedicion

@endsection


@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog p-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a new device</h5>
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
          <!--<div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div> -->
        
          </div>
          <div class="modal-footer border-white">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this device?</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes, delete it.</button>
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
                  <i class="bi bi-cpu"></i>
                  Devices 
                </h3>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                  <i class="bi bi-plus"></i>
                  ADD NEW DEVICE
                </button>
              </div>  
            </div>

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered Devices</h3>
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="deviceDatatable" class="table">
                    <thead class=" text-primary">
                      <th>Id</th>  
                      <th>Dirección Mac</th>
                      <th>Modelo Sensor</th>
                      <th>Factor K</th>
                      <th>EDIT</th>
                      <th>DELETE</th>
                    </thead>
                    <tbody>
                      @foreach($devices as $row)
                      <tr>
                        <td>{{ $row->id }}</td>  
                        <td>{{ $row->direccionMac }}</td>
                        <td>{{ $row->modeloSensor }}</td>
                        <td>{{ $row->factorK }}</td>
                        <td>
                            <a href="/devices-edit/{{ $row->id }}" class="btn btn-success">
                              <i class="bi bi-pencil"></i>
                              EDIT
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-danger deletebtn">
                              <i class="bi bi-trash3"></i>
                              DELETE
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