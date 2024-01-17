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
              <a href="{{ url('/admin/admin/list') }}" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>Admin</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="{{ url('/admin/class/list') }}" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
                <p>Classes</i></p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/admin/student/list') }}" class="nav-link active">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>Students</p>
                </a>
              </li>
            <li class="nav-item">
              <a href="{{ url('/admin/unit/list') }}" class="nav-link">
                <i class="nav-icon fas fa-book-open"></i>
                <p>Units</i></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/assign_unit/list') }}" class="nav-link">
                <i class="nav-icon fas fa-plus-square"></i>
                <p>Assign Units</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/parent/list') }}" class="nav-link">
                <a href="" class="nav-link">
                <i class="nav-icon fas fa-person-booth"></i>
                <p>Parents</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/admin/teacher/list') }}" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>Teachers</p>
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
                      <h1>Edit Student</h1>
                  </div>
              </div>
          </div>
      </section>
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="name">Fisrt Name <span style="color: red">*</span></label>
                                          </div>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control" id="name" value="{{ old('name', $getRecord->name) }}" placeholder="First Name" name="name" required>
                                            @error('name')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                          </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <label for="name">Last Name<span style="color: red">*</span></label>
                                      </div>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" value="{{ old('last_name', $getRecord->last_name) }}" placeholder="Last Name" name="last_name" required>
                                        @error('last_name')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                            <label for="name">Admission Number <span style="color: red">*</span></label>
                                          </div>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control" id="name" value="{{ old('admission_number', $getRecord->admission_number) }}" placeholder="Admission Number" name="admission_number" required>
                                            @error('admission_number')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                          </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="name">Religion <span style="color: red">*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                           <input type="text" class="form-control" required value="{{ old('religion', $getRecord->religion) }}" name="religion" placeholder="Religion" >
                                          @error('religion')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror
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
                                            <select class="form-control" required name="class_id">
                                              <option value="">Select Class</option>
                                              @foreach ($getClass as $value )
                                                <option {{ (old('class_id',  $getRecord->class_id) == $value->id) ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->name }}</option>
                                              @endforeach
                                            </select>
                                            @error('class_id')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                          </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="name">Gender</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                            <select class="form-control" required name="gender">
                                                <option value="">Select Gender</option>
                                                <option {{ (old('gender', $getRecord->gender) == 'male') ? 'selected' : ''}} value="male">Male</option>
                                                <option {{ (old('gender', $getRecord->gender) == 'female') ? 'selected' : ''}} value="female">Female</option>
                                                <option {{ (old('gender', $getRecord->gender) == 'othetr') ? 'selected' : ''}} value="other">Other</option>
                                            </select>
                                            @error('gender')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
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
                                            <label for="name">Date Of birth <span style="color: red">*</span></label>
                                          </div>
                                          <div class="col-sm-8">
                                           <input type="text" class="form-control" required value="{{ old('date_of_birth', $getRecord->date_of_birth) }}" name="date_of_birth">
                                          @error('date_of_birth')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror
                                          </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <label for="name">Weight</span></label>
                                      </div>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{ old('weight', $getRecord->weight) }}" name="weight" placeholder="Weight">
                                        @error('weight')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror
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
                                            <label for="name">Mobile Number</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" required value="{{ old('mobile_number', $getRecord->mobile_number) }}" name="mobile_number" required placeholder="Mobile number">
                                            @error('mobile_number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label for="name">Blood Group <span style="color: red">*</span></label>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" required value="{{ old('blood_group', $getRecord->blood_group) }}" name="blood_group" required placeholder="Blood Group">
                                                @error('blood_group')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
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
                                            <label for="name">Admission Date <span style="color: red">*</span></label>
                                          </div>
                                          <div class="col-sm-8">
                                           <input type="text" class="form-control" required name="admision_date" required value="{{ old('admision_date', $getRecord->admision_date) }}">
                                          @error('admision_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror
                                          </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <label for="name">Profile Picture</span></label>
                                      </div>
                                      <div class="col-sm-9">
                                        <input type="file" class="form-control" value="{{ old('profile_pic') }}" name="profile_pic" placeholder="Profile Picture">
                                        @error('profile_pic')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        @if (!empty($getRecord->getProfile()))
                                        <img src="{{ $getRecord->getProfile() }}" alt="" style="width: 100px; height:30px" class="img-fluid">
                                      @endif
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
                                          <label for="name">Status <span style="color: red">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                          <select class="form-control" required name="status">
                                            <option value="">Select Status</option>
                                            <option {{ (old('status', $getRecord->status) == 0) ? 'selected' : ''}} value="0">Active</option>
                                            <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : ''}} value="1">Inactive</option>
                                          </select>
                                          @error('status')
                                              <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <label for="name">Height</span></label>
                                      </div>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" required value="{{ old('height', $getRecord->height) }}" name="height" required placeholder="Height">
                                        @error('height')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                            <label for="name">Email <span style="color: red">*</span></label>
                                          </div>
                                          <div class="col-sm-8">
                                           <input type="email" class="form-control" required value="{{ old('email', $getRecord->email) }}" name="email" required placeholder="Email">
                                          @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror
                                          </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="password">Password <span style="color: red">*</span></label>
                                          </div>
                                          <div class="col-sm-9">
                                           <input type="password" class="form-control" value="{{ old('password') }}" name="password" placeholder="Enter Password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$"
                                           title="Password must contain at least one number, one lowercase and one uppercase letter, and be at least 8 characters long">
                                          @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                          @enderror
                                          <p class="text-danger">Do you want to change password ?</p>
                                          </div>
                                          
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" style="margin-left: 50%">Update</button>
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
