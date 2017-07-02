@extends('admin::base_layout')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-xs-6 col-sm-8 col-md-9 col-lg-10">
                            <h4>Dados do membro</h4>
                        </div>

                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="{{ route('admin.member.index') }}" class="btn btn-block btn-primary">
                                <i class="fa fa-reply"></i>&nbsp;
                                Voltar
                            </a>
                        </div>
                    </div>
                </div>

                {!! Form::open(['route' => 'admin.member.store', 'data-toggle' => 'validator', 'id' => 'client_general']) !!}
                    <div class="box-body">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="callout callout-success">
                                    <i class="ion ion-information-circled"></i>
                                    Preencha os campos abaixo e clique em <strong>"Adicionar"</strong> para concluir o cadastro.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @include('admin::member._form')
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xs-5 col-sm-4 col-md-3 col-lg-3 row-btn">
                                <a href="{{ route('admin.member.index') }}" class="btn btn-block btn-danger btn-lg">
                                    <i class="fa fa-times"></i>&nbsp;
                                    Cancelar
                                </a>
                            </div>

                            <div class="col-xs-5 col-sm-4 col-md-3 col-lg-3 col-xs-offset-2 col-sm-offset-4 col-md-offset-6 col-lg-offset-6">
                                <button type="submit" class="btn btn-block bg-olive btn-lg">
                                    <i class="fa fa-floppy-o"></i>&nbsp;
                                    Adicionar
                                </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection