@extends('layouts.master')
@section('content')


  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Package Detail</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#mainTopics" role="tab" aria-selected="false">Main Topics</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#authorities" role="tab" aria-selected="false">Authorities</a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active show" id="home" role="tabpanel">
            <div class="card-body">
              <form class="row" action="{{route('packages.update', $package->id)}}" method="post">
                {{ csrf_field() }}
                @method('PUT')

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Package Name:</label>
                    <div class="col">
                      <input name="name" type="text" class="form-control" id="name" value="{{ $package->name }}" placeholder="Package Name">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="description" class="col-sm-4 col-form-label">Description:</label>
                    <div class="col">
                      <textarea class="form-control" name="description" rows="8" cols="80">{{$package->description}}</textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="firstName" class="col-sm-4 col-form-label">Is Active:</label>
                    <div class="switch col">
                      <label>No
                        <input type="checkbox" {{$package->isActive ?'checked' : ''}} name="isActive" value="1"><span class="lever"></span>Yes</label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="packageType" class="col-sm-4 col-form-label">Package Type:</label>
                      <div class="col">
                        <input type="text" class="form-control" id="packageType" value="{{ $package->type }}" placeholder="Package Type" readonly>
                      </div>
                    </div>
                  </div>


                  <div class="form-group col-12">
                    <input class="btn btn-rounded btn-success px-5 waves-dark float-right" type="submit" value="Save">
                  </div>
                </form>
              </div>
            </div>

            <div class="tab-pane" id="mainTopics" role="tabpanel">
              <div class="card-body">
                @if ($package->type=='standard')
                  <div class="form-group">
                    <button class="btn btn-info collapsed" type="button" data-toggle="collapse" data-target="#addSubtopicCollapse" aria-expanded="false" aria-controls="addSubtopicCollapse">
                      Add a MainTopic
                    </button>
                  </div>
                  <div class="collapse" id="addSubtopicCollapse" style="">
                    <div class="card card-body">
                      <h2>Add MainTopic</h2>
                      <form class="" action="{{route('packages.addMainTopic', $package->id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="subTopics">Subtopics :</label>
                            <select class="js-example-basic-multiple js-states form-control" id="subTopics" multiple="multiple" name="mainTopics[]">
                              @foreach ($mainTopics as $mainTopic)
                                <option value="{{$mainTopic->id}}"  >{{'('.$mainTopic->id.') '.$mainTopic->name}}</option>
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
                          <th>Description</th>
                          <th class="text-right"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($package->mainTopics as $mainTopic)

                          <tr>
                            <td><a href="{{route('mainTopics.show', $mainTopic->id)}}">{{$mainTopic->id}}</a></td>
                            <td><a href="{{route('mainTopics.show', $mainTopic->id)}}">{{$mainTopic->name}}</a></td>
                            <td>{{$mainTopic->description}} </td>
                            <td class="mx-auto row">
                              <a href="{{route('mainTopics.show', $mainTopic->id)}}" class="btn btn-info mx-2">View</a>
                              <form class="deleteForm" action="{{route('packages.removeMainTopic', [$package->id])}}" method="post" >
                                @method('delete')
                                {{ csrf_field() }}
                                <input type="hidden" name="mainTopic" value="{{$mainTopic->id}}">
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
                @endif


                @if ($package->type=='custom')

                  <div class="card-body">
                    <div class="form-group">
                      <button class="btn btn-info collapsed" type="button" data-toggle="collapse" data-target="#addSubtopicCollapse" aria-expanded="false" aria-controls="addSubtopicCollapse">
                        Add a Custom MainTopic
                      </button>
                    </div>
                    <div class="collapse" id="addSubtopicCollapse" style="">
                      <div class="card card-body">
                        <h2>Add Custom MainTopic</h2>
                        {{ csrf_field() }}
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="customMainTopic">Subtopics :</label>
                            <select class="js-example-basic-multiple js-states form-control" id="customMainTopicSelect" name="customMainTopic">
                              <option value="">Select an option</option>
                              @foreach ($mainTopics as $mainTopic)
                                <option value="{{$mainTopic->id }}"
                                  {{($exits=$package->customMainTopics()
                                    ->wherePivot('mainTopic_id',$mainTopic->id)
                                    ->wherePivot('package_id',$package->id)
                                    ->count()> 0) ? 'disabled':''}}>
                                  {{'('.$mainTopic->id.') '.$mainTopic->name}}
                                   {{($exits) ? '(Already Exist)' :''}}
                                </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <input type="hidden" id="packageID" name="package_id" value="{{$package->id}}">

                        <div class="card-body row" id="customSubTopicsBody" style="display:none">
                          <div class="mx-auto my-auto spinner" id="customSubTopicSpinnerDiv">
                            <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                              <span class="sr-only">Loading...</span>
                            </div>
                          </div>
                          <form id="addCustomMainSubTopicForm" class="col-12"  method="post">

                            <div class=""id="customSubTopicList" >

                            </div>

                            <div class="form-group col-12">
                              <button id="customTopicSaveBtn" type="submit" name="button" class="btn btn-rounded btn-success px-5 waves-dark float-right">
                                Save
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="list-group col-md-10" id="customMainTopicsTab">
                        {{-- {{dd($package->customMainTopics->groupBy('AS_MainTopics.mainTopic_id'))}} --}}
                        @foreach ($package->customMainTopics->unique('id')->all() as $customMainTopic)

                          <div class="list-group-item d-flex flex-justify-cotent-between">
                            <a href="#customSubTopic{{$customMainTopic->id}}" class="col my-auto" onclick="openSubtopicTab({{$package->id}},{{$customMainTopic->id}})">{{$customMainTopic->name}}</a>
                            <div class="row mx-auto">
                              <a class="btn btn-info mr-1" href="{{route('mainTopics.show', $customMainTopic->id)}}">View</a>
                              <form class="deleteForm" action="{{route('removeCustomMainTopic', [$package->id])}}" method="post">
                                @method('delete')
                                {{ csrf_field() }}
                                <input type="hidden" name="mainTopic" value="{{$customMainTopic->id}}">
                                <div class="">
                                  <button class="btn btn-danger" type="submit" name="button">Remove</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        @endforeach

                      </div>

                      <div class="col-md-6 card m-0" id="customSubTopicTab" style="display:none">
                        <div class="mx-auto my-auto spinner" id="spinnerDiv">
                          <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                          </div>
                        </div>
                        <div class="card-body " id="subTopicsBody" style="display:none">
                          <form id="updateSubtopicForm" class="" action="{!! route('updateCustomSubTopics', [27, 1]) !!}" method="post">

                            <div class=""id="subTopicList" >

                            </div>
                            {{-- @foreach ($package->customMainTopics->unique('id')->all() as $subtopic)
                            <div class="" >
                            <input id="subTopic{{$subtopic->id}}" type="checkbox"  class="subtopic-checkbox"  name="custom-subTopics[]" value="{{$subtopic->sectionid}}">
                            <label for="subTopic{{$subtopic->id}}">{{$subtopic->name.' ('.$subtopic->sectionid}})  </label>
                          </div>
                        @endforeach --}}
                        <div class="form-group col-12">
                          <button id="saveBtn" type="submit" name="button" class="btn btn-rounded btn-success px-5 waves-dark float-right">
                            Save
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endif

          </div>
        </div>

        <!--second tab-->
        <div class="tab-pane" id="authorities" role="tabpanel">
          <div class="card-body">
            <button type="button" name="button" data-toggle="modal" data-target="#verticalcenter" class="btn btn-info">Add an Authority</button>

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
                  @foreach ($package->authorities as $authority)

                    <tr>
                      <td><a href="{{route('authorities.show', $authority->authority_id)}}">{{$authority->authority_id}}</a></td>
                      <td><a href="{{route('authorities.show', $authority->authority_id)}}">{{$authority->short_name}}</a></td>
                      <td class="row mx-auto">
                        <a href="{{route('authorities.show', $authority->authority_id)}}" class="btn btn-primary mr-1">View</a>
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

      </div>
    </div>
  </div>
  <!-- Column -->
</div>


@endsection


@push('js')
  <script type="text/javascript">
  $(document).ready(function() {

    $('body').on('submit', '#updateSubtopicForm', function(event) {
      event.preventDefault();
      $('#saveBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', 'disabled');;
      var package_id=$(this).find('#package_id').val();
      var mainTopic_id=$(this).find('#mainTopic_id').val();
      var  formData = $(this).serialize();
      console.log(formData);
      axios.post('/packages/'+package_id+'/MainTopics/'+mainTopic_id+'/customSubTopics',{
        formData:formData

      })
      .then(function (response) {
        $.toast({
          heading: 'Updated',
          text: 'Main Topics lists updated successfully',
          position: 'top-right',
          loaderBg:'#ffffff',
          icon: 'success',
          hideAfter: 3000,
          stack: 6
        });
        console.log(response);
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      })
      .then(function () {
        $('#saveBtn').html('Save').removeAttr('disabled');

        // always executed
      });

    });

    $('body').on('submit', '#addCustomMainSubTopicForm', function(event) {
      event.preventDefault();
      $('#customTopicSaveBtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>').attr('disabled', 'disabled');;
      var package_id=$(this).find('#package_id').val();
      var mainTopic_id=$(this).find('#mainTopic_id').val();
      var  formData = $(this).serialize();
      console.log(formData);
      axios.post('/packages/'+package_id+'/MainTopics/'+mainTopic_id+'/customSubTopics',{
        formData:formData

      })
      .then(function (response) {
        $.toast({
          heading: 'Updated',
          text: 'Main Topics lists updated successfully',
          position: 'top-right',
          loaderBg:'#ffffff',
          icon: 'success',
          hideAfter: 3000,
          stack: 6
        });
        console.log(response);
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      })
      .then(function () {
        $('#customTopicSaveBtn').html('Save').removeAttr('disabled');
location.reload();
        // always executed
      });

    });

    $('#customMainTopicSelect').on('change', function(event) {
      var customMainTopic_id=$(this).val();
      $('#addCustomMainSubTopicForm').hide();

      if(customMainTopic_id){
        $('#customSubTopicsBody').show();
        $('#customSubTopicSpinnerDiv').show();
        var packageID= $('#packageID').val();
        axios.get('/packages/'+packageID+'/MainTopics/'+customMainTopic_id+'/customSubTopics')
        .then(function (response) {
          console.log(response);
          $('#customSubTopicList').empty();
          // handle success
          var results=response.data;
          var subTopics=results.Subtopics;
          var mainTopic=results.mainTopic;
          $('#customSubTopicList').append('<h4>'+mainTopic.name+'</h4>');
          $('#customSubTopicList').append('<input id="package_id" type="hidden" name="package_id" value="'+packageID+'">');
          $('#customSubTopicList').append('<input id="mainTopic_id" type="hidden" name="mainTopic_id" value="'+customMainTopic_id+'"> ');

          subTopics.forEach(function (subTopic) {
            $('#customSubTopicList').append('<div class="" >'
            +'<input id="subTopic'+subTopic.sectionid+'" type="checkbox" class="subtopic-checkbox"  name="custom-subTopics[]" value="'+subTopic.sectionid+'">'
            +'<label for="subTopic'+subTopic.sectionid+'"> '+subTopic.name+ ' ('+subTopic.sectionid+')</label>'
            +'</div>');
          });
        })
        .catch(function (error) {
          // handle error
          console.log(error);
        })
        .then(function () {
          // always executed
          $('#customSubTopicSpinnerDiv').hide();
          $('#addCustomMainSubTopicForm').show();

        });

      }
    });

  });

  function openSubtopicTab(packageID,mainTopic_id){

    $('#customMainTopicsTab').removeClass('col-md-10').addClass('col-md-6');
    $('#customSubTopicTab').show();
    $('#subTopicsBody').hide();
    $('#spinnerDiv').show();
    axios.get('/packages/'+packageID+'/MainTopics/'+mainTopic_id+'/customSubTopics')
    .then(function (response) {
      $('#subTopicList').empty();
      // handle success
      var results=response.data;
      var subTopics=results.Subtopics;
      var mainTopic=results.mainTopic;
      var chosenTopics=results.CustomChosenSubtopics;
      $('#subTopicList').append('<h4>'+mainTopic.name+'</h4>');
      $('#subTopicList').append('<input id="package_id" type="hidden" name="package_id" value="'+packageID+'">');
      $('#subTopicList').append('<input id="mainTopic_id" type="hidden" name="mainTopic_id" value="'+mainTopic_id+'"> ');
      subTopics.forEach(function (subTopic) {
        var checked= chosenTopics.some(chosenTopic => chosenTopic.sectionid===subTopic.sectionid) ? 'checked' :'';
        $('#subTopicList').append('<div class="" >'
        +'<input id="subTopic'+subTopic.sectionid+'" type="checkbox" '+checked+' class="subtopic-checkbox"  name="custom-subTopics[]" value="'+subTopic.sectionid+'">'
        +'<label for="subTopic'+subTopic.sectionid+'"> '+subTopic.name+ ' ('+subTopic.sectionid+')</label>'
        +'</div>');
      });
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    })
    .then(function () {
      // always executed
      $('#spinnerDiv').hide();
      $('#subTopicsBody').show();

    });

  }
  </script>
@endpush
