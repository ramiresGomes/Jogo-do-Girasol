@extends('site::base_layout')

@push('styles')
<link rel="stylesheet" href="{{ asset('bower_components/slick-carousel/slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/slick-carousel/slick/slick-theme.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/photoswipe/dist/photoswipe.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/photoswipe/dist/default-skin/default-skin.css') }}">
@endpush

@section('content')
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="hero-block text-center">
                                <img src="{{ asset('assets/site/images/logo-girasol.png') }}" alt="Jogo do Girassol">
                                <h1 class="amatic text-uppercase bold fs40">O Jogo do Girassol</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-hero text-center">
                                <p>Com o intuito de provar que a internet pode ser usada para fazer o bem, nasceu o Jogo do Girassol, um projeto do grupo Serenidade a favor da preservação da vida.</p>
                                <p>Espalhe o amor nesse desafio do bem!</p>

                                <br>

                                <a href="{{ route('site.member.index') }}" class="btn btn-round btn-white text-uppercase">Entrar no Jogo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#challenges" class="hero-scroll btn-white"><i class="fa fa-angle-down"></i></a>
        </div>
    </section>

    <section id="challenges">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-uppercase bold text-center cl-black">Alguns Desafios</h1>
                    <span class="line"></span>
                </div>

                <div class="col-xs-10 col-md-offset-1">
                    <p class="cl-black text-center text-uppercase">
                        Todas as tarefas devem ser de algum forma registradas em suas redes sociais, com a #ojogodogirassol, marcando @eusouumgirassol, seu semeador estará observando!
                    </p>
                </div>

                <div class="col-xs-12">
                    <div class="challenges-list">
                        <div class="row">
                            <div class="col-xs-6 col-md-4 col-md-offset-1">
                                <div class="challenge text-center amatic text-uppercase">
                                    <h2 class="cl-orange fs50 bold">Desafio 1</h2>
                                    <p class="cl-black fs35 bold">Escreva no braço de alguém que você ama uma frase de carinho</p>
                                </div>
                            </div>

                            <div class="col-xs-6 col-md-4 col-md-offset-2">
                                <div class="challenge text-center amatic text-uppercase">
                                    <h2 class="cl-orange fs50 bold">Desafio 2</h2>
                                    <p class="cl-black fs35 bold">Pense na melhor lembrança que já teve! E aproveite ela</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sunflower-garden">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="text-uppercase bold text-center">Jardim de Girassóis</h1>

                    <div class="photoswipe hide" id="gallery">
                        @foreach ($gallery as $image)
                            <figure id="gallery-image-{{ $image->id }}">
                                <a class="thumbnail" href="{{ asset("uploads/gallery/{$image->name}")}}" data-size="{{ $image->dimensions }}">
                                    <img src="{{ asset("uploads/gallery/thumbs/{$image->name}")}}" alt="Imagem da Galeria" class="img-responsive">
                                </a>
                            </figure>
                        @endforeach
                    </div>

                    <div class="garden-gallery photoswipe">
                        <div class="slick">
                            @foreach($gallery as $image)
                            <div>
                                <a data-href="#gallery-image-{{ $image->id }}" class="scale-hover gallery-view">
                                    <figure>
                                        <img src="{{ asset("uploads/gallery/thumbs/{$image->name}")}}" alt="" class="img-responsive transition02">
                                    </figure>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="garden-text text-uppercase text-center">
                        <div class="col-xs-8 col-xs-offset-2">
                            <p>Compartilhe seu desafio conosco, queremos acompanhar e viver contigo todos esses momentos, celebrando a "<strong>vida</strong>".</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="media">
                        <div class="media-left">
                            <img src="{{ asset('assets/site/images/marca-grupo-serenidade-mini.png') }}" width="100" alt="Grupo Serenidade">
                        </div>

                        <div class="media-body">
                            <small>O grupo Serenidade é um grupo de autoconhecimento e espiritualidade sem fins lucrativos, surgido em 12/03/2002, dirigido pelo psicólogo Leonardo Nogueira.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @include('_partials.photoswipe')
@endsection

@push('scripts')
<script src="{{ asset('bower_components/slick-carousel/slick/slick.min.js') }}"></script>
<script src="{{ asset("photoswipe-template.js") }}" type="text/javascript"></script>
<script src="{{ asset("/bower_components/photoswipe/dist/photoswipe.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/bower_components/photoswipe/dist/photoswipe-ui-default.min.js") }}" type="text/javascript"></script>
<script>
    $(function () {
        const hero = $('#hero');

        $('.gallery-view').on('click', function() {
            let reference = $(this).data('href');
            $(reference).trigger('click');
        });

        $(window).on('resize', function(){
            setSectionWindowHeight(hero);
        });

        setSectionWindowHeight(hero);

        hero.find('.hero-scroll').on('click', function (e) {
            $('html, body').animate({scrollTop: $('#challenges').offset().top}, 'slow');
        });

        $('.slick').slick({
            infinite: true,
            centerMode: true,
            speed: 300,
            slidesToScroll: 3,
            variableWidth: true,
            autoplay: true,
            adaptiveHeight: true
        });
    });
</script>
@endpush