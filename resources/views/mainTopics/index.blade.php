@extends('layouts.master')

@section('content')
  <div class="my-2">
    <a class="btn btn-info btn-rounded" href="{{route('mainTopics.create')}}">Add new main Topic</a>
  </div>
  {{-- <div class="row el-element-overlay ">
  <div class="col-md-12">
  <div class="row">
  @foreach ($mainTopics as $mainTopic)

  <div class="mx-sm-auto">
  <a class=" custom-card card" href="{{route('topics.show', $mainTopic->id)}}">
  <div class="el-card-item">
  <div class="el-card-avatar el-overlay-1">
  <i class="fas fa-cubes img-icon"></i>
</div>
<div class="el-card-content">
<h3 class="box-title">{{$mainTopic->name}}</h3>
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
            <th>active</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($mainTopics as $mainTopic)
            <tr>
              <td><a href="{{route('mainTopics.show', $mainTopic->id)}}">{{$mainTopic->id}}</a></td>
              <td><a href="{{route('mainTopics.show', $mainTopic->id)}}">{{$mainTopic->name}}</a></td>
              <td>{{$mainTopic->is_used}}</td>
              <td>
                <form class="deleteForm" action="{{route('mainTopics.destroy', [$mainTopic->id])}}" method="post">
                  @method('delete')
                  {{ csrf_field() }}
                  {{-- <input type="hidden" name="subtopic_id" value="{{$subTopic->sectionid}}"> --}}
                  <div class="">
                    <button class="btn btn-danger" type="submit" name="button">Remove</button>
                  </div>
                </form>
                {{-- <a href="{{route('mainTopics.show', $mainTopic->id)}}" class="btn btn-info">View</a> --}}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

<button type="button" name="button" id="sa-params">Click me</button>
@endsection
