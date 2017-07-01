<div class="col-xs-12 col-sm-6">
    <div class="form-group has-feedback">
        <i class="fa fa-asterisk pull-right text-red" data-toggle="tooltip" title="Campo obrigatório"></i>
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-xs-12 col-sm-6">
    <div class="form-group">
        {!! Form::label('&nbsp;') !!}
        <input type="checkbox" name="is_information" class="iCheck form-control" @if (isset($challenge) && $challenge->is_information == 1) checked @endif>
        {!! Form::label('Este desafio é informativo ou motivacional!') !!}
    </div>
</div>

<div class="col-xs-12">
    <div class="form-group has-feedback">
        {!! Form::label('description', 'Texto do Conteúdo') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control ckeditor', 'id' => 'description']) !!}
        <div class="help-block with-errors"></div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('other_components/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace('description', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',

        customConfig : 'config-default.js',
        toolbarGroups: [
            {"name":"document","groups":["mode"]},
            {"name":"basicstyles","groups":["basicstyles"]},
            {"name":"links","groups":["links"]},
            {"name":"paragraph","groups":["list","blocks","align"]},
            {"name":"insert","groups":["insert"]},
            {"name":"styles","groups":["styles"]},
            {"name":"maximize", "groups":["styles"]}
        ],
        removeButtons: 'Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
    }).on('blur', function (e) {
        $('#' + e.editor.name).html(e.editor._.data).trigger('change');
    });
</script>
@endpush