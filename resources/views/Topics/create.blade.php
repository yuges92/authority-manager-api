@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body wizard-content">
          <h4 class="card-title">Topics Manager</h4>
          <form action="{{route('topics.store')}}" class=" clearfix" method="post">
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

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="video_url">Topic video url :</label>
                              <input type="text" class="form-control" id="video_url" name="video_url">
                            </div>
                            </div>

                            <div class="ml-2">

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <h4>Sub Topics Topics</h4>
                                    <div class="form-group">
                                      <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search by id, title">
                                        <div class="input-group-append">
                                          <button class="btn btn-info" type="button">Search!</button>
                                        </div>
                                      </div>
                                    </div>
                                    <div class=" alert alert-primary">
                                      <div class="form-group">
                                        <div class="checkbox checkbox-success">
                                          <input id="level2" type="checkbox" class="select-all-checkbox" data-target="topics">
                                          <label  for="level2" >Select All Topics </label>
                                        </div>
                                        <div class="" id="topics">


                                          @for ($j=1; $j <= 15; $j++)
                                            <div class="checkbox checkbox-success" >
                                              <input id="level2{{$j}}" type="checkbox">
                                              <label for="level2{{$j}}">Topic {{$j}}  </label>
                                            </div>
                                          @endfor
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div id="accordion">


                                </div>


                              </div>
                            </div>

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
