@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body wizard-content">
          <h4 class="card-title">Authority Manager</h4>
          <form action="#" class="tab-wizard wizard-circle wizard clearfix" role="application" id="steps-form">
            <div class="steps clearfix">
              <ul role="tablist">
                <li role="tab" class="first current" aria-disabled="false" aria-selected="true">
                  <a id="steps-uid-0-t-0" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0">
                    <span class="current-info audible">current step: </span>
                    <span class="step">1</span> Authority  Info
                  </a>
                </li>
                <li role="tab" class="disabled last" aria-disabled="true">
                  <a id="steps-uid-0-t-1" href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1">
                    <span class="step">2</span> Packages
                  </a>
                </li>

                <li role="tab" class="disabled last" aria-disabled="true">
                  <a id="steps-uid-0-t-1" href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1">
                    <span class="step">3</span> Packages
                  </a>
                </li>
              </ul>
            </div>
            <div class="content clearfix">
              <!-- Step 1 -->
              <h6 id="steps-uid-0-h-0" tabindex="-1" class="title current">Package Info</h6>
              <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current" aria-hidden="false" >
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="firstName1">Package Name :</label>
                    <input type="text" class="form-control" id="firstName1"> </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="lastName1">Package type :</label>
                      <select class="custom-select form-control" id="location1" name="location">
                        <option value="">Select City</option>
                        <option value="standard">Standard</option>
                        <option value="custom">Custom</option>
                      </select>
                    </div>
                  </div>


                </section>
                <!-- Step 2 -->
                <h6 id="steps-uid-0-h-1" tabindex="-1" class="title">Topics</h6>
                <section id="steps-uid-0-p-1" role="tabpanel" aria-labelledby="steps-uid-0-h-1" class="body" aria-hidden="true" style="display:none">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <h4>Level 1 Topics</h4>
                        @for ($i=1; $i <= 5; $i++)
                          <div class="">

                          <input type="checkbox" id="md_checkbox_24{{$i}}" class="filled-in chk-col-deep-purple" >
                          <label for="md_checkbox_24{{$i}}">Topic {{$i}}</label>
                        </div>
                      @endfor
                      </div>
                    </div>

                    <div class="col-md-6 alert alert-info">
                      <div class="form-group">
                        <h5>Level 2 Topics</h5>
                        @for ($i=1; $i <= 5; $i++)
                        <div class="checkbox checkbox-success">
                          <input id="level2{{$i}}" type="checkbox">
                          <label for="level2{{$i}}">Topic {{$i}}  </label>
                        </div>
                      @endfor
                      </div>
                    </div>
                  </div>

                </section>


              </div>
              <div class="actions clearfix">
                <ul role="menu" aria-label="Pagination">
                  <li class="disabled" aria-disabled="true">
                    <a href="#previous" role="menuitem">Previous</a>
                  </li>
                  <li aria-hidden="false" aria-disabled="false">
                    <a href="#next" role="menuitem">Next</a>
                  </li>
                  <li aria-hidden="true" style="display: none;">
                    <a href="#finish" role="menuitem">Submit</a>
                  </li>
                </ul>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


@endsection
