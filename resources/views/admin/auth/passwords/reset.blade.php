<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jogo do Girasol | @lang('square.admin.recovery-password.page-title')</title>

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
            <p class="login-box-msg">@lang('square.admin.recovery-password.box-title')</p>

            {!! Form::open(['route' => 'reset-password', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('token', $token) !!}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <div class="col-md-12">
                        <input placeholder="@lang('square.custom.placeholder.email')" id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" autofocus>
                        <i class="ion ion-at form-control-feedback"></i>

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
                        <i class="icon ion-lock-combination form-control-feedback"></i>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                    <div class="col-md-12">
                        <input placeholder="@lang('square.custom.placeholder.password_confirmation')" id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                        <span class="icon ion-lock-combination form-control-feedback"></span>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-refresh"></i> @lang('square.custom.button.reset')
                        </button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script src="{{ asset('assets/admin/js/dependency.js') }}"></script>
    <script src="{{ asset('assets/admin/js/square.js') }}"></script>
</body>
</html>