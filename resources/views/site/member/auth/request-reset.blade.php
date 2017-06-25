@extends('site::base_layout')

@section('content')
    <section id="login-page" class="bg-sunflower">
        <div class="container">
            <div class="row">
                <div class="text-login text-center">
                    <p>Insira seu email para redefinir sua senha</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-login text-center">
                                {!! Form::open(['route' => 'site.member.sendResetLink', 'method' => 'post', 'data-toggle' => 'validator', 'id' => 'login-form']) !!}
                                <h1 class="amatic text-uppercase bold">Redefinir senha</h1>

                                <div class="form-group {{ $errors->has('email') ? 'has-error' : null }} has-feedback">
                                    {!! Form::email('email', null, ['placeholder' => 'EMAIL', 'required', 'id' => 'email', 'class' => 'form-control']) !!}

                                    <div class="help-block with-errors pull-right"></div>
                                </div>

                                <button type="submit" class="btn text-uppercase btn-link btn-white">Enviar</button>
                                |<a href="{{ route('site.member.index') }}" class="btn text-uppercase btn-link btn-white">Voltar</a>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
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
        const sectionLogin = $('#login-page');

        $(window).on('resize', function(){
            setSectionWindowHeight(sectionLogin);
            sectionLogin.find('.container').css({'marginTop': $(window).height() / 5, 'marginBottom': $(window).height() / 5});
        });

        setSectionWindowHeight(sectionLogin);
        sectionLogin.find('.container').css({'marginTop': $(window).height() / 5, 'marginBottom': $(window).height() / 5});

        @if (count($errors))
            let message;
            @if(count($errors) == 1)
                message = "Ocorreu um erro no processo:";
            @else
                message = "Ocorreram alguns erros no processo";
            @endif

            let template = "<p>"+message+"</p><ul>";

            @if($errors->has('email'))
                template += "<li>{{ $errors->first('email') }}</li>";
            @endif

            template += "</ul>";

            notyGenerate('error', template, 20000, 'fa-warning-circle', 'topCenter');
        @endif

        @if (session('status'))
            notyGenerate('success', '{{ session('status') }}', 20000, 'fa-info-circle', 'topCenter');
        @endif
    });
</script>
@endpush