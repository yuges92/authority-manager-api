@extends('layouts.master')

@section('content')
  <div class="col-12 mb-3">
  <div class="col-md-6 ml-auto">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search">
      <div class="input-group-append">
        <button class="btn btn-info" type="button">Go!</button>
      </div>
    </div>
  </div>

  </div>
  <div class="row el-element-overlay ">
    <div class="col-md-12">
      <div class="row">
        @for ($i=1; $i <= 10; $i++)
          <div class="mx-sm-auto">
            <a class=" custom-card card" href="{{route('authorities.show', $i)}}">
              <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1">
                  <img src="https://www.bsn.eu/wp-content/uploads/2016/12/user-icon-image-placeholder-300-grey.jpg" alt="user">
                </div>
                <div class="el-card-content">
                  <h3 class="box-title">Authority {{$i}}</h3>
                </div>

              </div>
            </a>
          </div>

        @endfor

      </div>
    </div>
  </div>


@endsection
