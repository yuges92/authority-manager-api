@extends('layouts.master')
@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Main Topic Detail</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#subTopics" role="tab" aria-selected="false">Sub Topics</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#packages" role="tab" aria-selected="false">Packages</a> </li>
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
                    <label for="firstName" class="col-sm-4 col-form-label">Topic ID:</label>
                    <div class="col">
                      <input name="firstName" type="text" class="form-control" id="firstName" value="{{ $mainTopic->id }}" placeholder="Topic ID" readonly>
                    </div>
                  </div>
                </div>


                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Is Used:</label>
                    <div class="switch col">
                      <label>No
                        <input type="checkbox" {{$mainTopic->is_used ?'checked' : ''}} name="is_used" value="1"><span class="lever"></span>Yes</label>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="firstName" class="col-sm-4 col-form-label">Name:</label>
                      <div class="col">
                        <input name="firstName" type="text" class="form-control" id="firstName" value="{{ $mainTopic->name }}" placeholder="First name">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="firstName" class="col-sm-4 col-form-label">Description:</label>
                      <div class="col">
                        <textarea class="form-control" name="description" rows="8" cols="80">{{$mainTopic->description}}</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="firstName" class="col-sm-4 col-form-label">File Name:</label>
                      <div class="col">
                        <input name="firstName" type="text" class="form-control" id="firstName" value="{{ $mainTopic->filename }}" placeholder="First name">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="firstName" class="col-sm-4 col-form-label">Topic Order:</label>
                      <div class="col">
                        <input name="firstName" type="text" class="form-control" id="firstName" value="{{ $mainTopic->order }}" placeholder="First name">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="firstName" class="col-sm-4 col-form-label">Type:</label>
                      <div class="col">
                        <select class="custom-select form-control" id="type" name="type">
                          <option value="standard" {{$mainTopic->type=='standard'?'checked':''}}>Standard</option>
                          <option value="custom" {{$mainTopic->type=='custom'?'checked':''}}>Custom</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="firstName" class="col-sm-4 col-form-label">Video URL:</label>
                      <div class="col">
                        <input name="firstName" type="text" class="form-control" id="firstName" value="{{ $mainTopic->video_url }}" placeholder="Video URL">
                      </div>
                    </div>
                  </div>


                  <div class="form-group col-12">
                    <input class="btn btn-rounded btn-success px-5 waves-dark float-right" type="submit" value="Save">
                  </div>
                </form>
              </div>
            </div>

            <div class="tab-pane" id="subTopics" role="tabpanel">
              <div class="card-body">
                <button type="button" name="button" data-toggle="modal" data-target="#verticalcenter" class="btn btn-info">Add a sub topic</button>
                <div class="table-responsive">
                  <table class=" display nowrap table table-hover table-striped table-bordered dataTable"  id="table_id">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        {{-- <th>Description</th> --}}
                        <th class="text-right"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($mainTopic->subTopics as $subTopic)

                        <tr>
                          <td><a href="{{route('authorities.show', $subTopic->sectionid)}}">{{$subTopic->sectionid}}</a></td>
                          <td><a href="{{route('authorities.show', $subTopic->sectionid)}}">{{$subTopic->name}}</a></td>
                          {{-- <td >{{$subTopic->description}} </td> --}}
                          <td >
                            <a href="{{route('packages.show', $subTopic->sectionid)}}" class="btn btn-primary">View</a>
                            <a href="{{route('authorities.show', $subTopic->sectionid)}}" class="btn btn-danger">Remove</a>
                          </td>
                        </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>

              </div>
            </div>



            <!--second tab-->
            <div class="tab-pane" id="packages" role="tabpanel">
              <div class="card-body">
                <button type="button" name="button" data-toggle="modal" data-target="#verticalcenter" class="btn btn-info">Add to Package</button>
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
                          <td><a href="{{route('packages.show', $i)}}">{{$i}}</a></td>
                          <td><a href="{{route('packages.show', $i)}}">Package Name</a></td>
                          <td class="text-right">
                            <a href="{{route('packages.show', $i)}}" class="btn btn-primary">View</a>
                            <a href="{{route('packages.show', $i)}}" class="btn btn-danger">Remove</a>
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
