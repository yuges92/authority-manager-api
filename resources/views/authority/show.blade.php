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
              <form class="row" action="{{route('authorityApi.update', $authority->authorityApi->id)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')


                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">API Active:</label>
                    <div class="switch col">
                      <label>OFF
                        <input type="checkbox" {{$authority->authorityApi->isActive ? 'checked': ''}} name="isActive" value="1"><span class="lever"></span>ON</label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="username" class="col-sm-4 col-form-label">API Username:</label>
                      <div class="col">
                        <input name="username" type="text" class="form-control" id="username" value="{{ $authority->authorityApi->username }}" placeholder="Username">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label" for="date-range">Start/End Date :</label>
                      <div class="input-daterange input-group col" id="date-range">
                        <input type="text" class="form-control" name="start_date" value="{{$authority->authorityApi->startDate()}}">
                        <div class="input-group-append">
                          <span class="input-group-text bg-info b-0 text-white">TO</span>
                        </div>
                        <input type="text" class="form-control" name="expiry_date" value="{{$authority->authorityApi->expiryDate()}}">
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


            <!--second tab-->
            <div class="tab-pane" id="profile" role="tabpanel">
              <div class="card-body">
                <button type="button" name="button" data-toggle="modal" data-target="#addPackagesModel" class="btn btn-info">Add Package</button>
                <div class="table-responsive">
                  <table class=" display nowrap table table-hover table-striped table-bordered dataTable"  id="table_id">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Package</th>
                        <th>Type</th>
                        <th>Is Active</th>
                        <th class="text-right"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($authority->packages as $package)

                        <tr>
                          <td><a href="{{route('packages.show', $package->id)}}">{{$package->id}}</a></td>
                          <td><a href="{{route('packages.show', $package->id)}}">{{$package->name}}</a></td>
                          <td>{{$package->type}} </td>
                          <td>{{$package->isActive}} </td>
                          <td class="row">
                            <a href="{{route('packages.show', $package->id)}}" class="btn btn-primary mr-1">View Package</a>
                            <form class="deleteForm" action="{{route('authorityPackage.destroy', [$authority->authority_id,$package->id])}}" method="post">
                              @method('delete')
                              {{ csrf_field() }}
                              <input type="hidden" name="package_id" value="{{$package->id}}">
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


            <div class="tab-pane" id="reports" role="tabpanel">
              <div class="card-body">

              </div>
            </div>


          </div>
        </div>
      </div>
      <!-- Column -->
    </div>



    <div id="addPackagesModel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
      <div class="modal-dialog">
        <form class="" action="{{route('authorityPackage.store', $authority->authority_id)}}" method="post">
          {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="vcenter">Choose a Package</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="form-group ">
                  <label for="package_id">Choose packages :</label>
                  <select class="js-example-basic-single form-control col-12" name="package_id[]" multiple required id="package_id" >
                    <option value="" disabled>Choose an Authority</option>
                    @foreach ($packages as $package)
                      <option {{($exist=$authority->packages->where('id', $package->id)->count()>0 ? 'disabled':'')}} value="{{$package->id}}" >{{'('.$package->id.') '.$package->name}}({{$package->type}}) <small>{{$exist ?'(Already Exist)' : ''}}</small></option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info waves-effect" >Save</button>
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
