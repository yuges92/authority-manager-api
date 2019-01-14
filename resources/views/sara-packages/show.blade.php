@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-12">


      <div class="card">
        <div class="card-body">
          <h2 class="card-title">{{$package->name}}</h2>
          <div class="row mx-auto">

            <a class=" custom-card card text-center" href="{{route('packages.edit', $package->id)}}">
              <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1">
                  <i class="fas fa-edit img-icon"></i>
                </div>
                <div class="el-card-content">
                  <h3 class="box-title">Edit package info</h3>
                </div>

              </div>
            </a>

            <a class=" custom-card card text-center" href="{{route('packages.edit', $package->id)}}">
              <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1">
                  <i class="fas fa-list-ul img-icon"></i>
                </div>
                <div class="el-card-content">
                  <h3 class="box-title">Main Topics</h3>
                </div>

              </div>
            </a>

            <a class=" custom-card card text-center" href="{{route('packages.edit', $package->id)}}">
              <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1">
                  <i class="fas fa-edit img-icon"></i>
                </div>
                <div class="el-card-content">
                  <h3 class="box-title">Authorities</h3>
                </div>

              </div>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
