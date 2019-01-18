@extends('layouts.master')
@section('content')
  <div class="mx-auto">

    <button class="btn btn-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-plus"></i></span>Add package</button>
  </div>

  <div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card"> <img class="card-img" src="https://www.bsn.eu/wp-content/uploads/2016/12/user-icon-image-placeholder-300-grey.jpg" alt="Card image">
        <div class="card-img-overlay card-inverse social-profile d-flex ">
          <div class="align-self-center"> <img src="https://www.bsn.eu/wp-content/uploads/2016/12/user-icon-image-placeholder-300-grey.jpg" class="img-circle" width="100">
            <h4 class="card-title">Authority</h4>
            <h6 class="card-subtitle">@jamesandre</h6>
            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt </p>
          </div>
        </div>
      </div>

    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
      <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Authority Detail</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Packages</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active show" id="home" role="tabpanel">
            <div class="card-body">
              <form class="" action="{{route('authorities.update', $authority->authority_id)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')

                <div class="form-group row">
                  <label for="role" class="col-sm-2 col-form-label">Role:</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="role">
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
                      <input type="checkbox" name="notify" id="notify" {{ (old('notify')) ? 'notify' : '' }} value="1">
                      <label for="notify">Notify user about the account:</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row float-right mt-3 p-3">
                  <input class="btn btn-rounded btn-primary px-5 waves-dark" type="submit" value="Save">
                </div>


              </form>
            </div>
          </div>
          <!--second tab-->
          <div class="tab-pane" id="profile" role="tabpanel">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                  <br>
                  <p class="text-muted">Johnathan Deo</p>
                </div>
                <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                  <br>
                  <p class="text-muted">(123) 456 7890</p>
                </div>
                <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                  <br>
                  <p class="text-muted">johnathan@admin.com</p>
                </div>
                <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                  <br>
                  <p class="text-muted">London</p>
                </div>
              </div>
              <hr>
              <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
              <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
              <h4 class="font-medium m-t-30">Skill Set</h4>
              <hr>
              <h5 class="m-t-30">Wordpress <span class="pull-right">80%</span></h5>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
              </div>
              <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
              </div>
              <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
              <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
              </div>
              <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="settings" role="tabpanel">
            <div class="card-body">
              <form class="form-horizontal form-material">
                <div class="form-group">
                  <label class="col-md-12">Full Name</label>
                  <div class="col-md-12">
                    <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                  </div>
                </div>
                <div class="form-group">
                  <label for="example-email" class="col-md-12">Email</label>
                  <div class="col-md-12">
                    <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Password</label>
                  <div class="col-md-12">
                    <input type="password" value="password" class="form-control form-control-line">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Phone No</label>
                  <div class="col-md-12">
                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12">Message</label>
                  <div class="col-md-12">
                    <textarea rows="5" class="form-control form-control-line"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12">Select Country</label>
                  <div class="col-sm-12">
                    <select class="form-control form-control-line">
                      <option>London</option>
                      <option>India</option>
                      <option>Usa</option>
                      <option>Canada</option>
                      <option>Thailand</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button class="btn btn-success">Update Profile</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>


@endsection
