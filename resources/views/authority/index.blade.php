@extends('layouts.master')

@section('content')
  {{-- <div class="col-12 mb-3 row mx-auto">
    <div class="col-md-6">
      <a class="btn btn-info btn-rounded" href="{{route('authorities.create')}}">Add New Authority</a>
    </div>
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
          @foreach ($authorities as $authority)

          <div class="mx-sm-auto">
            <a class=" custom-card card" href="{{route('authorities.show', $authority->authority_id)}}">
              <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1">
                  <img src="https://www.bsn.eu/wp-content/uploads/2016/12/user-icon-image-placeholder-300-grey.jpg" alt="user">
                </div>
                <div class="el-card-content">
                  <h3 class="box-title">{{$authority->full_name}}</h3>
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
              <th>Short name</th>
              <th>Type</th>
              <th>Supplier ID</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
        @foreach ($authorities as $authority)

          <tr>
              <td><a href="{{route('authorities.show', $authority->authority_id)}}">{{$authority->authority_id}}</a></td>
              <td><a href="{{route('authorities.show', $authority->authority_id)}}">{{$authority->full_name}}</a></td>
              <td>{{$authority->short_name}}</td>
              <td>{{$authority->authority_type}}</td>
              <td>{{$authority->supplier_id}} </td>
              <td><a href="{{route('authorities.show', $authority->authority_id)}}" class="btn btn-info">View</a></td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>
</div>

</div>


@endsection
