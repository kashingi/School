<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Page</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ url('../../plugins/fontawesome-free/css/all.min.css')}}">

    <link rel="stylesheet" href="{{ url('../../plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{ url('../../dist/css/adminlte.min.css')}}">

</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Register</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register as a new membership</p>
                <form action="{{url('register-user')}}" method="post">
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                   
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full Name" required name="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="row g-3">
                        <div class="col">
                          <input type="text" class="form-control" placeholder="First Name" aria-label="First Name" required name="fname">
                        </div>
                        <div class="col">
                          <input type="text" class="form-control" placeholder="Last Name" aria-label="Last Name" required name="lname">
                        </div>
                      </div> --}}
                    <div class="input-group mb-3 mt-3">
                        <input type="email" class="form-control" placeholder="Email" required name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                         <div class="alert alert-danger">{{ $message }}</div>
                         @enderror
                        </div>
                        <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" required name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                         <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Confirm password" required name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">I agree to the <a href="#">terms</a></label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p>
                        Already Have Account ?
                        <a href="{{ url('/')}}" class="text-center mx-5">Login</a>
                    </p>
                </div>

            </div>
    </div>


    <script src="{{ url('../../plugins/jquery/jquery.min.js')}}"></script>

    <script src="{{ url('../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ url('../../dist/js/adminlte.min.js')}}"></script>
</body>
</html>
