<div class="col-xs-6 col-md-4">
    <div class="form-group has-feedback">
        <i class="fa fa-asterisk pull-right text-red" data-toggle="tooltip" title="Campo obrigatório"></i>
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-xs-6 col-md-4">
    <div class="form-group has-feedback">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="form-group has-feedback">
        {!! Form::label('password', 'Senha') !!}
        <small class="text-yellow pull-right">(Preencha somente se deseja alterar)</small>
        {!! Form::password('password', null, ['class' => 'form-control']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-xs-6 col-md-4">
    <div class="form-group has-feedback">
        {!! Form::label('phone', 'Telefone') !!}
        {!! Form::text('phone', null, ['class' => 'form-control cellphone']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js') }}"></script>
@endpush