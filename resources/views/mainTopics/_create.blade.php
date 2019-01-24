@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body wizard-content">
          <h4 class="card-title">Topics Manager</h4>
          <form action="{{route('mainTopics.store')}}" class=" clearfix" method="post">
            {{ csrf_field() }}
            <div class="content clearfix">
              <!-- Step 1 -->
              <section class="body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Topic name :</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="description">Topic description :</label>
                      <input type="text" class="form-control" id="description" name="description">
                    </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="filename">Topic filename :</label>
                        <input type="text" class="form-control" id="filename" name="filename">
                       </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="order">Topic order :</label>
                          <input type="text" class="form-control" id="order" name="order">
                         </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="is_used">Topic used :</label>
                            <input type="text" class="form-control" id="is_used" name="is_used">
                          </div>
                          </div>

                            <div class="ml-2">
                              <div class="row">
                                <div class="col-md-6">
                                    {{-- <div class="form-group">
                                      <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search by id, title">
                                        <div class="input-group-append">
                                          <button class="btn btn-info" type="button">Search!</button>
                                        </div>
                                      </div>
                                    </div> --}}
                                        {{-- <div class="checkbox checkbox-success">
                                          <input id="level2" type="checkbox" class="select-all-checkbox" data-target="topics">
                                          <label  for="level2" >Select All Topics </label>
                                        </div> --}}
                                        <div class="" id="topics">
                                          <div class="card">
                                            <div class="card-body">
                                              <h4>Choose Sub Topics Topics</h4>
                                              <div class="table-responsive">
                                                <table class=" display nowrap table table-hover table-striped table-bordered dataTable data-table"  id="table_id1">
                                                  <thead>
                                                    <tr>
                                                      <th>ID</th>
                                                      <th>Name</th>
                                                      <th>Description</th>
                                                      <th></th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    @foreach ($subTopics as $subTopic)
                                                      <tr id="{{$subTopic->sectionid}}">
                                                        <td><a href="{{route('mainTopics.show', $subTopic->sectionid)}}">{{$subTopic->sectionid}}</a></td>
                                                        <td><a href="{{route('mainTopics.show', $subTopic->sectionid)}}">{{$subTopic->name}}</a></td>
                                                        <td>{{$subTopic->description}}</td>
                                                        <td><button class="btn btn-info btn-add-subTopic" type="button" data-row="{{$subTopic->sectionid}}" >Add</button></td>
                                                      </tr>
                                                    @endforeach
                                                  </tbody>
                                                </table>
                                              </div>
                                            </div>

                                          </div>
                                        </div>

                                </div>

                                <div class="card col">

                                  <div class="card-body">
                                    <h4>Chosen Sub Topics Topics</h4>
                                    <div class="table-responsive">
                                      <table class=" display nowrap table table-hover table-striped table-bordered dataTable data-table"  id="table_id2">
                                        <thead>
                                          <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                          </tr>

                                        </tbody>
                                      </table>
                                    </div>
                                  </div>


                                </div>


                              </div>
                            </div>

                            <label for="id_label_multiple">
                              <select class="js-example-basic-multiple js-states form-control" id="id_label_multiple" multiple="multiple">
                                @foreach ($subTopics as $subTopic)
                                  <option value="{{$subTopic->sectionid}}" {{(old('authority_id')==$subTopic->sectionid) ? 'selected':''}}>{{'('.$subTopic->sectionid.') '.$subTopic->name}}</option>
                                @endforeach
                              </select>
                            </label>


                          </section>

                          <div class="form-group row float-right mt-3 p-3">
                            <input class="btn btn-rounded btn-primary px-5" type="submit" value="Save">
                          </div>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>









            @endsection
