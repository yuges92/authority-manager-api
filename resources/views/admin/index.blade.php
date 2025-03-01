@extends('layouts.master')

@section('content')
  <h1>Users</h1>
  <div class="my-2">
    <a class="btn btn-info btn-rounded" href="{{route('users.create')}}">Add New User</a>

  </div>
  @if (count($users)>0)
    <table class=" display nowrap table table-hover table-striped table-bordered dataTable"  id="table_id">

    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Fullname</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)

        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->getFullname()}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->role}}</td>
          <td class="row"><a class="btn btn-success mr-1" href="{{route('users.edit', [$user->id])}}">Edit</a>
            @if (Auth::user()->role=='Developer')

            <form class="deleteForm" action="{{route('users.destroy',[$user->id])}}" method="post">
              {{ csrf_field() }}
              @method('Delete')
              <input class="btn btn-danger" type="submit" value="Delete">
            </form>
          @endif
          </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  @else
    <div class="text-center">
      <span class="text-danger">No Users found!</span>
    </div>
  @endif

  @endsection
