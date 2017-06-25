<!-- Header
================================================== -->
<header id="aa-header" class="transition03">
    <div class="header-general">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <a href="{{ route('site.index') }}" class="logo" title="Página inicial">
                        <img class="img-responsive" src="{{ asset('website/assets/images/logo-netshop.png') }}" alt="{{ $site->default_seo['site_name'] }}">
                    </a>
                </div>

                <div class="hidden-xs col-sm-8 col-md-8 no-padding-xs">
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="list-inline pull-right">
                                <li><a href="{{ route("site.contentmanager.item", 'a-empresa') }}" title="A Empresa"><i class="fa fa-heart"></i>A Empresa</a></li>
                                <li><a href="{{ route("site.contentmanager.items", 'noticias/1') }}" title="Notícias"><i class="fa fa-newspaper-o"></i>Notícias</a></li>
                                <li class="hidden-sm"><a href="javascript:void(0);"><i class="fa fa-phone-square"></i>(61) 3039-6369</a></li>
                                <li class="hidden-sm"><a href="javascript:void(0);"><i class="fa fa-whatsapp"></i>(61) 98634-1506</a></li>
                                <li><div class="fb-like pull-right" data-href="https://www.facebook.com/netshopinformatica" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div></li>
                                <li class="hidden-sm hidden-md"><a href="https://www.facebook.com/netshopinformatica" target="_blank" class="btn-facebook btn">facebook</a></li>
                                <li class="visible-sm">
                                    @if (!Auth::guard('web_member')->check())
                                        <a href="{{ route('site.customer.customerPanel') }}" title="Olá, faça seu login ou cadastre-se">
                                            <i class="fa fa-lock"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('site.customer.customerPanel') }}" title="Seja bem vindo {{ Auth::guard('web_member')->user()->getName(true) }}. Acessar conta!">
                                            <i class="fa fa-unlock-alt"></i>
                                        </a>
                                    @endif
                                </li>

                                <li class="visible-sm">
                                    <a href="{{ route('site.productcommerce.cart.getCart') }}" class="shopping-basket" title="Carrinho de compras">
                                        <i class="fa fa-cart-arrow-down"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row hidden-sm">
                        <div class="hidden-sm col-md-6 col-lg-6">
                            <div class="search-box">
                                {!! Form::open(['route' => 'site.page.search', 'method' => 'get']) !!}
                                {!! Form::text('search', null, ['placeholder' => 'Encontre o que procura aqui']) !!}
                                <button type="submit"><span class="flaticon2-search"></span></button>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div class="col-xs-3 col-sm-3 col-md-6 col-lg-6">
                            <ul class="list-inline account-bag">
                                <li>
                                    @if (!Auth::guard('web_member')->check())
                                        <a href="{{ route('site.customer.customerPanel') }}" title="Olá, faça seu login ou cadastre-se">
                                            <i class="fa fa-lock"></i>
                                            <p class="visible-md visible-lg">Olá, faça seu login ou cadastre-se</p>
                                        </a>
                                    @else
                                        <a href="{{ route('site.customer.customerPanel') }}" title="Seja bem vindo {{ Auth::guard('web_member')->user()->getName(true) }}. Acessar conta!">
                                            <i class="fa fa-unlock-alt"></i>
                                            <p class="visible-md visible-lg">Seja bem vindo {{ Auth::guard('web_member')->user()->getName(true) }}!</p>
                                        </a>
                                    @endif
                                </li>

                                <li>
                                    <a href="{{ route('site.productcommerce.cart.getCart') }}" class="shopping-basket" title="Carrinho Carrino carrinhocompras">
                                        <i class="fa fa-cart-arrow-down"></i>
                                        <p class="visible-md visible-lg" id="shopping-bag">
                                            @if ($site->getCountItemsCart() > 0)
                                                Há {{ $site->getCountItemsCart() }} produto(s) no carrinho
                                            @else
                                                Não há produtos no carrinho
                                            @endif
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-10 col-md-11 col-lg-10 no-padding">
                    <ul class="nav navbar-nav hidden-xs">
                        <li>
                            <a href="{{ route('site.index') }}" title="Página Inicial">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        @foreach ($site->getProductCategories() as $category)
                            @if (count($category->categoryFather) == 0)
                                <li>
                                    <a href="{{ $category->getLink($category) }}">{{ $category->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-2 visible-lg">
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="{{ route('site.productcommerce.items', null) }}" title="Todos os produtos">Todos</a></li>
                        <li>
                            <a href="#" class="mobile-menu-btn open-nav">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-xs-12 col-sm-2 col-md-1 hidden-lg">
                    <ul class="nav navigation-icons navbar-nav pull-right">
                        <li class="visible-xs">
                            @if (!Auth::guard('web_member')->check())
                                <a href="{{ route('site.customer.customerPanel') }}" title="Olá, faça seu login ou cadastre-se">
                                    <i class="fa fa-lock"></i>
                                </a>
                            @else
                                <a href="{{ route('site.customer.customerPanel') }}" title="Seja bem vindo {{ Auth::guard('web_member')->user()->getName(true) }}. Acessar conta!">
                                    <i class="fa fa-unlock-alt"></i>
                                </a>
                            @endif
                        </li>

                        <li class="visible-xs">
                            <a href="{{ route('site.productcommerce.cart.getCart') }}" class="shopping-basket" title="Carrinho de compras">
                                <i class="fa fa-cart-arrow-down"></i>
                            </a>
                        </li>

                        <li class="visible-xs visible-sm">
                            <button class="cl-white fs21 search-pan-open mobile-menu-search">
                                <i class="fa fa-search"></i>
                            </button>
                        </li>

                        <li>
                            <a href="#" class="mobile-menu-btn open-nav">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header / End -->

@push('scripts')
<script>
    $("header").headroom({
        offset : 320,
        tolerance : {
            up : 0,
            down : 0
        }
    });

    $('.has-submenu > span').on('click', function(event) {
        event.preventDefault();

        let self = $(this);

        if (self.hasClass('open')) {
            self.removeClass('open').next('ul').slideUp('fast');
        } else {
            $('.has-submenu span').next('ul').slideUp('fast');
            $('.has-submenu').find('.open').removeClass('open');

            $(this).addClass('open');
            $(this).next('ul').slideToggle('fast');
        }
    });

    $('.open-nav, .close-canvas').on('click', function(event) {
        event.preventDefault();
        $('.offset-canvas-mobile').toggleClass('open-canvas');
    });

    var $searchPanel = $('.search-panel'),
        $searchInput = $('#searchy-term');

    $('.search-pan-open').on('click', function(event) {
        event.preventDefault();
        $searchPanel.addClass('show-pan');

        setTimeout(function () {
            $searchInput.focus();
        }, 200);
    });

    $(document).on('keyup', function(e) {
        if (e.keyCode == 27) {
            $searchPanel.removeClass('show-pan');
            $searchInput.val('');
        }
    });

    $('.close-panel').on('click', function(event) {
        event.preventDefault();
        $searchPanel.removeClass('show-pan');
        $searchInput.val('');
    });
</script>
@endpush