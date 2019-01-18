@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body wizard-content">
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
              <section id=""  class="body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="firstName1">First Name :</label>
                      <input type="text" class="form-control" id="firstName1"> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastName1">Last Name :</label>
                        <input type="text" class="form-control" id="lastName1"> </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="emailAddress1">Email Address :</label>
                          <input type="email" class="form-control" id="emailAddress1"> </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="phoneNumber1">Phone Number :</label>
                            <input type="tel" class="form-control" id="phoneNumber1"> </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="location1">Select City :</label>
                              <select class="custom-select form-control" id="location1" name="location">
                                <option value="">Select City</option>
                                <option value="Amsterdam">India</option>
                                <option value="Berlin">USA</option>
                                <option value="Frankfurt">Dubai</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="date1">Date of Birth :</label>
                              <input type="date" class="form-control" id="date1"> </div>
                            </div>
                          </div>
                        </section>
                        <!-- Step 2 -->
                        <section id="" class="body " hidden >
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="form-group form-material">
                                <label class="sr-only">Search</label>
                                <input type="text" class="form-control form-control-line" value="" placeholder="Search packages">
                              </div>
                            </div>
                          </div>


                          <div class="form-group">
                            <div class="col-md-6">
                              <div class="list-group">
                                @foreach ($packages as $package)
                                  <div class="form-group">
                                    <div class="checkbox checkbox-success">
                                      <input id="checkbox{{$package->id}}" type="checkbox">
                                      <label for="checkbox{{$package->id}}"> {{$package->name}} </label>
                                    </div>
                                  </div>
                                @endforeach
                                <div class="form-group">
                                  <div class="checkbox checkbox-success">
                                    <input id="checkbox{{$package->id}}" type="checkbox">
                                    <label for="checkbox{{$package->id}}"> {{$package->name}} </label>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="checkbox checkbox-success">
                                    <input id="checkbox{{$package->id}}" type="checkbox">
                                    <label for="checkbox{{$package->id}}"> {{$package->name}} </label>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="checkbox checkbox-success">
                                    <input id="checkbox{{$package->id}}" type="checkbox">
                                    <label for="checkbox{{$package->id}}"> {{$package->name}} </label>
                                  </div>
                                </div>
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
