@extends('layouts.main')

@section('content')
<div class="card col-lg-9">
  <div class="card-header">
    <h4>{{ $title }}</h4>
  </div>
  <div class="card-body">
    <div class="row mb-2">
      <div class="col-lg-6">
        @if ($permission->create == 1)
        <a type="button" href="/{{ $permission->url }}/create" class="btn btn-primary">ADD</a>
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
                <th>Superior</th>
                <th>User</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($records as $record)
              <tr>
                <td>{{ $loop->iteration }}</td>
                @if ($permission->modify == 1)
                <td><a href="/{{ $permission->url }}/{{ $record->id}}/edit" class="btn btn-info">Edit</a></td>
                @endif
                <td>{{ $record->superior_user->fullname }}</td>
                <td>{{ $record->user->fullname }}</td>
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