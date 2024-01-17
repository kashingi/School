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
              <a href="{{ url('') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard 
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/admin/list') }}" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>Admin</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="{{ url('admin/student/list') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Students</i></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('admin/unit/list') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Units</i></p>
              </a>
            </li>
            
            
            <li class="nav-item">
              <a href="list" class="nav-link active">
                <i class="nav-icon fas fa-user"></i>
                <p>Teachers</p>
              </a>
            </li>
          
            <li class="nav-item">
              <a href="{{ url('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-lock"></i>
                <p>Logout</p>
              </a>
            </li> 
          </ul>  
        </nav>
      </div>
    </aside>
    
    <div class="content-wrapper">
        {{-- Content header (Page Header) --}}
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">  
                      <h1>Parent Student List: {{ $getParent->name }} {{ $getParent->last_name }}</h1>
                  </div>
              </div>
          </div>
      </section>
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">

                    <div class="card">
                      <div class="card-header">
                        <h5>Search Student</h5>
                      </div>
                        <form method="get" action="">
                            <div class="crad-body end-0">
                                <div class="row text-center mx-2 mt-2">
                                  <div class="form-group col-sm-2">
                                    <label for="name">First Name</label>
                                    <input type="text" class="form-control text-center" name="name" id="" placeholder="Name" autocomplete="off">
                                  </div>
                                  <div class="form-group col-sm-2">
                                    <label for="name">Last Name</label>
                                    <input type="text" class="form-control text-center" name="last_name" id="" placeholder="Last Name" autocomplete="off">
                                  </div>
                                  <div class="form-group col-sm-2">
                                    <label for="name">Admission</label>
                                    <input type="text" class="form-control text-center" name="admission_number" id="" placeholder="Admission Number" autocomplete="off">
                                  </div>
                                  <div class="form-group col-sm-2">
                                    <label for="name">Email</label>
                                    <input type="text" class="form-control text-center mx-2" name="email"  id="" placeholder="Email" autocomplete="off">
                                  </div>
                                  <div class="form-group col-sm-4">
                                    <label for="">Action</label><br>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ url('admin/parent/my-student/'.$parent_id) }}" class="btn btn-success mx-2">Reset</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </form>
                    </div>
                    <div id="success-message" class="col-sm-12">
                        @include('_message')
                    </div>
                    @if ($getSearchStudent)
                      <div class="card" style="width: 100%">
                          <div class="card-header">
                              <h3 class="card-title">Student List</h3>
                          </div>
                          <div class="card-body p-2" style="overflow: auto">
                            <table class="table table-striped">
                                <thead class="table-success">
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th colspan="2">Student Name</th>
                                        <th colspan="2">Parent</th>
                                        <th>Email</th>
                                        <th>Adm No</th>
                                        <th>Contact</th>
                                        <th>Class</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getSearchStudent as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>
                                              @if (!empty($value->getProfile()))
                                                  <img src="{{ $value->getProfile() }}" alt="" style="height: 50px; width:50px">
                                              @endif
                                            </td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->last_name }}</td>
                                            <td>{{ $value->parent_name }}</td>
                                            <td>{{ $value->parent_last_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->admission_number }}</td>
                                            <td>{{ $value->mobile_number }}</td>
                                            <td>{{ $value->class_name }}</td>
                                            <td style="min-width: 300px">
                                                <a href="{{ url('admin/parent/assign_student_parent/'. $value->id.'/'.$parent_id) }}" class="btn btn-primary btn-sm" style="margin-left: 80px">
                                                    <i class="fas fa-plus"></i>
                                                    Add to Parent
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          </div>
                          <div class="text-center mx-auto">
                            {!! $getSearchStudent->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                          </div>
                      </div>
                    @endif
                   
                    <div class="card" style="width: 100%">
                        <div class="card-header">
                            <h3 class="card-title">Parent Student List </h3>
                        </div>
                        <div class="card-body p-2" style="overflow: auto">
                          <table class="table table-striped">
                              <thead class="table-success">
                                  <tr>
                                      <th>#</th>
                                      <th>Profile</th>
                                      <th colspan="2">Student Name</th>
                                      <th colspan="2">Parent Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      {{-- <th>Address</th>
                                      <th>Gender</th>
                                      <th>Relationship</th>
                                      <th>Occupation</th>                                     --}}
                                      <th class="text-center">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($getRecord as $value)
                                      <tr>
                                          <td>{{ $value->id }}</td>
                                          <td>
                                            @if (!empty($value->getProfile()))
                                                <img src="{{ $value->getProfile() }}" alt="" style="height: 50px; width:50px">
                                            @endif
                                          </td>
                                          <td>{{ $value->name }}</td>
                                          <td>{{ $value->last_name }}</td>
                                          <td>{{ $value->parent_name }}</td>
                                          <td>{{ $value->parent_last_name }}</td>
                                          <td>{{ $value->email }}</td>
                                          <td>{{ $value->parent_number }}</td>
                                          {{-- <td>{{ $value->parent_relationship }}</td> --}}
                                          {{-- <td>{{ $value->gender }}</td> --}}
                                          {{-- <td>{{ $value->relationship }}</td> --}}
                                          {{-- <td>{{ $value->parent_occupation }}</td> --}}
                                          <td style="min-width: 300px">
                                              <a href="{{ url('admin/parent/delete/'. $value->id) }}" class="btn btn-danger btn-sm" style="margin-left: 110px">
                                                  <i class="fas fa-trash"></i>
                                                  Delete
                                              </a>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                        </div>
                        {{-- <div class="text-center mx-auto">
                          {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                        </div> --}}
                    </div>
                  </div>
              </div>
          </div>
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
      {{-- // Link to online JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
