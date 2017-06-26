<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jogo do Girasol | @lang('square.admin.login.page-title')</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset("assets/admin/css/min/admin.min.css") }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('bower_components/html5shiv/dist/html5shiv.min.js') }}"></script>
    <script src="{{ asset('bower_components/respond/dest/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page square-wallpaper">
    <div id="preloader">
        <div class="flat-spin">
            <i class="square-flaticon flaticon-transport"></i>
        </div>
    </div>

    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset("assets/admin/images/logo-girasol.png") }}" alt="Jogo do Girasol">
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">@lang('square.admin.login.box-title')</p>

            {!! Form::open(['route' => 'login', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <div class="col-md-12">
                        <input placeholder="@lang('square.custom.placeholder.email')" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                        <span class="ion ion-at form-control-feedback"></span>

                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                    <div class="col-md-12">
                        <input placeholder="@lang('square.custom.placeholder.password')" id="password" type="password" class="form-control" name="password">
                        <span class="ion ion-lock-combination form-control-feedback"></span>

                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <a href="{{ url('/password/reset') }}" class="line-h34 text-black">
                            @lang('square.admin.login.forgot-password')
                        </a>
                    </div>

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success btn-block btn-flat pull-right">
                            <i class="ion ion-log-in"></i>
                            @lang('square.custom.button.sign-in')
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/square.js') }}"></script>
</body>
</html>