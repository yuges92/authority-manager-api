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
              <form class="row" action="{{route('mainTopics.update', $mainTopic->id)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="topic_id" class="col-sm-4 col-form-label">Topic ID:</label>
                    <div class="col">
                      <input type="text" class="form-control" id="topic_id" value="{{ $mainTopic->id }}" placeholder="Topic ID" readonly>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="is_used" class="col-sm-4 col-form-label">Is Used:</label>
                    <div class="switch col">
                      <label>No
                        <input type="checkbox" {{$mainTopic->is_used ?'checked' : ''}} name="is_used" value="1" id="is_used"><span class="lever"></span>
                        Yes
                      </label>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Name:</label>
                    <div class="col">
                      <input name="name" type="text" class="form-control" id="name" value="{{ $mainTopic->name }}" placeholder="Name">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="slug" class="col-sm-4 col-form-label">Slug:</label>
                    <div class="col">
                      <input name="slug" type="text" class="form-control" id="slug" value="{{ $mainTopic->slug }}" placeholder="Slug">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="description" class="col-sm-4 col-form-label">Description:</label>
                    <div class="col">
                      <textarea class="form-control" name="description" rows="8" cols="80">{{$mainTopic->description}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="filename" class="col-sm-4 col-form-label">File Name:</label>
                    <div class="col">
                      <input name="filename" type="text" class="form-control" id="filename" value="{{ $mainTopic->filename }}" placeholder="Filename">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="order" class="col-sm-4 col-form-label">Topic Order:</label>
                    <div class="col">
                      <input name="order" type="text" class="form-control" id="order" value="{{ $mainTopic->order }}" placeholder="Order">
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
              <div class="form-group">

                <button class="btn btn-info collapsed" type="button" data-toggle="collapse" data-target="#addSubtopicCollapse" aria-expanded="false" aria-controls="addSubtopicCollapse">
                  Add a subtopic
                </button>
              </div>
              <div class="collapse" id="addSubtopicCollapse" style="">
                <div class="card card-body">
                  <h2>Add Subtopics</h2>
                  <form class="" action="{{route('mainTopics.addSubtopics', $mainTopic->id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="subTopics">Subtopics :</label>
                        <select class="js-example-basic-multiple js-states form-control" id="subTopics" multiple="multiple" name="subTopics[]">
                          @foreach ($subTopics as $subTopic)
                            <option value="{{$subTopic->sectionid}}"  >{{'('.$subTopic->sectionid.') '.$subTopic->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group col-12">
                      <input class="btn btn-rounded btn-success px-5 waves-dark float-right" type="submit" value="Save">
                    </div>
                  </form>
                </div>
              </div>
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
                          <form class="deleteForm" action="{{route('mainTopics.removeSubtopic', [$mainTopic->id])}}" method="post">
                            @method('delete')
                            {{ csrf_field() }}
                            <input type="hidden" name="subtopic_id" value="{{$subTopic->sectionid}}">
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



          <!--second tab-->
          <div class="tab-pane" id="packages" role="tabpanel">
            <div class="card-body">
              <button class="btn btn-success collapsed" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Add to Package
              </button>
              <div class="collapse" id="collapseExample" style="">
                <div class="card card-body">
                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
              </div>
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
