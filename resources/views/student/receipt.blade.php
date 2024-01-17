<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ !empty($header_title) ? $header_title : '' }}->School</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


<link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css')}}">
{{-- <link rel="stylesheet" href="{{ url('/plugins/fontawesome-free/css/all.min.css')}}"> --}}

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="{{ url('../../../tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

<link rel="stylesheet" href="{{ url('../../../plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<link rel="stylesheet" href="{{ url('../../../plugins/jqvmap/jqvmap.min.css')}}">

<link rel="stylesheet" href="{{ url('../../../dist/css/adminlte.min.css?v=3.2.0')}}">

<link rel="stylesheet" href="{{ url('../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

<link rel="stylesheet" href="{{ url('../../../plugins/daterangepicker/daterangepicker.css')}}">

<link rel="stylesheet" href="{{ url('../../../plugins/summernote/summernote-bs4.min.css')}}">



</head>


<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="mx-2 fa fa-user"></i>
            {{ Auth::user()->name }}
          </button>
          <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{ url('profile/change_password') }}">Change Password</a></li>
            <li><a class="dropdown-item" href="my_account">My Account</a></li>
            <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="index3.html" class="brand-link text-center">
        <span class="brand-text font-weight-light" style="font-weight:bold !important; font-size:20px">School</span>
      </a>
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ url('../../../dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{ url('admin/dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>  Dashboard  </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="my_unit" class="nav-link">
                <i class="nav-icon fas fa-book-reader"></i>
                <p>My Units</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="payment" class="nav-link">
                <i class="nav-icon fas fa-money-bill-wave"></i>
                <p>Payment</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="receipt" class="nav-link active">
                <i class="nav-icon fas fa-list"></i>
                <p>Statement</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{ url('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                <p>Logout</p>
              </a>
            </li>  --}}
          </ul>  
        </nav> 
      </div>
    </aside>
    
    <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">  
                      <h1>Print Receipt</h1>
                  </div>
              </div>
          </div>
      </section>
      <section class="content">
        <div id="success-message" class="col-sm-12">
          @include('_message')
        </div>
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-8">
                      <div class="card">
                        <div class="card-header">
                          <h3>Student Details</h3>
                        </div>
                        <div class="card-body">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="name">Name</label>
                                      </div>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}  {{ Auth::user()->last_name }}" id="name" placeholder="Name" name="name">
                                      </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="row">
                                  <div class="col-sm-3">
                                    <label for="name">Admission</span></label>
                                  </div>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" value=" {{ Auth::user()->admission_number }}" placeholder="Last Name" name="admission">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="row">
                                  <div class="col-sm-4">
                                        <label for="name">Phone<span style="color: red">*</span></label>
                                      </div>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" value="{{ Auth::user()->mobile_number }}" placeholder="Phone Number" name="phone">
                                      </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="name">Units <span style="color: red">*</span></label>
                                      </div>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" name="units" placeholder="Units" >
                                      </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="class">Class <span style="color: red">*</span></label>
                                      </div>
                                      <div class="col-sm-8">
                                        @php
                                           $name=DB::table('class')->where('id',Auth::user()->class_id)->value('name'); 
                                           $mpesaCode = DB::table('payment_models')-where('MpesaReceiptNumber', Auth::user()
                                        @endphp
                                        <input type="text" class="form-control" value="{{ $name }}" name="class" placeholder="Class">
                                      </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="name">Amount</span></label>
                                      </div>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" name="amount" placeholder="Amount" >
                                        
                                      </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          
                        </div>
                        <div class="card-footer">
                            
                        </div>
                      </div>
                  </div>
                  <div class="com-sm-4">
                    <div class="card">
                      <div class="card-header">
                        <h3>Receipt Details</h3>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-4">
                              <label for="name">Duration</label>
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="name" placeholder="Four months from today" name="phone" disabled>

                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-4">
                              <label for="name">P-Code<span style="color: red">*</span></label>
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="name" placeholder="Mpesa code" name="phone">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-4">
                              <label for="class">P-Date<span style="color: red">*</span></label>
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="class" placeholder="Class">
                            </div>
                          </div> 
                        </div>
                      </div>
                      <div class="card-footer">

                      </div>
                    </div>
                  </div>
                </div>
                
          </div>
          <button type="submit" class="btn btn-primary" style="margin-left: 50%">Update</button>
      </section>
  </div>


    @extends('layouts.footer')
    
    <script>
        // Hide the success message after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            $('#success-message').fadeOut('slow');
        }, 3000);
    </script>
    <script src="{{ url('../../../plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{ url('../../../plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="{{ url('../../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ url('../../../plugins/chart.js/Chart.min.js')}}"></script>

    <script src="{{ url('../../../plugins/sparklines/sparkline.js')}}"></script>



    <script src="{{ url('../../../plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ url('../../../plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

    <script src="{{ url('../../../plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{ url('../../../plugins/moment/moment.min.js')}}"></script>
    <script src="{{ url('../../../plugins/moment/moment.min.js')}}"></script>
    <script src="{{ url('../../../plugins/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <script src="{{ url('../../../plugins/summernote/summernote-bs4.min.js')}}"></script>

    <script src="{{ url('../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

    <script src="{{ url('../../../dist/js/adminlte.js?v=3.2.0')}}"></script>


    <script src="{{ url('../../../dist/js/pages/dashboard.js')}}"></script>
      {{-- Link to online JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
