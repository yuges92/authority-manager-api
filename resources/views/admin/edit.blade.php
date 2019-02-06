@extends('layouts.master')

@section('content')

  <section class="content">
    <div class="row">
      <div class="col-md-4 p-0">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="//www.bsn.eu/wp-content/uploads/2016/12/user-icon-image-placeholder-300-grey.jpg" alt="User profile picture">
            <h3 class="profile-username text-center">{{$user->getFullname()}}</h3>
            <div class="profile-user-info">
              <div class="text-center">
                <form class="" action="" method="post">
                  {{ csrf_field() }}
                  @method('PUT')
                  <div class="form-group">
                    <input class="btn btn-warning px-5 " type="submit" value="Reset Password">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 col-lg-7">
        <div class="tab-content">
          <div class="tab-pane active" id="detail" aria-expanded="false">
            <div class=" p-sm-0 px-md-5 ">
              <form class="" action="{{route('users.update', $user->id)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group row">
                  <label for="role" class="col-sm-2 col-form-label">Role:</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="role">
                      {{-- @if (Auth::user()->role=='Developer') --}}
                        <option {{($user->role=='Developer') ? 'selected':''}} value="Admin">Developer</option>
                      {{-- @endif --}}
                      <option {{($user->role=='Admin') ? 'selected':''}} value="Admin">Admin</option>
                      <option {{($user->role=='Manager') ? 'selected':''}} value="Manager">Manager</option>
                      <option {{($user->role=='User') ? 'selected':''}} value="User">User</option>
                      <option {{($user->role=='Authority') ? 'selected':''}} value="Authority">Authority</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="firstName" class="col-sm-2 col-form-label">First name:</label>
                  <div class="col-sm-10">
                    <input name="firstName" type="text" class="form-control" id="firstName" value="{{ $user->firstName}}" placeholder="First name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="lastName" class="col-sm-2 col-form-label">Last name:</label>
                  <div class="col-sm-10">
                    <input name="lastName" type="text" class="form-control" id="lastName" value="{{ $user->lastName }}" placeholder="Last name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Email:</label>
                  <div class="col-sm-10">
                    <input name="email" type="email" class="form-control" id="username" value="{{ $user->email }}" placeholder="Username" >
                  </div>
                </div>


                {{-- <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Type:</label>
                <div class="col-sm-10">
                <select class="form-control">
                <option value="approved" {{($user->type=='approved') ?'selected' :''}}>Approved</option>
                <option value="blocked"  {{($user->type=='blocked') ?'selected' :''}}>Blocked</option>
                <option value="pending"  {{($user->type=='pending') ?'selected' :''}}>Pending</option>
              </select>
            </div>
          </div> --}}

          <div class="form-group d-flex justify-content-end">
            <input class="btn btn-primary px-5 " type="submit" value="Update">
          </div>
        </form>
      </div>

    </div>

  </div>
</div>
</div>

</section>
@endsection
