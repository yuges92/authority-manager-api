@extends('layouts.master')

@section('content')
  <div class="my-2">
    <a class="btn btn-info btn-rounded" href="{{route('packages.create')}}">Add New Package</a>

  </div>
  {{-- <div class="row el-element-overlay ">
    <div class="col-md-12">
      <div class="row">
        @foreach ($packages as $package)

          <div class="mx-auto">
            <a class=" custom-card card" href="{{route('packages.show', $package->id)}}">
              <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1">
                  <i class="fas fa-cubes img-icon"></i>
                </div>
                <div class="el-card-content">
                  <h3 class="box-title">{{$package->name}}</h3>
                </div>

              </div>
            </a>
          </div>
        @endforeach

      </div>
    </div>
  </div> --}}

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class=" display nowrap table table-hover table-striped table-bordered dataTable"  id="table_id">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>is Active</th>
              <th>Type</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($packages as $package)
              <tr >
                <td><a href="{{route('packages.show', $package->id)}}">{{$package->id}}</a></td>
                <td><a href="{{route('packages.show', $package->id)}}">{{$package->name}}</a></td>
                <td>{{$package->isActive}}</td>
                <td>{{$package->type}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>

  @endsection
