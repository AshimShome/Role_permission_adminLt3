@extends('admin.admin_master')
@section('title', 'Role Index')
@section('contain')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Role List</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>#SL</th>
          <th>Name</th>
          <th>Acction</th>    
        </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$role->name}}</td>
                <td>X</td>
              </tr>
            @endforeach
      </table>
    </div>
    <!-- /.card-body -->
  </div>




  @endsection
