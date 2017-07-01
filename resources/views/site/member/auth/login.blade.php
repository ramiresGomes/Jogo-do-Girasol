@extends('site::base_layout')

@section('content')
    <section id="login-page" class="bg-sunflower">
        <div class="container">
            <div class="row">
                <div class="text-login text-center">
                    <p>Com o intuito de provar que a internet pode ser usada para fazer o bem, nasceu o jogo do Girasol.</p>
                    <p>Espalhe o amor nesse desafio do bem!</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-login text-center">
                                {!! Form::open(['route' => 'site.member.store', 'data-toggle' => 'validator']) !!}
                                    <h1 class="amatic text-uppercase bold">Novo jogo</h1>

                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : null }} has-feedback">
                                        {!! Form::text('name', old('name'), ['placeholder' => 'NOME', 'required', 'id' => 'name', 'class' => 'form-control']) !!}

                                        <div class="help-block with-errors pull-right"></div>
                                    </div>

                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : null }} has-feedback">
                                        {!! Form::email('email', null, ['placeholder' => 'EMAIL', 'required', 'data-remote-error' => 'Este email já está em uso', 'data-remote' => route('site.member.verifyEmailUnique'), 'id' => 'email', 'class' => 'form-control']) !!}

                                        <div class="help-block with-errors pull-right"></div>
                                    </div>

                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : null }} has-feedback">
                                        {!! Form::password('password', ['placeholder' => 'SENHA', 'required', 'id' => 'password', 'class' => 'form-control']) !!}

                                        <div class="help-block with-errors pull-right"></div>
                                    </div>

                                    <button type="submit" class="btn text-uppercase btn-link btn-white">Cadastrar</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-login text-center">
                                {!! Form::open(['route' => 'site.member.login', 'method' => 'post', 'data-toggle' => 'validator', 'id' => 'login-form']) !!}
                                <h1 class="amatic text-uppercase bold">Já sou membro</h1>

                                <div class="form-group {{ $errors->has('email') ? 'has-error' : null }} has-feedback">
                                    {!! Form::email('email', old('email'), ['placeholder' => 'EMAIL', 'required', 'id' => 'email', 'class' => 'form-control']) !!}

                                    <div class="help-block with-errors pull-right"></div>
                                </div>

                                <div class="form-group {{ $errors->has('password') ? 'has-error' : null }} has-feedback">
                                    {!! Form::password('password', ['placeholder' => 'SENHA', 'required', 'id' => 'password', 'class' => 'form-control']) !!}

                                    <div class="help-block with-errors pull-right"></div>
                                </div>

                                <button type="submit" class="btn text-uppercase btn-link btn-white">Entrar</button>
                                |<a href="{{ route('site.member.showReset') }}" class="btn text-uppercase btn-link btn-white">Esqueci a senha</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="text-login text-center">
                    <a href="{{ url('/') }}" class="btn btn-link btn-white text-uppercase">Voltar a home</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<!-- Bootstrap Validator -->
<script src="{{ asset ("/bower_components/bootstrap-validator/dist/validator.min.js") }}" type="text/javascript"></script>

<script>
    $(function () {
        $(window).on('resize', function(){
            setSectionWindowHeight($('#login-page'));
        });

        setSectionWindowHeight($('#login-page'));

        @if (count($errors))
            let message;
            @if(count($errors) == 1)
                message = "Ocorreu um erro no processo:";
            @else
                message = "Ocorreram alguns erros no processo";
            @endif

            let template = "<p>"+message+"</p><ul>";

            @foreach($errors->all() as $error)
                template += "<li>{{ $error }}</li>";
            @endforeach

            template += "</ul>";

            notyGenerate('error', template, 20000, 'fa-warning-circle', 'topCenter');
        @endif
    });
</script>
@endpush