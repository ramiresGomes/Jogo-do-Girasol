@extends('site::base_layout')

@section('content')
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="hero-block text-center">
                                <img src="{{ asset('assets/site/images/logo-girasol.png') }}" alt="Jogo do Girasol">
                                <h1 class="amatic text-uppercase bold fs40">O Jogo do Girasol</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="text-hero text-center">
                                <p>Com o intuito de provar que a internet pode ser usada para fazer o bem, nasceu o jogo do Girasol.</p>
                                <p>Espalhe o amor nesse desafio do bem!</p>

                                <br>

                                <a href="{{ route('site.member.index') }}" class="btn btn-round btn-white text-uppercase">Entrar no jogo</a>
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
                        Todas as tarefas devem ser de algum forma registradas em suas redes sociais, com a #ojogodogirasol, marcando @eusouumgirasol, seu mentor estará observando!
                    </p>
                </div>

                <div class="col-xs-12">
                    <div class="challenges-list">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-2">
                                <div class="challenge text-center amatic text-uppercase">
                                    <h2 class="cl-orange fs50 bold">Desafio 1</h2>
                                    <p class="cl-black fs35 bold">Escreva no braço de alguém que você ama uma frase de carinho</p>
                                </div>
                            </div>

                            <div class="col-md-3 col-md-offset-2">
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

                    <div class="garden-gallery">
                        <div class="row">
                            <div class="col-xs-6 col-md-2">
                                <a href="" class="scale-hover">
                                    <figure>
                                        <img src="{{ asset('assets/site/images/desafio1.jpg') }}" alt="" class="img-responsive transition02">
                                    </figure>
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-2">
                                <a href="" class="scale-hover">
                                    <figure>
                                        <img src="{{ asset('assets/site/images/desafio2.jpg') }}" alt="" class="img-responsive transition02">
                                    </figure>
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-2">
                                <a href="" class="scale-hover">
                                    <figure>
                                        <img src="{{ asset('assets/site/images/desafio3.jpg') }}" alt="" class="img-responsive transition02">
                                    </figure>
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-2">
                                <a href="" class="scale-hover">
                                    <figure>
                                        <img src="{{ asset('assets/site/images/desafio4.jpg') }}" alt="" class="img-responsive transition02">
                                    </figure>
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-2">
                                <a href="" class="scale-hover">
                                    <figure>
                                        <img src="{{ asset('assets/site/images/desafio1.jpg') }}" alt="" class="img-responsive transition02">
                                    </figure>
                                </a>
                            </div>

                            <div class="col-xs-6 col-md-2">
                                <a href="" class="scale-hover">
                                    <figure>
                                        <img src="{{ asset('assets/site/images/desafio2.jpg') }}" alt="" class="img-responsive transition02">
                                    </figure>
                                </a>
                            </div>
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
@endsection

@push('scripts')
<script>
    $(function () {
        const hero = $('#hero');

        $(window).on('resize', function(){
            setSectionWindowHeight(hero);
        });

        setSectionWindowHeight(hero);

        hero.find('.hero-scroll').on('click', function (e) {
            $('html, body').animate({scrollTop: $('#challenges').offset().top}, 'slow');
        });
    });
</script>
@endpush