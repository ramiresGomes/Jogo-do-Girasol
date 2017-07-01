<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Jogo do Girassol {{ ($page_title) ? "| {$page_title}" : null }}</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="{{ asset("assets/admin/css/min/admin.min.css") }}">
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('bower_components/html5shiv/dist/html5shiv.min.js') }}"></script>
    <script src="{{ asset('bower_components/respond/dest/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body class="skin-blue hold-transition sidebar-mini">
    <div id="preloader">
        <div class="flat-spin">
            <i class="sunflower-flaticon flaticon-transport"></i>
        </div>
    </div>

    <div class="wrapper">
        @include('admin::includes.header')

        @include('admin::includes.sidebar')

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    {{ $page_title or null }}
                    <small>{{ $page_description or null }}</small>
                </h1>

                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> @lang('sunflower.admin.dashboard.page-title')</a></li>
                    @if (!empty($breadcrumb))
                        @foreach ($breadcrumb as $bread)
                            @if ($bread['name'] == end($breadcrumb)['name'])
                                <li class="active">{{ $bread['name'] }}</li>
                            @else
                                <li><a href="{{ $bread['link'] }}">{{ $bread['name'] }}</a></li>
                            @endif
                        @endforeach
                    @endif
                </ol>
            </section>

            <section class="content">
                @yield('content')
            </section>
        </div>

        @include('admin::includes.footer')
    </div>

    <script src="{{ asset('assets/admin/js/dependency.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sunflower.js') }}"></script>

    @stack('scripts')
</body>
</html>