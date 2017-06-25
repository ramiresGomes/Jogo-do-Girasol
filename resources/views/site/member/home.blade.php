@extends('site::customer.layout')

@section('content_client')
    {!! Form::open(['route' => 'site.customer.updateInfo', 'data-toggle' => 'validator', 'class' => 'client-form']) !!}
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <h2 class="sect-subtitle">Dados Pessoais</h2>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyph-icon flaticon-user168"></i> Nome</span>
                {!! Form::text('name', $customer->client->name, ['required']) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyph-icon flaticon-email29"></i> E-mail</span>
                {!! Form::email('email', $customer->email, ['required', 'data-remote-error' => 'Este email já está em uso', 'data-remote' => route('customer.verifyEmailUnique')]) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback" id="document-form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card"></i> CPF</span>
                {!! Form::text('document', $customer->client->document, ['required', 'id' => 'document', 'data-remote-error' => 'Este documento já está em uso', 'data-remote' => route('customer.verifyDocumentUnique')]) !!}
                {!! Form::hidden('nature', 'F') !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyph-icon flaticon-phone325"></i> Telefone</span>
                {!! Form::text('phone', $customer->client->phone, ['class' => 'phone']) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyph-icon flaticon-phone325"></i> Celular</span>
                {!! Form::text('cellphone', $customer->client->cellphone, ['class' => 'cellphone', 'required']) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyph-icon flaticon-padlock27"></i> Senha</span>
                {!! Form::password('password', ['id' => 'password']) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyph-icon flaticon-padlock27"></i> Confirmar senha</span>
                {!! Form::password('password_confirmation', ['data-match' => '#password', 'data-match-error' => 'A confirmação deve ser identica a senha']) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <h2 class="sect-subtitle">Sua morada</h2>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyph-icon flaticon-sign41"></i> CEP</span>
                {!! Form::text('zipcode', $customer->client->address->first()->zipcode, ['class' => 'zipcodeVerify zipcode', 'required']) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyph-icon flaticon-place4"></i> Endereço</span>
                {!! Form::text('address', $customer->client->address->first()->address, ['required']) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i> Número</span>
                {!! Form::text('number', $customer->client->address->first()->number, ['required']) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-pin"></i> Estado</span>
                {!! Form::text('state', $customer->client->address->first()->state, ['required']) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyph-icon flaticon-city21"></i> Cidade</span>
                {!! Form::text('city', $customer->client->address->first()->city, ['required']) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-location-arrow"></i> Bairro</span>
                {!! Form::text('district', $customer->client->address->first()->district, ['required']) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>

        <div class="form-group has-feedback">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-plus"></i> Complemento</span>
                {!! Form::text('complement', $customer->client->address->first()->complement) !!}
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>
            <div class="help-block with-errors pull-right"></div>
        </div>
        <br>

        <div class="form-group has-feedback">
            <div class="col-xs-12 col-sm-5 col-md-4 no-padding pull-right">
                <button class="btn btn-block btn-gray" id="submit" type="submit">Gravar</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@push('scripts')
<!-- Bootstrap Validator -->
<script src="{{ asset ("/bower_components/bootstrap-validator/dist/validator.min.js") }}" type="text/javascript"></script>
<!-- Input Mask -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js") }}" type="text/javascript"></script>
<script>
    $(function() {
        $("input[name='document']").inputmask('999.999.999-99[9]');
        $('.cellphone').inputmask("(99) 9999[9]-9999");
        $('.phone').inputmask("(99) 9999-9999");
        $('.zipcode').inputmask("99999-999");
    });
</script>
@endpush