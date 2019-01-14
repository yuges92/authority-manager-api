@extends('layouts.master')

@section('content')
  <div class="d-flex justify-content-start row mx-auto">
    <a href="/admin/users" class="custom-icon-card mx-auto">
      <div class="card-body mx-auto text-center">
        <i class="fas fa-users custom-icon"></i>
        <h5 class="card-title">Create API</h5>
      </div>
    </a>


    <a href="/" class="custom-icon-card mx-auto">
      <div class="card-body mx-auto text-center">
        <i class="fas fa-exclamation custom-icon"></i>
        <h5 class="card-title">Notifications</h5>
      </div>
    </a>


  </div>
@endsection
