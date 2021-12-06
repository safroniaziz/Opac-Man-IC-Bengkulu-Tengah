<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        <title>OPAC MAN IC | Login</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/manic.png') }}">
        <link href="{{ asset('assets/login/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href=" {{ asset('assets/login/style_login.css') }} ">
        <link href="{{ asset('assets/login/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <style>
            .preloader {    position: fixed;    top: 0;    left: 0;    right: 0;    bottom: 0;    background-color: #ffffff;    z-index: 99999;    height: 100%;    width: 100%;    overflow: hidden !important;}.do-loader{    width: 200px;    height: 200px;    position: absolute;    left: 50%;    top: 50%;    margin: 0 auto;    -webkit-border-radius: 100%;       -moz-border-radius: 100%;         -o-border-radius: 100%;            border-radius: 100%;    background-image: url({{ asset('assets/images/logo_2.png') }});    background-size: 80% !important;    background-repeat: no-repeat;    background-position: center;    -webkit-background-size: cover;            background-size: cover;    -webkit-transform: translate(-50%,-50%);       -moz-transform: translate(-50%,-50%);        -ms-transform: translate(-50%,-50%);         -o-transform: translate(-50%,-50%);            transform: translate(-50%,-50%);}.do-loader:before {    content: "";    display: block;    position: absolute;    left: -6px;    top: -6px;    height: calc(100% + 12px);    width: calc(100% + 12px);    border-top: 1px solid #07A8D8;    border-left: 1px solid transparent;    border-bottom: 1px solid transparent;    border-right: 1px solid transparent;    border-radius: 100%;    -webkit-animation: spinning 0.750s infinite linear;       -moz-animation: spinning 0.750s infinite linear;         -o-animation: spinning 0.750s infinite linear;            animation: spinning 0.750s infinite linear;}@-webkit-keyframes spinning {   from {-webkit-transform: rotate(0deg);}   to {-webkit-transform: rotate(359deg);}}@-moz-keyframes spinning {   from {-moz-transform: rotate(0deg);}   to {-moz-transform: rotate(359deg);}}@-o-keyframes spinning {   from {-o-transform: rotate(0deg);}   to {-o-transform: rotate(359deg);}}@keyframes spinning {   from {transform: rotate(0deg);}   to {transform: rotate(359deg);}}
          </style>
	</head>
    
	<body style="background-image:linear-gradient( rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7) ), url('{{ asset("assets/login/images/background.png") }}')">
        <div class="preloader">
            <div class="do-loader"></div>
        </div>
		<div id="particles-js">
            <div class="loginBox">
                <img src=" {{ asset('assets/images/manic.png') }} " class="user">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block" style="font-size:13px;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Perhatian:</strong> <i>{{ $message }}</i>
                    </div>
                    @else
                    <h6>Login</h6>
                    <p style="text-align:center; margin-bottom:20px;">Online Public Access Catalog (OPAC)</p>
                @endif
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <p>Email</p>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p>Password</p>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button type="submit" name="submit" style="margin-bottom:10px;r"><i class="fa fa-sign-in"></i>&nbsp; Login</button>

                </form>
            </div>
        </div>
    </body>
    <script src="{{ asset('assets/lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('assets/login/particles/particles.min.js') }} "></script>
    <script type="text/javascript" src=" {{ asset('assets/login/particles/app.js') }} "></script>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        $(window).on('load', function(){
        // will first fade out the loading animation
        jQuery(".status").fadeOut();
        // will fade out the whole DIV that covers the website.
        jQuery(".preloader").delay(0).fadeOut("slow");

      });
    </script>
</html>