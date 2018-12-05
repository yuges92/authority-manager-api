@extends('layouts.master')

@section('content')

  {{-- <div class="row el-element-overlay">
    <div class="col-md-12">
      <div class="col-lg-3 col-md-6">
        <div class="card">
          <div class="el-card-item">
            <div class="el-card-avatar el-overlay-1"> <img src="https://www.bsn.eu/wp-content/uploads/2016/12/user-icon-image-placeholder-300-grey.jpg" alt="user">
              <div class="el-overlay">
                <ul class="el-info">
                  <li><a class="btn default btn-outline image-popup-vertical-fit" href="../plugins/images/users/1.jpg"><i class="icon-magnifier"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="el-card-content">
              <h3 class="box-title">Genelia Deshmukh</h3>
              <small>Managing Director</small>
              <br>
            </div>
          </div>
        </div>
      </div>

    </div>
    </div> --}}

    <div class="d-flex justify-content-start row mx-auto">
      <a href="/admin/users" class="custom-icon-card mx-auto">
        <div class="card-body mx-auto text-center">
          <i class="fas fa-users custom-icon"></i>
          <h5 class="card-title">Create API</h5>
        </div>
      </a>


      <a href="/" class="custom-icon-card mx-auto">
        <div class="card-body mx-auto text-center">
          <i class="fas fa-exclamation custom-icon"></i>
          <h5 class="card-title">Notifications</h5>
        </div>
      </a>


    </div>

  @endsection
