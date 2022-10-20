@extends('layouts.main')

@section('content')
<div class="card col-lg-6">
  <div class="card-header">
    <h4>{{ $title }}</h4>
  </div>
  <div class="form-horizontal">
    <div class="card-body">
      {{-- menampilkan error validasi --}}
      @if (count($errors) > 0)
      <div class="alert alert-danger" role="alert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form method="POST" action="/sys/vendor">
        @csrf
        @if (session('error'))
        <div class="alert alert-danger" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('error') }}
        </div>
        @endif
        <input type="hidden" id="created_by" name="created_by" value="{{ auth()->user()->id }}">
        <div class="message" style="display: none;"></div>
        <div class="card-body">
          <div class="form-group col-lg-12">
            <label>Vendor Name</label>
            <input type="text" id="name" name="name" class="form-control" required>
          </div>
          <div class="form-group col-lg-12">
            <label>Description</label>
            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
          </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="/sys/vendor" class="back btn btn-secondary">Back</a>
      </form>
    </div>
  </div>
</div>

@endsection