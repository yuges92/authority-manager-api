@extends('layouts.master')

@section('content')
  <div class="my-2">
    <a class="btn btn-info btn-rounded" href="{{route('packages.create')}}">Add New Package</a>

  </div>
  <div class="row el-element-overlay ">
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
  </div>

  @endsection
