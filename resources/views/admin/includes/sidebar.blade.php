<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#">{{ Auth::user()->email }}</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="header">NAVEGAÇÃO</li>

            <li class="{{ Ekko::isActiveRoute('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="ion ion-android-compass"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ Ekko::areActiveRoutes(['admin.member.*', 'admin.challenge.*']) }}">
                <a href="#">
                    <i class="ion ion-plus-circled"></i> <span>O Jogo</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    <li class="{{ Ekko::areActiveRoutes(['admin.member.*']) }}">
                        <a href="{{ route('admin.member.index') }}"><i class="fa fa-user"></i> @lang('sunflower.admin.pages.member')</a>
                    </li>

                    <li class="{{ Ekko::areActiveRoutes(['admin.challenge.*']) }}">
                        <a href="{{ route('admin.challenge.index') }}"><i class="fa fa-user"></i> @lang('sunflower.admin.pages.challenge')</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Ekko::areActiveRoutes(['admin.gallery.*']) }}">
                <a href="{{ route('admin.gallery.index') }}"><i class="fa fa-picture-o"></i> Galeria de @lang('sunflower.admin.pages.gallery')</a>
            </li>

            <li class="treeview {{ Ekko::areActiveRoutes(['admin.user.*']) }}">
                <a href="#"><i class="fa fa-lock"></i> <span>Segurança</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li class="{{ Ekko::areActiveRoutes(['admin.user.*']) }}">
                        <a href="{{ route('admin.user.index') }}"><i class="fa fa-users"></i> Usuários</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>