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
  {{-- Ajax CDN link --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
              <li><a class="dropdown-item" href="/profile/change_password">Change Password</a></li>
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
              <a href="{{ url('') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard 
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../admin/list" class="nav-link">
                <i class="nav-icon fa fa-user-cog"></i>
                <p>Admin</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="../class/list" class="nav-link">
                  <i class="nav-icon fas fa-door-open"></i>
                  <p>Class</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../timetable/list" class="nav-link active">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Time Table</p>
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
                <p>Units</p>
              </a>
              </li>
            <li class="nav-item">
              <a href="../assign_unit/list" class="nav-link">
                <i class="nav-icon fas fa-plus-square"></i>
                <p>Assin units</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="../parent/list" class="nav-link">
                <i class="nav-icon fas fa-person-booth"></i>
                <p>Parents</i></p>
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
                      <h1>Class Timetable</h1>
                  </div>
              </div>
          </div>
      </section>
      
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-md-12">
                    <div id="success-message">
                      @include('_message')
                  </div>
                    <div class="card">
                        <div class="card-header">
                          <h5>Search Class Timetable</h5>
                        </div>
                        <form method="get" action="">
                            <div class="crad-body end-0">
                                <div class="row text-center mx-2 mt-2">
                                  <div class="form-group col-sm-4">
                                    <label for="name">Class Name</label>
                                    <select class="form-select getClass" required name="class_id">
                                      <option value="">Select Class</option>
                                      @foreach ($getClass as $class )
                                        <option {{ (Request::get('class_id') == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                      @endforeach
                                    </select>
                                    
                                  </div>
                                  <div class="form-group col-sm-4">
                                    <label for="name">Unit Name</label>
                                    <select class="form-select getUnit" required name="unit_id">
                                      <option value="">Select Unit</option>
                                      @if (!empty($getUnit))
                                      @foreach ($getUnit as $unit )
                                      <option {{ (Request::get('unit_id') == $unit->id) ? 'selected' : '' }} value="{{ $unit->unit_id }}">{{ $unit->unit_name }}</option>
                                    @endforeach
                                      @endif
                                    </select>
                                  </div>
                                  <div class="form-group col-sm-4">
                                    <label for="">Action</label><br>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{ url('admin/timetable/list') }}" class="btn btn-success mx-2">Reset</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </form>
                    </div>
                    
                    
                  </div>
              </div>
          </div>
      </section>
      <!-- ... Your existing HTML code ... -->

@section('script')
<!-- Assign CSRF token to a JavaScript variable -->
<script type="text/javascript">
    var csrfToken = "{{ csrf_token() }}";
</script>

<!-- Your existing JavaScript code -->
<script type="text/javascript">
    $('.getClass').change(function(){
        var class_id = $(this).val();
        $.ajax({
            url: "{{ url('admin.timetable.get_unit') }}",
            type: "POST",
            data: {
                "_token": csrfToken,
                class_id: class_id,
            },
            dataType: "json",
            success: function(response){
                // Handle the success response here
                $('.getUnit').html(response.html);
            },
        });
    });
</script>
@endsection

<!-- ... Rest of your HTML code ... -->

    </div>


    @extends('layouts.footer')
    <script>
        // Hide the success message after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            $('#success-message').fadeOut('slow');
        }, 3000);
    </script>
  
    
      {{-- // Link to online JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
