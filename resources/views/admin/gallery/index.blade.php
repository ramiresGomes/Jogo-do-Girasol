@extends('admin::base_layout')

@push('styles')
<link rel="stylesheet" href="{{ asset('bower_components/dropzone/dist/min/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/photoswipe/dist/photoswipe.css') }}">
<link rel="stylesheet" href="{{ asset('bower_components/photoswipe/dist/default-skin/default-skin.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="callout callout-info no-margin">
                                <p>Formatos suportados: JPG, JPEG, PNG, GIF</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            {!! Form::model($gallery, ['route' => ['admin.gallery.store'], 'data-toggle' => 'validator', 'class' => 'dropzone', 'id' => 'my-dropzone']) !!}
                            <div class="dz-message" data-dz-message>
                                <h3>Arraste as imagens ou clique para adicionar</h3>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                    @if (count($gallery) > 0)
                    <hr>
                    <div class="row">
                        <div class="square-gallery">
                            @foreach ($gallery as $image)
                                <div class='col-xs-4 col-md-3 col-lg-2' id="gallery-thumb-{{ $image->id }}">
                                    <div class="thumb img-thumbnail" data-data="{{ $image }}" id="image-{{ $image->id }}">
                                        <img class="img-responsive" src="{{ asset("uploads/gallery/thumbs/{$image->name}") }}" alt="Imagem da Galeria {{ $image->name }}">

                                        <div>
                                            <a class="gallery-view" data-href="#gallery-image-{{ $image->id }}"><i class="ion-eye"></i></a>
                                            <a class="gallery-delete gallery-images" data-href="{{ $image->id }}" href="{{ route('admin.gallery.destroy', [$image->id]) }}"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="photoswipe hide" id="gallery">
                            @foreach ($gallery as $image)
                                <figure id="gallery-image-{{ $image->id }}">
                                    <a class="thumbnail" href="{{ asset("uploads/gallery/{$image->name}")}}" data-size="{{ $image->dimensions }}">
                                        <img src="{{ asset("uploads/gallery/thumbs/{$image->name}")}}" alt="Imagem da Galeria" class="img-responsive">
                                    </a>
                                </figure>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('_partials.photoswipe')
@endsection

@push('scripts')
<script src="{{ asset("photoswipe-template.js") }}" type="text/javascript"></script>
<script src="{{ asset("/bower_components/photoswipe/dist/photoswipe.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("/bower_components/photoswipe/dist/photoswipe-ui-default.min.js") }}" type="text/javascript"></script>
<script src="{{ asset('/bower_components/dropzone/dist/min/dropzone.min.js') }}"></script>
<script>
    $(function() {
        $('.gallery-view').on('click', function() {
            let reference = $(this).data('href');
            $(reference).trigger('click');
        });

        $('.gallery-delete').on('click', function(e) {
            e.preventDefault();

            let self = $(this);
            let reference = self.data('href');
            let url = self.prop('href');

            $.get(url, function () {
                if (self.hasClass('gallery-images')) {
                    $('#gallery-image-' + reference).remove();
                    $('#gallery-thumb-' + reference).remove();
                }

                if (self.hasClass('gallery-files')) {
                    $('#gallery-file-' + reference).remove();
                }
            });
        });

        Dropzone.options.myDropzone = {
            autoProcessQueue: true,
            uploadMultiple: true,
            paramName: 'image',
            maxFilesize: 10,
            maxFiles: 10,
            parallelUploads: 10,
            acceptedFiles: ".jpg, .jpeg, .png, .gif",
            addRemoveLinks: true,
            init: function () {
                this.on("success", function() {
                    location.reload();
                });
            }
        };
    });
</script>
@endpush