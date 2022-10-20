@extends('layouts.main')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>{{ $title }}</h4>
  </div>
  <div class="card-body">
    <div class="row mb-2">
      <div class="col-lg-12">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('success') }}
        </div>
        @endif
      </div>
      <div class="col-lg-6">
        @if ($permission->create == 1)
        <a type="button" href="/sys/user_permission/create" class="add btn btn-primary">ADD</a>
        @endif
      </div>
      <div class="col-lg-6">
        <div class=" col-lg-2 float-right">
        </div>
      </div>
    </div>
    <!-- <hr> -->
    <div class="table-responsive">
      <div class="row">
        <div class="col-lg-12">
          <table id="dtable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                @if ($permission->modify == 1)
                <th>Action</th>
                @endif
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($records as $record)
              <tr>
                <td>{{ $loop->iteration }}</td>
                @if ($permission->modify == 1)
                <td><a href="/sys/user_permission/{{ $record->id}}/edit" class="btn btn-info">Edit</a></td>
                @endif
                <td>{{ $record->username }}</td>
                <td>{{ $record->email }}</td>
                <td>{{ $record->status == 1 ? 'Active' : 'Suspend' }}</td>
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

@include('layouts.jsscript')