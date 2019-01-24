@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body wizard-content">
          <h4 class="card-title">Topics Manager</h4>
          <form action="#" class="tab-wizard wizard-circle wizard clearfix" role="application" id="steps-form">
            <div class="content clearfix">
              <!-- Step 1 -->
              <section class="body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="firstName1">Topic name :</label>
                    <input type="text" class="form-control" id="firstName1"> </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="firstName1">Topic description :</label>
                      <input type="text" class="form-control" id="firstName1"> </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstName1">Topic filename :</label>
                        <input type="text" class="form-control" id="firstName1"> </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstName1">Topic order :</label>
                          <input type="text" class="form-control" id="firstName1"> </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="firstName1">Topic used :</label>
                            <input type="text" class="form-control" id="firstName1"> </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="firstName1">Topic video url :</label>
                              <input type="text" class="form-control" id="firstName1"> </div>
                            </div>

                            <div class="ml-2">

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <h4>Sub Topics Topics</h4>
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
