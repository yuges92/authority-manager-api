@extends('layouts.master')
@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
          {{-- <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Authority Detail</a> </li> --}}
          <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#apiSettings" role="tab" aria-selected="false">Api Settings</a> </li>
          {{-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#hostedSettings" role="tab" aria-selected="false">Hosted Settings</a> </li> --}}
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Packages</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#reports" role="tab" aria-selected="false">Reports</a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane " id="home" role="tabpanel">
            <div class="card-body">
              <form class="row" action="{{route('authorities.update', $authority->authority_id)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')

                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Full Name:</label>
                    <div class="col">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Short Name:</label>
                    <div class="col">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Active:</label>
                    <div class="col">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Type:</label>
                    <div class="col">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Email:</label>
                    <div class="col">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Website:</label>
                    <div class="col">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Supplier:</label>
                    <div class="col">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Website:</label>
                    <div class="col">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Website:</label>
                    <div class="col">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{ old('firstName') }}" placeholder="First name">
                    </div>
                  </div>
                </div>

                <div class="form-group col-12">
                  <input class="btn btn-rounded btn-success px-5 waves-dark float-right" type="submit" value="Save">
                </div>
              </form>
            </div>
          </div>

          <div class="tab-pane active show" id="apiSettings" role="tabpanel">
            <div class="card-body">
              <form class="row" action="{{route('authorities.update', $authority->authority_id)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')


                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">API Active:</label>
                    <div class="switch col">
                      <label>OFF
                        <input type="checkbox" checked="" name="isActive" value="1"><span class="lever"></span>ON</label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="username" class="col-sm-4 col-form-label">API Username:</label>
                      <div class="col">
                        <input name="username" type="text" class="form-control" id="username" value="{{ old('username') }}" placeholder="Username">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label" for="date-range">Start/End Date :</label>
                      <div class="input-daterange input-group col" id="date-range">
                        <input type="text" class="form-control" name="start_date">
                        <div class="input-group-append">
                          <span class="input-group-text bg-info b-0 text-white">TO</span>
                        </div>
                        <input type="text" class="form-control" name="end_date">
                      </div>
                    </div>
                  </div>



                  <div class="form-group col-12">
                    <a href="/resetAPIPassword/{{$authority->authority_id}}" class="btn btn-warning">Reset Password</a>
                    <input class="btn btn-rounded btn-success px-5 waves-dark float-right" type="submit" value="Save">
                  </div>


                </form>
              </div>
            </div>

            <div class="tab-pane" id="hostedSettings" role="tabpanel">
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

                  <div class="form-group col-12">
                    <input class="btn btn-rounded btn-success px-5 waves-dark float-right" type="submit" value="Save">
                  </div>


                </form>
              </div>
            </div>

            <!--second tab-->
            <div class="tab-pane" id="profile" role="tabpanel">
              <div class="card-body">
                <button type="button" name="button" data-toggle="modal" data-target="#verticalcenter" class="btn btn-info">Add Package</button>
                <div class="table-responsive">
                  <table class=" display nowrap table table-hover table-striped table-bordered dataTable"  id="table_id">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Package</th>
                        <th>Description</th>
                        <th class="text-right"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i=1; $i <=5; $i++)

                        <tr>
                          <td><a href="{{route('authorities.show', $i)}}">{{$i}}</a></td>
                          <td><a href="{{route('authorities.show', $i)}}">Package Name</a></td>
                          <td>package Description </td>
                          <td class="text-right">
                            <a href="{{route('packages.show', $i)}}" class="btn btn-primary">View Package</a>
                            <a href="{{route('authorities.show', $i)}}" class="btn btn-danger">Remove</a>
                          </td>
                        </tr>
                      @endfor
                    </tbody>
                  </table>
                </div>

              </div>
            </div>


            <div class="tab-pane" id="reports" role="tabpanel">
              <div class="card-body">

              </div>
            </div>


          </div>
        </div>
      </div>
      <!-- Column -->
    </div>

    <div id="verticalcenter" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <form>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="vcenter">Choose a Package</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="form-group ">
                  <label for="authority_id">Choose Authority :</label>
                  <select class="js-example-basic-single form-control col-12" name="authority_id" data-placeholder="Select a state" required id="authority_id" >
                    <option value="">Choose an Authority</option>
                    @foreach ($packages as $package)
                      <option value="{{$package->id}}" >{{'('.$package->id.') '.$package->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button>
            </div>
          </div>
        </form>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


    

  @endsection


  @push('js')
    <script type="text/javascript">
    $(document).ready(function() {
      $('.js-example-basic-single').select2();

      $('#date-range').datepicker({
        format: "dd/mm/yyyy"
      });
    });
    </script>
  @endpush
