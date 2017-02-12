<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fast Pay | Login</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to Fast Pay</h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>

            </div>
            <div class="col-md-6">
            @if(count($errors)>0)
<div class="alert alert-danger">
@foreach ($errors->all() as $error)
<p>{{$error}}</p>
@endforeach

</div>
@endif
                <div class="ibox-content">
                    <form class="m-t" role="form" action="{{route('user.signin')}}" method="post">
                        <div class="form-group">
                            <input type="email" id="email" name="email" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-danger btn-block" href="{{route('user.signup')}}">Create an account</a>
                    </form>
                    <p class="m-t">
                        <small>Fast Pay  &copy; 2016</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Fast Pay instant payment
            </div>
            <div class="col-md-6 text-right">
               <small>© 2016</small>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>

</html>
