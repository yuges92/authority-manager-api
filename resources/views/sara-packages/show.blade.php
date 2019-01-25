@extends('layouts.master')
@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Package Detail</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#topics" role="tab" aria-selected="false">Main Topics</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#authorities" role="tab" aria-selected="false">Authorities</a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active show" id="home" role="tabpanel">
            <div class="card-body">
              <form class="row" action="{{route('authorities.update', 1)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Package Name:</label>
                    <div class="col">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{ $package->name }}" placeholder="First name">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Short Name:</label>
                    <div class="col">
                      <textarea class="form-control" name="description" rows="8" cols="80">{{$package->description}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">API Active:</label>
                    <div class="switch col">
                      <label>No
                        <input type="checkbox" {{$package->isActive ?'checked' : ''}} name="isActive" value="1"><span class="lever"></span>Yes</label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="firstName" class="col-sm-4 col-form-label">Type:</label>
                      <div class="col">
                        <select class="custom-select form-control" id="type" name="type">
                          <option value="standard" {{$package->type=='standard'?'checked':''}}>Standard</option>
                          <option value="custom" {{$package->type=='custom'?'checked':''}}>Custom</option>
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group col-12">
                    <input class="btn btn-rounded btn-success px-5 waves-dark float-right" type="submit" value="Save">
                  </div>
                </form>
              </div>
            </div>

            <div class="tab-pane" id="topics" role="tabpanel">
              <div class="card-body">
                <button type="button" name="button" data-toggle="modal" data-target="#verticalcenter" class="btn btn-info">Add Main Topic</button>
                <div class="table-responsive">
                  <table class=" display nowrap table table-hover table-striped table-bordered dataTable"  id="table_id">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-right"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i=1; $i <=5; $i++)

                        <tr>
                          <td><a href="{{route('authorities.show', $i)}}">{{$i}}</a></td>
                          <td><a href="{{route('authorities.show', $i)}}">Topic Name</a></td>
                          <td>package Description </td>
                          <td class="text-right">
                            <a href="{{route('packages.show', $i)}}" class="btn btn-primary">View Topic</a>
                            <a href="{{route('authorities.show', $i)}}" class="btn btn-danger">Remove</a>
                          </td>
                        </tr>
                      @endfor
                    </tbody>
                  </table>
                </div>

              </div>
            </div>



            <!--second tab-->
            <div class="tab-pane" id="authorities" role="tabpanel">
              <div class="card-body">
                <button type="button" name="button" data-toggle="modal" data-target="#verticalcenter" class="btn btn-info">Add an Authority</button>

                <div class="btn-group" data-toggle="buttons">
                  <span class="btn btn-info active">
                    <input type="checkbox" id="md_checkbox_21" class="filled-in chk-col-light-blue" checked="">
                    <label class="" for="md_checkbox_21">Checkbox</label>
                  </span>
                  <label class="btn btn-info active">
                    <input type="checkbox" id="md_checkbox_22" class="filled-in chk-col-light-blue">
                    <label class="" for="md_checkbox_22">Checkbox</label>
                  </label>

                </div>
                <label class="btn btn-info my-auto">
                  <input type="checkbox" id="md_checkbox_23" class="filled-in chk-col-light-blue">
                  <label class="my-auto" for="md_checkbox_23">Checkbox</label>
                </label>
                <div class="table-responsive">
                  <table class=" display nowrap table table-hover table-striped table-bordered dataTable data-table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="text-right"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @for ($i=1; $i <=5; $i++)

                        <tr>
                          <td><a href="{{route('authorities.show', $i)}}">{{$i}}</a></td>
                          <td><a href="{{route('authorities.show', $i)}}">Authority Name</a></td>
                          <td class="text-right">
                            <a href="{{route('packages.show', $i)}}" class="btn btn-primary">View</a>
                            <a href="{{route('authorities.show', $i)}}" class="btn btn-danger">Remove</a>
                          </td>
                        </tr>
                      @endfor
                    </tbody>
                  </table>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- Column -->
    </div>


  @endsection
