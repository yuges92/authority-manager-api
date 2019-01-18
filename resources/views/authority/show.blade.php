@extends('layouts.master')
@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Authority Detail</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#apiSettings" role="tab" aria-selected="false">Api Settings</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#hostedSettings" role="tab" aria-selected="false">Hosted Settings</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Packages</a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active show" id="home" role="tabpanel">
            <div class="card-body">
              <form class="row" action="{{route('authorities.update', $authority->authority_id)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')

                {{-- <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Role:</label>
                <div class="col-sm-5">
                <select class="form-control" name="role">
                <option value="Admin">Admin</option>
                <option value="Manager">Manager</option>
                <option value="User">User</option>
                <option value="Authority">Authority</option>
              </select>
            </div>
          </div> --}}
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

          <div class="form-group row float-right mt-3 p-3">
            <input class="btn btn-rounded btn-success px-5 waves-dark" type="submit" value="Save">
          </div>
        </form>
      </div>
    </div>

    <div class="tab-pane" id="apiSettings" role="tabpanel">
      <div class="card-body">
        <form class="row" action="{{route('authorities.update', $authority->authority_id)}}" method="post">
          {{ csrf_field() }}
          @method('PUT')


          <div class="col-md-12">
            <div class="form-group row">
              <label for="firstName" class="col-sm-4 col-form-label">API Active:</label>
              <div class="switch">
                <label>OFF
                  <input type="checkbox" checked=""><span class="lever"></span>ON</label>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group row">
                <label for="firstName" class="col-sm-4 col-form-label">API Username:</label>
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



            <div class="form-group row float-right mt-3 p-3">
              <input class="btn btn-rounded btn-success px-5 waves-dark" type="submit" value="Save">
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




            <div class="form-group row float-right mt-3 p-3">
              <input class="btn btn-rounded btn-success px-5 waves-dark" type="submit" value="Save">
            </div>


          </form>
        </div>
      </div>

      <!--second tab-->
      <div class="tab-pane" id="profile" role="tabpanel">
        <div class="card-body">
          <form class="" action="{{route('authorities.update', $authority->authority_id)}}" method="post">
            {{ csrf_field() }}
            @method('PUT')

            {{-- <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Role:</label>
            <div class="col-sm-5">
            <select class="form-control" name="role">
            <option value="Admin">Admin</option>
            <option value="Manager">Manager</option>
            <option value="User">User</option>
            <option value="Authority">Authority</option>
          </select>
        </div>
      </div> --}}

      <div class="form-group ">
        <div class="col-md-12">
          <div class=" row ">
            @for ($i=1; $i <= 10; $i++)

              <div class="  form-group col-md-6 ">
                <div class="checkbox checkbox-success">
                  <input id="checkbox{{$i}}" type="checkbox">
                  <label for="checkbox{{$i}}"> Package {{$i}} </label>
                  {{-- <a href="#"><small>View Topic Lists</small></a> --}}
                </div>
              </div>
            @endfor
          </div>
        </div>
      </div>


      <div class="form-group row float-right mt-3 p-3">
        <input class="btn btn-rounded btn-success px-5 waves-dark" type="submit" value="Save">
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
