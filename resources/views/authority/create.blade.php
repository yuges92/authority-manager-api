@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body wizard-content">
          <form action="{{route('authorityAPI.store')}}" method="post">
            {{ csrf_field() }}
            {{-- <div class="steps clearfix">
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
            </div> --}}
            <div class="content clearfix">
              <!-- Step 1 Authority Info-->
              <section id=""  class="card-body">

                <div class="col-md-12">
                  <div class="form-group ">
                    <label for="authority_id">Choose Authority :</label>
                    <select class="js-example-basic-single form-control col-12" name="authority_id" data-placeholder="Select a state" required id="authority_id" >
                      <option value="">Choose an Authority</option>
                      @foreach ($authorities as $authority)
                        <option value="{{$authority->authority_id}}" {{(old('authority_id')==$authority->authority_id) ? 'selected':''}}>{{'('.$authority->authority_id.') '.$authority->full_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="username">API Username :</label>
                    <input type="text" class="form-control" id="username" name="username">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="password">API Password :</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="date-range">Start/End Date :</label>
                    <div class="input-daterange input-group" id="date-range">
                      <input type="text" class="form-control" name="start_date">
                      <div class="input-group-append">
                        <span class="input-group-text bg-info b-0 text-white">TO</span>
                      </div>
                      <input type="text" class="form-control" name="expiry_date">
                    </div>
                  </div>
                </div>

              </section>



              <!-- Step 2 Sara Packages-->
              <section id="" class="body"  >
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group form-material">
                      <label class="sr-only">Search</label>
                      <input type="text" class="form-control form-control-line" value="" placeholder="Search packages">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="subTopics">Subtopics :</label>
                    <select class="js-example-basic-multiple js-states form-control" id="subTopics" multiple="multiple" name="subTopics[]">
                      @foreach ($packages as $package)
                        <option value="{{$package->id}}" @if(is_array(old('subTopics')) && in_array($package->id, old('subTopics'))) selected @endif >{{'('.$package->id.') '.$package->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-md-6">
                    <div class="list-group">
                      @foreach ($packages as $package)
                        <div class="form-group">
                          <div class="checkbox checkbox-success">
                            <input id="checkbox{{$package->id}}" type="checkbox" name="packages[]" value="{{$package->id}}">
                            <label for="checkbox{{$package->id}}"> {{$package->name.' ('.$package->id.')'}} </label>
                          </div>
                        </div>
                      @endforeach

                    </div>
                  </div>
                </div>
              </section>

            </div>
            {{-- <div class="actions clearfix">
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
            </div> --}}

            <div class="form-group col-12">
              <input class="btn btn-rounded btn-success px-5 waves-dark float-right" type="submit" value="Save">
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
    $('.js-example-basic-single').select2();

    $('#date-range').datepicker({
      format: "dd/mm/yyyy"
    });
  });
  </script>
@endpush
