@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body wizard-content">
          <h4 class="card-title">Main Topics Manager</h4>
          <form action="{{route('mainTopics.store')}}" class=" clearfix" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="content clearfix">
              <!-- Step 1 -->
              <section class="body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Main Topic name :</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="slug">Main Topic Slug :</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="description">Main Topic description :</label>
                    <textarea class="form-control" name="description" rows="8" cols="80">{{old('description')}}</textarea>

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group ">
                    <label for="filename">Main Topic filename :</label>

                    <input type="file" name="filename" id="filename" class="dropify " data-height="300" data-default-file="{{old('filename')}}" value="{{old('filename')}}" data-min-width="400" data-allowed-file-extensions="png jpg jpeg svg">

                  </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group">
                    <label for="order">Main Topic order :</label>
                    <input type="text" class="form-control" id="order" name="order" value="{{old('order')}}">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group row mx-auto">
                    <label for="is_used">in use :</label>
                    <div class="ml-3 switch ">
                      <label>
                        No
                        <input type="checkbox" name="is_used" value="1" {{old('is_used') ? 'checked' : ''}}>
                        <span class="lever"></span>
                        Yes
                      </label>
                      </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="subTopics">Subtopics :</label>
                    <select class="js-example-basic-multiple js-states form-control" id="subTopics" multiple="multiple" name="subTopics[]">
                      @foreach ($subTopics as $subTopic)
                        <option value="{{$subTopic->sectionid}}" @if(is_array(old('subTopics')) && in_array($subTopic->sectionid, old('subTopics'))) selected @endif >{{'('.$subTopic->sectionid.') '.$subTopic->name}}</option>
                      @endforeach
                    </select>
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
