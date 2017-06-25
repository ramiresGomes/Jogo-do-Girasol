<footer id="footer" class="footer">

    <!-- Footer Widgets -->
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="footer-logo">
                                <a href="{{ route('site.index') }}">
                                    <img class="img-responsive" src="{{ asset('website/assets/images/logo-netshop.png') }}" alt="{{ $site->default_seo['site_name'] }}">
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <a href="https://www.facebook.com/netshopinformatica" target="_blank" class="btn-social-counter btn-social-counter--fb">
                                <div>
                                    <i class="fa fa-facebook"></i>
                                </div>

                                <h6>Curta nosso Facebook</h6>
                                <span class="btn-social-counter_count">/netshopinformatica</span>
                                <span class="btn-social-counter_add-icon"></span>
                            </a>

                            <a href="javascript:void(0);" class="btn-social-counter btn-social-counter--whatsapp">
                                <div>
                                    <i class="fa fa-whatsapp"></i>
                                </div>

                                <h6>Atendimento por Whatsapp</h6>
                                <span class="btn-social-counter_count">
                                    (61) 9 8634-1506 / (61) 9 9854-3316
                                </span>
                                <i class="fa fa-mobile"></i>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="footer-store">
                                <h5 class="text-uppercase cl-white">Loja de Informática Asa Norte - Brasília</h5>

                                <figure>
                                    <a href="javascript:void(0);">
                                        <img class="img-rounded img-responsive" src="{{ asset('website/assets/images/loja1.png') }}" alt="Netshop Informática Loja Asa Norte Brasília">
                                    </a>
                                </figure>

                                <div class="margin-t10">
                                    <p>
                                        <i class="fa fa-map-marker"></i>
                                        CLN 208 Bloco "B" Loja 35
                                    </p>

                                    <p>
                                        <i class="fa fa-phone"></i>
                                        Telefone: (61) 3039-6369
                                    </p>

                                    <p>
                                        <i class="fa fa-calendar"></i>
                                        Seg. à Sex. 09:00 - 18:00 | Sab 09:00 - 15:00
                                    </p>

                                    <p>
                                        <i class="fa fa-envelope-o"></i>
                                        atendimento@netshopinformatica.com.br
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="footer-store">
                                <h5 class="text-uppercase cl-white">Loja de Informática Águas Claras - Brasília</h5>

                                <figure>
                                    <a href="javascript:void(0);">
                                        <img class="img-rounded img-responsive" src="{{ asset('website/assets/images/loja2.png') }}" alt="Netshop Informática Loja Águas Claras Brasília">
                                    </a>
                                </figure>

                                <div class="margin-t10">
                                    <p>
                                        <i class="fa fa-map-marker"></i>
                                        Rua 13 Norte Lt 01/03 Loja 19
                                    </p>

                                    <p>
                                        <i class="fa fa-phone"></i>
                                        Telefone: (61) 3568-5382
                                    </p>

                                    <p>
                                        <i class="fa fa-calendar"></i>
                                        Seg. à Sab. 10:00 - 21:00
                                    </p>

                                    <p>
                                        <i class="fa fa-envelope-o"></i>
                                        atendimento@netshopinformatica.com.br
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <ul class="widget-instagram_list">
                        @if(is_array($site->instagram('netshopinformatica.com.br')))
                            @foreach (array_slice($site->instagram('netshopinformatica.com.br'), 0, 8) as $photo)
                                <li class="widget-instagram_item">
                                    <a href="{{ $photo['link'] }}" target="_blank" class="widget-instagram_link-wrapper">
                                        <span class="widget-instagram_plus-sign">
                                            <img src="{{ $photo['images']['low_resolution']['url'] }}" class="widget-instagram_img" alt="Photo Instagram {{ $photo['user']['username'] }}">
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>

                    <a href="https://www.instagram.com/netshopinformatica.com.br" target="_blank" class="btn btn-sm btn-instagram btn-icon-right">
                        Siga-nos no Instagram
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Widgets / End -->

    <!-- Footer Secondary -->
    <div class="footer-secondary">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="footer-secondary_list list-inline text-uppercase">
                        <li>
                            <a href="javascript:void(0);">Todos os direitos reservados</a>
                        </li>

                        @foreach ($site->getMenu('TQUEM')->links as $link)
                            @if (intval($link->link_id) == 0)
                                <li><a @if(!empty($link->url) && !$link->isInternalUrl($link->url)) target="_blank" @endif href="{{ !empty($link->makeRouteLinkMenu($link)) ? $link->makeRouteLinkMenu($link) : route('site.index') }}" title="{{ $link->title }}">{{ $link->label }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Secondary / End -->
</footer>