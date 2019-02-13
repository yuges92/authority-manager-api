@extends('layouts.master')

@section('content')

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
                          <div class="card-body" id="chooseTopicBody">
                            <section id="standard" >
                              @foreach ($mainTopics as $mainTopic)

                                <div class="tab-pane show" id="mainTopicTab{{$mainTopic->id}}" role="tabpanel">
                                  <div class="nav-item row my-auto pl-2">
                                    <input type="checkbox" id="mainTopicCheckboxStandard{{$mainTopic->id}}" class="filled-in chk-col-deep-purple main-topic-checkbox" name="maintopics[]" value="{{$mainTopic->id}}" data-checkbox="#checkAll{{$mainTopic->id}}">
                                    <label class="my-3 fs-2" for="mainTopicCheckboxStandard{{$mainTopic->id}}">{{$mainTopic->name}}</label>
                                  </div>

                                  <ul class="col-md-6">
                                    @foreach ($mainTopic->subtopics as $subtopic)
                                      <li>{{$subtopic->name .'('.$subtopic->sectionid}})</li>
                                    @endforeach
                                  </ul>
                                </div>
                              @endforeach
                            </section>

                            <section class="" id="custom" style="display:none">

                              @foreach ($mainTopics as $mainTopic)

                                <div class="tab-pane show border-bottom mb-2" id="mainTopicTab{{$mainTopic->id}}" role="tabpanel">
                                  <div class="nav-item row my-auto pl-2">
                                    <input type="checkbox" id="mainTopicCheckbox{{$mainTopic->id}}" class="filled-in chk-col-deep-purple main-topic-checkbox" name="custom-maintopics[]" value="{{$mainTopic->id}}" data-checkbox="#checkAll{{$mainTopic->id}}">
                                    <label class="my-3 fs-2" for="mainTopicCheckbox{{$mainTopic->id}}">{{$mainTopic->name.' ('.$mainTopic->id}})</label>
                                  </div>

                                  <div class="px-3">
                                    <input id="checkAll{{$mainTopic->id}}" type="checkbox" class="select-all-checkbox" data-target="topics{{$mainTopic->id}}"   data-parent="#mainTopicCheckbox{{$mainTopic->id}}">
                                    <label class="text-success" for="checkAll{{$mainTopic->id}}" >Select All Topics </label>
                                  </div>
                                  <div class="row mx-auto" id="topics{{$mainTopic->id}}">
                                    @foreach ($mainTopic->subtopics as $subtopic)
                                      <div class="col-md-6" >
                                        <input id="subTopic{{$mainTopic->id.$subtopic->sectionid}}" type="checkbox"  class="subtopic-checkbox" data-parent="#mainTopicCheckbox{{$mainTopic->id}}" name="custom-subTopics[{{$mainTopic->id}}][]" value="{{$subtopic->sectionid}}">
                                        <label for="subTopic{{$mainTopic->id.$subtopic->sectionid}}">{{$subtopic->name.' ('.$subtopic->sectionid}})  </label>
                                      </div>
                                    @endforeach
                                  </div>
                                </div>
                              @endforeach
                            </section>



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

@push('js')

  <script type="text/javascript">
  $(document).ready(function() {

    $('#type').on('change', function () {

      if($(this).val()=='standard'){
        $('#standard').show();
        $('#custom').hide();
      }

      if($(this).val()=='custom'){
        $('#custom').show();
        $('#standard').hide();

      }
    })
  });
</script>

@endpush
