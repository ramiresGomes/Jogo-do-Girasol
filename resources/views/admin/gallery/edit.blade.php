@extends('admin::base_layout')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
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

                <div class="box-body">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="alert bg-navy">
                                <i class="ion ion-information-circled"></i>
                                Não se preocupe, os dados são gravados automaticamente.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {!! Form::model($member, ['route' => ['admin.member.update', $member->id], 'data-toggle' => 'validator', 'class' => 'trigger-post-on-change']) !!}
                            @include('admin::member._form')
                        {!! Form::close() !!}
                    </div>
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