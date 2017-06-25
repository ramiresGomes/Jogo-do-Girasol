@extends('admin::base_layout')

@section('content')
    <div class='row'>
        <div class='col-xs-12'>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <div class="col-xs-6 col-xs-offset-6 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 col-lg-2 col-lg-offset-10">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-block btn-primary">
                            <i class="fa fa-reply"></i>&nbsp;
                            Voltar
                        </a>
                    </div>
                </div>

                {!! Form::open(['route' => 'admin.user.store', 'data-toggle' => 'validator']) !!}
                <div class="box-body">
                    @include('admin::user._form')
                </div>

                <div class="box-footer">
                    <div class="col-xs-5 col-sm-4 col-md-3 col-lg-3 row-btn">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-block btn-danger btn-lg">
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
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection