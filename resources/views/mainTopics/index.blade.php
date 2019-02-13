@extends('layouts.master')

@section('content')
  <div class="my-2">
    <a class="btn btn-info btn-rounded" href="{{route('mainTopics.create')}}">Add new main Topic</a>
  </div>
  
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
                <td class="row mx-auto">

                  <form class="deleteForm" action="{{route('mainTopics.destroy', [$mainTopic->id])}}" method="post">
                    @method('delete')
                    {{ csrf_field() }}
                    {{-- <input type="hidden" name="subtopic_id" value="{{$subTopic->sectionid}}"> --}}
                    <div class="">
                      <button class="btn btn-danger" type="submit" name="button">Remove</button>
                    </div>
                  </form>
                  <a href="{{route('mainTopics.show', $mainTopic->id)}}" class="btn btn-info mx-2">View</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>

@endsection
