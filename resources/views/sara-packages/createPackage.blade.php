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
                    <div class="col-md-8">
                      <div class="form-group ">
                        <h4>Choose Main Topics</h4>

                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Vertical Tab</h4>
                            <h6 class="card-subtitle">Use default tab with class <code>vtabs &amp; tabs-vertical</code></h6>
                            <!-- Nav tabs -->
                            <div class="vtabs customvtab">
                              <ul class="nav nav-tabs tabs-vertical maintopic-tab" role="tablist">
                                @for ($i=1; $i <= 10; $i++)
                                  <li class="nav-item row my-auto pl-2">
                                    <input type="checkbox" id="md_checkbox_24{{$i}}" class="filled-in chk-col-deep-purple" >
                                    <label class="my-3" for="md_checkbox_24{{$i}}"></label>
                                    <a class="nav-link show my-auto" data-toggle="tab" href="#mainTopicTab{{$i}}" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Main Topic {{$i}}</span> </a>
                                  </li>
                                @endfor

                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                @for ($i=1; $i <= 10; $i++)
                                  <div class="tab-pane show" id="mainTopicTab{{$i}}" role="tabpanel">
                                    <h3>List of Sub topics for Level 1 </h3>
                                    <div class="p-20">
                                      <input id="level2{{$i}}" type="checkbox" class="select-all-checkbox" data-target="topics{{$i}}">
                                      <label  for="level2{{$i}}" >Select All Topics </label>
                                    </div>
                                    <div class="" id="topics{{$i}}">

                                      @for ($j=1; $j <= 5; $j++)
                                        <div class="p-20" >
                                          <input id="level2{{$i.$j}}" type="checkbox">
                                          <label for="level2{{$i.$j}}">Topic {{$i.$j}}  </label>
                                        </div>
                                      @endfor
                                    </div>
                                  </div>
                                @endfor

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
