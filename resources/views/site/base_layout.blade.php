@inject('site', 'Sunflower\Http\Controllers\Site\SiteController')
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>{{ !empty($seo->title) ? $seo->title . ' | ' : $site->default_seo['title'] }}{{ $site->default_seo['site_name'] }}</title>
    <meta name="keywords" content="{{ $seo->keywords or $site->default_seo['keywords'] }}">
    <meta name="description" content="{{ !empty($seo->description) ? str_limit(strip_tags($seo->description), 250) : $site->default_seo['description'] }}">
    <meta name="author" content="Ramires Gomes https://www.linkedin.com/in/ramiresgomes/">

    <meta property="og:site_name" content="{{ !empty($seo->title) ? $seo->title : $site->default_seo['site_name'] }}">
    <meta property="og:title" content="{{ !empty($seo->title) ? $seo->title . ' | ' : null }}{{ $site->default_seo['site_name'] }}">
    <meta property="og:image" content="{{ !empty($actseo->image) ? $seo->image : $site->default_seo['image'] }}">

    <meta property="og:type" content="{{ $site->default_seo['type'] or 'website' }}">
    <meta property="og:description" content="{{ (!empty($seo->description) ? str_limit(strip_tags($seo->description), 250) : !empty($site->default_seo['description']) ? $site->default_seo['description'] : null) }}">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:locale" content="{{ $site->default_seo['locale'] }}">
    <meta property="og:locale:alternate" content="{{ $site->default_seo['locale_alternate'] }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('assets/site/images/favicon.ico') }}">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>

    <!-- Google Web Fonts
    ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Poppins:300,400,700" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/noty/lib/noty.css') }}">

    @stack('styles')

    <!-- Custom CSS-->
    <link rel="stylesheet" href="{{ asset('assets/site/css/min/style.min.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ URL::to('node_modules/html5shiv/dist/html5shiv.min.js') }}"></script>
    <script src="{{ URL::to('node_modules/respond/main.js') }}"></script>
    <![endif]-->

    <!-- jQuery library -->
    <script src="{{ asset('bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('bower_components/noty/lib/noty.min.js') }}"></script>
</head>
<body>

@yield('content')

<!-- Pace -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/pace/pace.min.js") }}" type="text/javascript"></script>
<!-- Functions -->
<script src="{{ asset("assets/site/js/functions.js") }}"></script>
@stack('scripts')

<script src="{{ asset('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<script>
    let bootstrapButton = $.fn.button.noConflict();
    $.fn.bootstrapBtn = bootstrapButton;

    $(function() {
        $(document).ajaxStart(function() {
            Pace.restart();
        });

        $('.open-nav, .close-canvas').on('click', function(event) {
            event.preventDefault();
            $('.offset-canvas-mobile').toggleClass('open-canvas');
        });
    });
</script>
</body>
</html>