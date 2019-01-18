@extends('layouts.master')

@section('content')

  {{-- <div class="row">
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
</div> --}}

<div class="row" id="validation">
  <div class="col-12">
    <div class="card wizard-content">
      <div class="card-body">
        <h4 class="card-title">Step wizard with validation</h4>
        <h6 class="card-subtitle">You can us the validation like what we did</h6>
        <form action="#" class="validation-wizard wizard-circle wizard clearfix" role="application" id="steps-uid-2" novalidate="novalidate"><div class="steps clearfix"><ul role="tablist"><li role="tab" class="first current" aria-disabled="false" aria-selected="true"><a id="steps-uid-2-t-0" href="#steps-uid-2-h-0" aria-controls="steps-uid-2-p-0"><span class="current-info audible">current step: </span><span class="step">1</span> Step 1</a></li><li role="tab" class="disabled" aria-disabled="true"><a id="steps-uid-2-t-1" href="#steps-uid-2-h-1" aria-controls="steps-uid-2-p-1"><span class="step">2</span> Step 2</a></li><li role="tab" class="disabled" aria-disabled="true"><a id="steps-uid-2-t-2" href="#steps-uid-2-h-2" aria-controls="steps-uid-2-p-2"><span class="step">3</span> Step 3</a></li><li role="tab" class="disabled last" aria-disabled="true"><a id="steps-uid-2-t-3" href="#steps-uid-2-h-3" aria-controls="steps-uid-2-p-3"><span class="step">4</span> Step 4</a></li></ul></div><div class="content clearfix">
          <!-- Step 1 -->
          <h6 id="steps-uid-2-h-0" tabindex="-1" class="title current">Step 1</h6>
          <section id="steps-uid-2-p-0" role="tabpanel" aria-labelledby="steps-uid-2-h-0" class="body current" aria-hidden="false">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="wfirstName2"> First Name :
                    <span class="danger">*</span>
                  </label>
                  <input type="text" class="form-control required" id="wfirstName2" name="firstName" aria-required="true"> </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="wlastName2"> Last Name :
                      <span class="danger">*</span>
                    </label>
                    <input type="text" class="form-control required" id="wlastName2" name="lastName" aria-required="true"> </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="wemailAddress2"> Email Address :
                        <span class="danger">*</span>
                      </label>
                      <input type="email" class="form-control required" id="wemailAddress2" name="emailAddress" aria-required="true"> </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="wphoneNumber2">Phone Number :</label>
                        <input type="tel" class="form-control" id="wphoneNumber2"> </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="wlocation2"> Select City :
                            <span class="danger">*</span>
                          </label>
                          <select class="custom-select form-control required" id="wlocation2" name="location" aria-required="true">
                            <option value="">Select City</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="Dubai">Dubai</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="wdate2">Date of Birth :</label>
                          <input type="date" class="form-control" id="wdate2"> </div>
                        </div>
                      </div>
                    </section>
                    <!-- Step 2 -->
                    <h6 id="steps-uid-2-h-1" tabindex="-1" class="title">Step 2</h6>
                    <section id="steps-uid-2-p-1" role="tabpanel" aria-labelledby="steps-uid-2-h-1" class="body" aria-hidden="true" style="display: none;">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="jobTitle2">Company Name :</label>
                            <input type="text" class="form-control required" id="jobTitle2" aria-required="true">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="webUrl3">Company URL :</label>
                            <input type="url" class="form-control required" id="webUrl3" name="webUrl3" aria-required="true"> </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="shortDescription3">Short Description :</label>
                              <textarea name="shortDescription" id="shortDescription3" rows="6" class="form-control"></textarea>
                            </div>
                          </div>
                        </div>
                      </section>
                      <!-- Step 3 -->
                      <h6 id="steps-uid-2-h-2" tabindex="-1" class="title">Step 3</h6>
                      <section id="steps-uid-2-p-2" role="tabpanel" aria-labelledby="steps-uid-2-h-2" class="body" aria-hidden="true" style="display: none;">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="wint1">Interview For :</label>
                              <input type="text" class="form-control required" id="wint1" aria-required="true"> </div>
                              <div class="form-group">
                                <label for="wintType1">Interview Type :</label>
                                <select class="custom-select form-control required" id="wintType1" data-placeholder="Type to search cities" name="wintType1" aria-required="true">
                                  <option value="Banquet">Normal</option>
                                  <option value="Fund Raiser">Difficult</option>
                                  <option value="Dinner Party">Hard</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="wLocation1">Location :</label>
                                <select class="custom-select form-control required" id="wLocation1" name="wlocation" aria-required="true">
                                  <option value="">Select City</option>
                                  <option value="India">India</option>
                                  <option value="USA">USA</option>
                                  <option value="Dubai">Dubai</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="wjobTitle2">Interview Date :</label>
                                <input type="date" class="form-control required" id="wjobTitle2" aria-required="true">
                              </div>
                              <div class="form-group">
                                <label>Requirements :</label>
                                <div class="m-b-10">
                                  <label class="custom-control custom-radio">
                                    <input id="radio3" name="radio" type="radio" class="custom-control-input">
                                    <span class="custom-control-label">Employee</span>
                                  </label>
                                  <label class="custom-control custom-radio">
                                    <input id="radio4" name="radio" type="radio" class="custom-control-input">
                                    <span class="custom-control-label">Membership</span>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                        <!-- Step 4 -->
                        <h6 id="steps-uid-2-h-3" tabindex="-1" class="title">Step 4</h6>
                        <section id="steps-uid-2-p-3" role="tabpanel" aria-labelledby="steps-uid-2-h-3" class="body" aria-hidden="true" style="display: none;">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="behName1">Behaviour :</label>
                                <input type="text" class="form-control required" id="behName1" aria-required="true">
                              </div>
                              <div class="form-group">
                                <label for="participants1">Confidance</label>
                                <input type="text" class="form-control required" id="participants1" aria-required="true">
                              </div>
                              <div class="form-group">
                                <label for="participants1">Result</label>
                                <select class="custom-select form-control required" id="participants1" name="location" aria-required="true">
                                  <option value="">Select Result</option>
                                  <option value="Selected">Selected</option>
                                  <option value="Rejected">Rejected</option>
                                  <option value="Call Second-time">Call Second-time</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="decisions1">Comments</label>
                                <textarea name="decisions" id="decisions1" rows="4" class="form-control"></textarea>
                              </div>
                              <div class="form-group">
                                <label>Rate Interviwer :</label>
                                <div class="c-inputs-stacked">
                                  <label class="inline custom-control custom-checkbox block">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-label ml-0">1 star</span>
                                  </label>
                                  <label class="inline custom-control custom-checkbox block">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-label ml-0">2 star</span>
                                  </label>
                                  <label class="inline custom-control custom-checkbox block">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-label ml-0">3 star</span>
                                  </label>
                                  <label class="inline custom-control custom-checkbox block">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-label ml-0">4 star</span>
                                  </label>
                                  <label class="inline custom-control custom-checkbox block">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-label ml-0">5 star</span>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>
                      </div><div class="actions clearfix"><ul role="menu" aria-label="Pagination"><li class="disabled" aria-disabled="true"><a href="#previous" role="menuitem">Previous</a></li><li aria-hidden="false" aria-disabled="false"><a href="#next" role="menuitem">Next</a></li><li aria-hidden="true" style="display: none;"><a href="#finish" role="menuitem">Submit</a></li></ul></div></form>
                    </div>
                  </div>
                </div>
              </div>


            @endsection
