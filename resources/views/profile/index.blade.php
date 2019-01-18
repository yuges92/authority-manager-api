@extends('layouts.master')

@section('content')

  <section class="content">
    <div class="row">
      <div class="col-md-4 p-0">

        <!-- Profile Image -->
        <div class="card box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="//www.bsn.eu/wp-content/uploads/2016/12/user-icon-image-placeholder-300-grey.jpg" alt="User profile picture">
            <h3 class="profile-username text-center">{{Auth::user()->getFullname()}}</h3>
            <div class="profile-user-info">
              <div class="text-center">
                <button class="btn btn-warning " type="button" name="button" data-toggle="modal" data-target="#verticalcenter">Change Password</button>
              </div>
              <div class="">

                <div class="form-group">
                  <div id="verticalcenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="vcenter">Change Password</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form class="" action="{{route('updatePassword')}}" method="post">
                          <div class="modal-body p-5">
                            {{ csrf_field() }}
                            @method('PUT')

                            <div class="form-group">
                              <label for="currentPassword" class="control-label">Current Password:</label>
                              <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                            </div>

                            <div class="form-group">
                              <label for="password" class="control-label">New Password:</label>
                              <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                              <label for="password_confirmation" class="control-label">Confirm New Password:</label>
                              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>

                            <div class="form-group d-flex justify-content-end">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                            <input class="btn btn-primary px-5 " type="submit" value="Save">
                            {{-- <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button> --}}
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 col-lg-7">
        <div class="tab-content card">
          <div class="tab-pane active" id="detail" aria-expanded="false">
            <div class=" p-sm-0 px-md-5 ">
              <form class="card-body" action="{{route('profile.update', Auth::user()->id)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group row">
                  <label for="role" class="col-sm-4 col-form-label">Role:</label>
                  <div class="col">
                    <input type="text" class="form-control" id="role" value="{{ Auth::user()->role}}" placeholder="Role" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="firstName" class="col-sm-4 col-form-label">First name:</label>
                  <div class="col">
                    <input name="firstName" type="text" class="form-control" id="firstName" value="{{ Auth::user()->firstName}}" placeholder="First name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="lastName" class="col-sm-4 col-form-label">Last name:</label>
                  <div class="col">
                    <input name="lastName" type="text" class="form-control" id="lastName" value="{{ Auth::user()->lastName }}" placeholder="Last name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-4 col-form-label">Email:</label>
                  <div class="col">
                    <input name="email" type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" placeholder="Email" >
                  </div>
                </div>

                <div class="form-group d-flex justify-content-end">
                  <input class="btn btn-primary px-5 " type="submit" value="Save">
                </div>
              </form>
            </div>

          </div>

        </div>
      </div>
    </div>

  </section>
@endsection
