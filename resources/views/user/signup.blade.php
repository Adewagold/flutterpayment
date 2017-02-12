<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FAST PAY | Register</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">____</h1>

            </div>
            <h3>Register to Fast Pay</h3>
            @if(count($errors)>0)
            <div class="alert-danger">
            @foreach($errors->all() as $error)
            <p> {{$error}} </p>
            @endforeach()
            </div>
            @endif
            <p>Create account to start making payment.</p>
            <form class="m-t" role="form" action="{{route('user.signup')}}" method="post">
                <div class="form-group">
                    <input type="text" id="name" name="name"  class="form-control" placeholder="Name" required="">
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
                </div>

                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{route('user.signin')}}">Login</a>
                 {{csrf_field()}}
            </form>
            <p class="m-t"> <small>Fast Pay &copy; 2016</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
