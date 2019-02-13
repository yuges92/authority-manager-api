@extends('layouts.master')

@section('content')

<div class="card">
  <div class="card-body">


<div class="table-responsive">

  <table class=" display nowrap table table-hover table-striped table-bordered dataTable"  id="table_id">
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Short name</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
        @foreach ($authorities as $authority)

          <tr>
              <td><a href="{{route('authorities.show', $authority->authority_id)}}">{{$authority->authority_id}}</a></td>
              <td><a href="{{route('authorities.show', $authority->authority_id)}}">{{$authority->authority->full_name}}</a></td>
              <td>{{$authority->authority->short_name}}</td>
              <td class="row mx-auto">
                <a href="{{route('authorities.show', $authority->authority_id)}}" class="btn btn-info mr-1">View</a>
                <form class="deleteForm" action="{{route('authorityApi.destroy', [$authority->id])}}" method="post">
                  @method('delete')
                  {{ csrf_field() }}
                  {{-- <input type="hidden" name="subtopic_id" value="{{$subTopic->sectionid}}"> --}}
                  <div class="">
                    <button class="btn btn-danger" type="submit" name="button">Remove</button>
                  </div>
                </form>

              </td>
          </tr>
        @endforeach
      </tbody>
  </table>
</div>
</div>

</div>


@endsection
