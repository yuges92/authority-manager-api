@extends('layouts.master')

@section('content')

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body wizard-content">
          <form action="{{route('authorityApi.store')}}" method="post">
            {{ csrf_field() }}
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
                    <input type="text" class="form-control" id="username" name="username"  autocomplete="off" value="{{old('username')}}">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="password">API Password :</label>
                    <input type="password" class="form-control" id="password" name="password"  autocomplete="off">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="date-range">Start/End Date :</label>
                    <div class="input-daterange input-group" id="date-range">
                      <input type="text" class="form-control" name="start_date" autocomplete="off" value="{{Carbon\Carbon::now()->format('d/m/Y')}}">
                      <div class="input-group-append">
                        <span class="input-group-text bg-info b-0 text-white">TO</span>
                      </div>
                      <input type="text" class="form-control" name="expiry_date" autocomplete="off">
                    </div>
                  </div>
                </div>

              </section>


              <!-- Step 2 Sara Packages-->
              <section id="" class="body"  >
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="packges">Packages :</label>
                    <select class="js-example-basic-multiple js-states form-control" id="packges" multiple="multiple" name="packages[]">
                      @foreach ($packages as $package)
                        <option value="{{$package->id}}" @if(is_array(old('packges')) && in_array($package->id, old('packages'))) selected @endif >{{'('.$package->id.') '.$package->name.' (' .$package->type}})</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                </section>

              </div>


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
