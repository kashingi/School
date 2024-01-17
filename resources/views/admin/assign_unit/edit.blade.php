<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty($header_title) ? $header_title : '' }}->School</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
{{-- Link to Bootstrap CDN --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
              <a href="{{ url('/admin/admin/list') }}" class="nav-link ">
                <i class="nav-icon fa fa-user-cog"></i>
                <p>Admin</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{ ('/admin/class/list') }}" class="nav-link">
                  <i class="nav-icon fas fa-door-open"></i>
                  <p>Classes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/student/list') }}" class="nav-link">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>Students</i></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/admin/unit/list') }}" class="nav-link">
                  <i class="nav-icon fas fa-book-reader"></i>
                  <p>Units</p>
                </a>
                </li>
              <li class="nav-item">
                <a href="{{ url('/admin/assign_unit/list') }}" class="nav-link active">
                  <i class="nav-icon fas fa-plus-square"></i>
                  <p>Assign units</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ url('/admin/teacher/list') }}" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>Teachers</p>
              </a>
            </li>
           
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-person-booth"></i>
                <p>Parents</i></p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="{{ url('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-arrow-alt-circle-right"></i>
                <p>Logout</p>
              </a>
            </li> 
          </ul>  
        </nav>
      </div>
    </aside>
    
    <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">  
                      <h1>Edit New Assing Units</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li>
                          <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="mx-2 fa fa-user"></i>
                              {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="#">Settings</a></li>
                              <li><a class="dropdown-item" href="#">Account</a></li>
                              <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                            </ul>
                          </div>
                        </li>
                      </ol>
                  </div>
              </div>
          </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form method="post" action="">
                                @csrf
                                <div class="card-body">
                                    <div class="container-fluid w-50 mx-auto">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="name">Class Name</label>
                                                </div>
                                                {{-- <div class="col-sm-9">
                                                    <select name="class_id" id="" class="form-control" required>
                                                        <option value="">Select Class</option>
                                                        @foreach ($getClass as $class)
                                                            <option {{ (getRecord->class_id == $class_id) ? 'selected' : ''}} value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                                <div class="col-sm-9">
                                                  <select name="class_id" id="" class="form-control" required>
                                                      <option value="">Select Class</option>
                                                      @foreach ($getClass as $class)
                                                          <option {{ ($getRecord->class_id == $class->id) ? 'selected' : ''}} value="{{ $class->id }}">{{ $class->name }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                              
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label for="name">Unit Name</label>
                                            @foreach ($getUnit as $unit)
                                              @php
                                                $checked = "";
                                              @endphp
                                              @foreach ($getAssignUnitId as $unitAssign)
                                                @if ($getAssignUnitId->unit_id == $unit->unit_id) 
                                                  @php
                                                    $checked = "checked";
                                                  @endphp
                                                @endif
                                              @endforeach
                                              <div>
                                                <label for="" style="font-weight: 150">
                                                    <input {{ $checked }} type="checkbox" name="unit_id[]" class="mx-4" value="{{ $unit->id }}" >{{ $unit->name }} 
                                                </label>
                                              </div>
                                            @endforeach
                                        </div> 
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="">Status</label>  
                                                </div> 
                                                <div class="col-sm-9">
                                                    <select name="status" id="" class="form-control">
                                                        <option {{ ($getRecord->status == 0) ? 'selected' : ''}} value="0">Active</option>
                                                        <option {{ ($getRecord->status == 1) ? 'selected' : ''}} value="1">Inactive</option>
                                                    </select>
                                                </div> 
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 45%">Update</button>
                                </div>
                            </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>


    @extends('layouts.footer')
    <script src="{{ url('../../../plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{ url('../../../plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    {{-- <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script> --}}

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
      // Link to online JS Bundle
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
