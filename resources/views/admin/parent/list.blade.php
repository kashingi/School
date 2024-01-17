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
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <div class="media">
                <img src="{{ url('../../../dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                <h3 class="dropdown-item-title"></h3>
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{ url('../../../dist/img/user8-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{ url('../../../dist/img/user3-128x128.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
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
              <a href="admin/list" class="nav-link">
                <i class="nav-icon fa fa-user-cog"></i>
                <p>Admin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../class/list" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
                <p>Classes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../student/list" class="nav-link">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>Students</i></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../unit/list" class="nav-link">
                <i class="nav-icon fas fa-book-reader"></i>
                <p>Units</i></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../assign_unit/list" class="nav-link">
                <i class="nav-icon fas fa-plus-square"></i>
                <p>Assign Units</i></p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="list" class="nav-link active">
                <i class="nav-icon fas fa-person-booth"></i>
                <p>Parents</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../teacher/list" class="nav-link">
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
        {{-- Content header (Page Header) --}}
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">  
                      <h1>Parent List (Total : {{ $getRecord->total() }})</h1>
                  </div>
                  <div class="col-sm-6 text-sm-right">
                      <a href="{{ url('admin/parent/add') }}" class="btn btn-primary">Add New Parent</a>
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
                        <h5>Search Parent</h5>
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
                                    <label for="name">Contact</label>
                                    <input type="text" class="form-control text-center" name="mobile_number" id="" placeholder="Phone Number" autocomplete="off">
                                  </div>
                                  <div class="form-group col-sm-2">
                                    <label for="name">Email</label>
                                    <input type="text" class="form-control text-center mx-2" name="email"  id="" placeholder="Email" autocomplete="off">
                                  </div>
                                  <div class="form-group col-sm-4">
                                    <label for="">Action</label><br>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ url('admin/parent/list') }}" class="btn btn-success mx-2">Reset</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </form>
                    </div>
                    <div id="success-message" class="col-sm-12">
                        @include('_message')
                    </div>
                      <div class="card" style="width: 100%">
                          <div class="card-header">
                              <h3 class="card-title">Parent List</h3>
                          </div>
                          <div class="card-body p-2" style="overflow: auto">
                            <table class="table table-striped">
                                <thead class="table-success">
                                    <tr>
                                        <th>#</th>
                                        <th>Profile</th>
                                        <th colspan="2">Parent Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Relationship</th>
                                        <th>Occupation</th> 
                                        <th>Id</th>
                                        <th>Children</th>                                   
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
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td>{{ $value->mobile_number }}</td>
                                            <td>{{ $value->gender }}</td>
                                            <td>{{ $value->relationship }}</td>
                                            <td>{{ $value->occupation }}</td>
                                            <td>{{ $value->admission_number }}</td>
                                            <td>{{ $value->experince }}</td>
                                            <td style="min-width: 300px" class="d-flex">
                                                <a href="{{ url('admin/parent/edit/'. $value->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                                {{-- <a href="{{ url('admin/parent/delete/'. $value->id) }}" class="btn btn-danger btn-sm mx-1">
                                                    <i class="fas fa-trash"></i>
                                                    Delete
                                                </a> --}}
                                                <a href="#" class="btn btn-danger" onclick="confirmDelete('{{ url('admin/parent/delete/'. $value->id) }}')">
                                                  <i class="fas fa-trash"></i>
                                                  Delete
                                                </a>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                          </div>
                          <div class="text-center mx-auto">
                            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                          </div>
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
        function confirmDelete(deleteUrl) {
        var confirmation = confirm("Are you sure you want to delete this Parent ?");

        if (confirmation) {
            window.location.href = deleteUrl; // Redirects to delete URL on confirmation
        }
    }
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
