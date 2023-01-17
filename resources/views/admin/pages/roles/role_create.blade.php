@extends('admin.admin_master')
@section('title', ' Role Create')
@section('contain')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Role Create</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      @if ($errors->any())
    <div class="alert alert-danger">
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
    @endif
      <form method="POST" action="{{route('role-store')}}">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Role Name">
          </div>

          <div class="form-group">
            <label for="name">Permission</label>
            @foreach($permissions as $permission)
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{$permission->id}}" value="{{$permission->name}}">
              <label class="form-check-label" for="checkPermission{{$permission->id}}">{{$permission->name}}</label>
            </div>
            @endforeach 
        </div>

        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  @endsection
