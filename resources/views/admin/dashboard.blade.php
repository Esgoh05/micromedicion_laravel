@extends('layouts.master')

@section('title')
    Dashboard | Micromedicion

@endsection


@section('content')

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                  <thead class=" text-primary">
                      <th>ID</th>  
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Usertype</th>
                      <th>Email</th>
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

@endsection