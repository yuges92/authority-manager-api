<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <meta name="description" content=""> --}}
  {{-- <meta name="author" content=""> --}}

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Sara Api Manager') }}</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/template.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  @stack('css')
</head>
<body class="fix-header fix-sidebar card-no-border">

  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
  </div>

  <div id="main-wrapper">
    <header class="topbar">
      <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header">
          <a class="navbar-brand text-white" href="/">
            <i class="wi wi-sunset"></i>
            <span class="light-logo">
              Authority Manager
            </span>
          </a>
        </div>

        @if (Auth::user())

          <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0">
              <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
              <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="https://www.bsn.eu/wp-content/uploads/2016/12/user-icon-image-placeholder-300-grey.jpg" alt="user" class="profile-pic">
                </a>
                <div class="dropdown-menu dropdown-menu-right scale-up">
                  <ul class="dropdown-user">
                    <li>
                      <div class="dw-user-box">
                        <div class="u-img"><img src="https://www.bsn.eu/wp-content/uploads/2016/12/user-icon-image-placeholder-300-grey.jpg" alt="user"></div>
                        <div class="u-text">
                          <h4>{{Auth::user()->firstName}}</h4>
                          <p class="text-muted">{{Auth::user()->email}}</p><a href="/profile" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                        </div>
                      </li>
                      <li role="separator" class="divider"></li>
                      <li><a href="/logout"><i class="fa fa-power-off"></i> Logout</a></li>

                    </ul>
                  </div>
                </li>

              </ul>
            </div>
          @endif

        </nav>
      </header>



      @include('includes.sideNavBar')

      <div class="page-wrapper" style="min-height: 905px;">

        <div class="container-fluid">

          <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
              <h1 class="text-themecolor m-b-0 m-t-0">{{((isset($title)) ? $title:'')}}</h1>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>

          </div>

          <div class="row">
            <div class="col-12">
              @include('includes.messages')
              @yield('content')
            </div>
          </div>

        </div>

        <footer class="footer">
          © 2018 Disabled Living Foundation
        </footer>

      </div>

    </div>



    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/custom.js') }}" ></script>
    <script type="text/javascript">

    </script>
    @stack('js')
  </body>
  </html>
