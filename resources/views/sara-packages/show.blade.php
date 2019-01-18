@extends('layouts.master')
@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Package Detail</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#apiSettings" role="tab" aria-selected="false">Topics</a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active show" id="home" role="tabpanel">
            <div class="card-body">
              <form class="row" action="{{route('authorities.update', 1)}}" method="post">
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
        <form class="" action="{{route('authorities.update', 1)}}" method="post">
          {{ csrf_field() }}
          @method('PUT')
          <div class="" id="accordion">
          </div>

            <div class="form-group ">
              <h4>Choose Main Topics</h4>
              <div class="row">

              @for ($i=1; $i <= 5; $i++)
                <div class="col-md-6 ">
                <div class="row px-2">

                  <input type="checkbox" id="md_checkbox_24{{$i}}" class="filled-in chk-col-deep-purple my-auto" >
                  <label class="my-3" for="md_checkbox_24{{$i}}"></label>
                  {{-- <button class="btn link col text-left topic-btn" type="button" name="button" >Topic</button> --}}
                  <div class="card col">
                    <div class="card-header">
                      <a class="card-link" data-toggle="collapse" href="#collapseOne{{$i}}">
                        <h2>
                          Level 1 Topic #{{$i}}
                        </h2>
                      </a>
                    </div>
                    <div id="collapseOne{{$i}}" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <div class=" alert alert-primary">
                          <div class="form-group">
                            <h5>Level 2 Topics</h5>
                            <div class="checkbox checkbox-success">
                              <input id="level2{{$i}}" type="checkbox" class="select-all-checkbox" data-target="topics{{$i}}">
                              <label  for="level2{{$i}}" >Select All Topics </label>
                            </div>
                            <div class="" id="topics{{$i}}">

                              @for ($j=1; $j <= 5; $j++)
                                <div class="checkbox checkbox-success" >
                                  <input id="level2{{$i.$j}}" type="checkbox">
                                  <label for="level2{{$i.$j}}">Topic {{$i.$j}}  </label>
                                </div>
                              @endfor
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @endfor
            </div>
            </div>
          {{-- </div> --}}



          <div class="form-group row float-right mt-3 p-3">
            <input class="btn btn-rounded btn-success px-5 waves-dark" type="submit" value="Save">
          </div>


        </form>
      </div>
    </div>

    <div class="tab-pane" id="hostedSettings" role="tabpanel">
      <div class="card-body">
        <form class="" action="{{route('authorities.update', 1)}}" method="post">
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
        <form class="" action="{{route('authorities.update', 1)}}" method="post">
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
