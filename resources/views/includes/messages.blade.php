@if (count($errors)>0)
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    @foreach ($errors->all() as $error)
      <div class="">
        <span>
          {{$error}}
        </span>
      </div>
    @endforeach
  </div>
@endif

@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{session('success')}}
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{session('error')}}
  </div>
@endif
