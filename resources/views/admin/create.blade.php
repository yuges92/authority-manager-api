@extends('layouts.master')

@section('content')
  <div class="container p-sm-0 px-md-5 ">
    <h1 class="mb-5">New User</h1>

    <form class="" action="{{route('users.store')}}" method="post">
      {{ csrf_field() }}

      <div class="form-group row">
        <label for="role" class="col-sm-2 col-form-label">Role:</label>
        <div class="col-sm-5">
          <select class="form-control" name="role">
            @if (Auth::user()->role=='Developer')
              <option value="Developer">Developer</option>
            @endif
            <option value="Admin">Admin</option>
            <option value="Manager">Manager</option>
            <option value="User">User</option>
            <option value="Authority">Authority</option>
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="firstName" class="col-sm-2 col-form-label">First name:</label>
        <div class="col-sm-10">
          <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
        </div>
      </div>

      <div class="form-group row">
        <label for="lastName" class="col-sm-2 col-form-label">Last name:</label>
        <div class="col-sm-10">
          <input name="lastName" type="text" class="form-control" id="lastName" value="{{ old('lastName') }}" placeholder="Last name">
        </div>
      </div>

      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
          <input name="email" type="text" class="form-control" id="email" value="{{ old('email') }}" placeholder="Email">
        </div>
      </div>


      <div class="form-group ">
        <div class="col-sm-10 offset-sm-2 ">

          <div class="checkbox">
            <input type="checkbox" name="notify" id="notify" {{ (old('notify')) ? 'notify' : '' }} value="1}">
            <label for="notify">Notify user about the account:</label>
          </div>
        </div>
      </div>

      <div class="form-group row float-right mt-3 p-3">
        <input class="btn btn-rounded btn-primary px-5" type="submit" value="Add">
      </div>


    </form>
  </div>

@endsection
