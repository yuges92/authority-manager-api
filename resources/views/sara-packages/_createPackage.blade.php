@extends('layouts.master')

@section('content')
  <div class="row">
                      <div class="col-12">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="card-title">Simple Toastr Alerts</h4>
                                  <h6 class="card-subtitle">You can use four different alert <code>info, warning, success, and error</code> message.</h6>
                                  <div class="button-box">
                                      <button class="tst1 btn btn-info">Info Message</button>
                                      <button class="tst2 btn btn-warning">Warning Message</button>
                                      <button class="tst3 btn btn-success">Success Message</button>
                                      <button class="tst4 btn btn-danger">Danger Message</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
  <div class="row">
    <div class="col-12">


      <div class="card">
        <div class="card-body wizard-content">
          <h4 class="card-title">Package Manager</h4>
          <form action="{{route('packages.store')}}" class="tab-wizard wizard-circle wizard clearfix" method="post">
            {{ csrf_field() }}
            <div class="content clearfix">
              <h6 id="steps-uid-0-h-0" tabindex="-1" class="title current">Package Info</h6>
              <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false" >
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Package Name :</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Package Description :</label>
                    <textarea class="form-control" name="description" rows="8" cols="80"></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="type">Package type :</label>
                    <select class="custom-select form-control" id="type" name="type">
                      <option value="standard">Standard</option>
                      <option value="custom">Custom</option>
                    </select>
                  </div>
                </div>

                <div class="ml-2">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group ">
                        <h4>Choose Main Topics</h4>

                        <div class="card">
                          <div class="card-body">
                            <!-- Nav tabs -->
                            <div class="vtabs customvtab">
                              <ul class="nav nav-tabs tabs-vertical maintopic-tab" role="tablist">
                                @foreach ($mainTopics as $mainTopic)
                                  <li class="nav-item row my-auto pl-2">
                                    <input type="checkbox" id="md_checkbox_24{{$mainTopic->id}}" class="filled-in chk-col-deep-purple" name="maintopic_id[]" value="{{$mainTopic->id}}">
                                    <label class="my-3" for="md_checkbox_24{{$mainTopic->id}}"></label>
                                    <a class="nav-link show my-auto" data-toggle="tab" href="#mainTopicTab{{$mainTopic->id}}" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">{{$mainTopic->name.' ('.$mainTopic->id}})</span> </a>
                                  </li>
                                @endforeach
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                @foreach ($mainTopics as $mainTopic)

                                  <div class="tab-pane show" id="mainTopicTab{{$mainTopic->id}}" role="tabpanel">
                                    <h3>List of Sub topics for {{$mainTopic->name}} </h3>
                                    <div class="p-20">
                                      <input id="level2{{$mainTopic->id}}" type="checkbox" class="select-all-checkbox" data-target="topics{{$mainTopic->id}}" checked name="maintopic_id[{{$mainTopic->id}}][selectAll]">
                                      <label  for="level2{{$mainTopic->id}}" >Select All Topics </label>
                                    </div>
                                    <div class="" id="topics{{$mainTopic->id}}">
                                      @foreach ($mainTopic->subtopics as $subtopic)

                                        <div class="p-20" >
                                          <input id="level2{{$subtopic->sectionid}}" type="checkbox" checked class="subtopic-checkbox" data-parent="level2{{$subtopic->sectionid}}" name=""value="{{$subtopic->sectionid}}">
                                          <label for="level2{{$subtopic->sectionid}}">{{$subtopic->name.' ('.$subtopic->sectionid}})  </label>
                                        </div>
                                      @endforeach
                                    </div>
                                  </div>
                                @endforeach


                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
