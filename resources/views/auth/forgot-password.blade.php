<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forgot password</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ url('../../plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ url('../../plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ url('../../plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{ url('../../dist/css/adminlte.min.css?v=3.2.0')}}">

</head>
<body class="hold-transition login-page">
    <div class="login-box" style="border-top: 2px solid blue;">
        <div class="login-logo">
            <h2><b>Forgot Password</b></h2>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <form action="" method="post" autocomplete="off">
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Forgot</button>
                        </div>
                    </div>
                </form>
                <p class="mb-1 mt-3">
                    <a href="{{ url('/')}}">Login</a>
                </p>
            </div> 

        </div>
    </div>


    <script src="{{ url('../../plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{ url('../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ url('../../dist/js/adminlte.min.js?v=3.2.0')}}"></script>
</body>
</html>
