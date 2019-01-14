@extends('layouts.master')

@section('content')
  <div class="my-2">
    <a class="btn btn-info btn-rounded" href="{{route('topics.create')}}">Add new main Topic</a>

  </div>
  <div class="row el-element-overlay ">
    <div class="col-md-12">
      <div class="row">
        @for ($i=1; $i <= 10; $i++)
          <div class="mx-sm-auto">
            <a class=" custom-card card" href="{{route('authorities.show', $i)}}">
              <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1">
                  <i class="fas fa-cubes img-icon"></i>
                </div>
                <div class="el-card-content">
                  <h3 class="box-title">Main {{$i}} Topics</h3>
                </div>

              </div>
            </a>
          </div>

        @endfor

      </div>
    </div>
  </div>


  @endsection
