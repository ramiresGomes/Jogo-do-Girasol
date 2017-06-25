<header class="main-header">
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <span class="logo-mini">
            <img class="fa-spin" width="30px" src="{{ asset("assets/admin/images/logo-girassol.png") }}">
        </span>

        <span class="logo-lg">Jogo do <b>Girasol</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="user-image" alt="{{ Auth::user()->name }}">
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="{{ Auth::user()->name }}">
                            <p>
                                {{ Auth::user()->name }}
                                <small>@lang('square.custom.general.registered-at', ['time' => Auth::user()->getHumanCreated()])</small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('admin.user.edit', Auth::user()->id) }}" class="btn btn-default btn-flat">
                                    @lang('square.custom.button.profile')
                                </a>
                            </div>

                            <div class="pull-right">
                                <a href="{{ url('logout') }}" class="btn btn-default btn-flat">
                                    @lang('square.custom.button.sign-out')
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>