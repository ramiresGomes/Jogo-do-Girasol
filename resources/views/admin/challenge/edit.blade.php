@extends('admin::base_layout')

@section('content')
    <div class='row'>
        <div class='col-xs-12'>
            <div class="box box-warning">
                <div class="box-header with-border">
                    <div class="col-xs-6 col-xs-offset-6 col-sm-4 col-sm-offset-8 col-md-3 col-md-offset-9 col-lg-2 col-lg-offset-10">
                        <a href="{{ route('admin.challenge.index') }}" class="btn btn-block btn-primary">
                            <i class="fa fa-reply"></i>&nbsp;
                            Voltar
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert bg-navy">
                                <i class="ion ion-information-circled"></i>
                                Não se preocupe, os dados são gravados automaticamente.
                            </div>
                        </div>
                    </div>

                    {!! Form::model($challenge, ['route' => ['admin.challenge.update', $challenge->id], 'data-toggle' => 'validator', 'class' => 'trigger-post-on-change']) !!}
                        <div class="row">
                            @include('admin::challenge._form')
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function() {
        triggerPostDataFormOnChangeField();
    });
</script>
@endpush