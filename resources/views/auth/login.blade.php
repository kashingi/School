<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>

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
            <a href="#"><b>Login</b></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg text-danger">Sign in with correct credentials</p>
                <form action="{{ url('login')}}" method="post" autocomplete="off">
                    @if(Session::has('error'))
                        <div class="alert alert-danger">{{Session::get('error')}}</div>
                    @endif
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control text-center" name="email" placeholder="Email" required id="emailInput">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control text-center" placeholder="Password" required name="password" id="emailInput">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
               
                <p class="mb-1">
                    <a href="{{ url('forgot-password')}}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ url('register')}}" class="text-center">Register a new membership</a>
                </p>
            </div> 

        </div>
    </div>

    

    <script src="{{ url('../../plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{ url('../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ url('../../dist/js/adminlte.min.js?v=3.2.0')}}"></script>
</body>
</html>
