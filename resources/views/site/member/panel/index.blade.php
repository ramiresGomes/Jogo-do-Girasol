@extends('site::base_layout')

@section('content')
    <section class="bg-sunflower" id="member-panel">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="box">
                        <div class="box-body">
                            <img class="profile-user-img img-responsive transition03 img-circle" src="{{ asset('bower_components/AdminLTE/dist/img/user4-128x128.jpg') }}" alt="User profile picture">

                            <h3 class="text-center fs21">{{ $member->name }}</h3>

                            <ul class="nav nav-pills" role="tablist">
                                <li class="active" role="presentation">
                                    <a aria-controls="next-challenge" role="tab" data-toggle="tab" href="#next-challenge">Próximo desafio</a>
                                </li>

                                {{--<li role="presentation">--}}
                                    {{--<a aria-controls="timeline" role="tab" data-toggle="tab" href="#timeline">Linha do tempo</a>--}}
                                {{--</li>--}}

                                <li role="presentation">
                                    <a aria-controls="settings" role="tab" data-toggle="tab" href="#settings">Meus dados</a>
                                </li>

                                <li>
                                    <a href="{{ route('site.member.logout') }}">Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <div class="tab-content box">
                            <div class="active tab-pane fade in relative" id="next-challenge">
                                <div class="tab-overlay hide">
                                    <img class="fa-spin" src="{{ asset('assets/site/images/logo-girasol.png') }}" width="50" alt="Aguarde...">
                                    <h4 class="bold">Aguarde...</h4>
                                </div>

                                <div class="box-body">
                                    {!! $next_challenge !!}
                                </div>
                            </div>

                            {{--<div class="tab-pane fade" id="timeline">--}}
                                {{--<ul class="timeline timeline-inverse">--}}
                                    {{--<li class="time-label">--}}
                                        {{--<span class="bg-red">--}}
                                            {{--10 Feb. 2014--}}
                                        {{--</span>--}}
                                    {{--</li>--}}

                                    {{--<li>--}}
                                        {{--<i class="fa fa-envelope bg-blue"></i>--}}
                                        {{--<div class="timeline-item">--}}
                                            {{--<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>--}}

                                            {{--<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>--}}

                                            {{--<div class="timeline-body">--}}
                                                {{--Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,--}}
                                                {{--weebly ning heekya handango imeem plugg dopplr jibjab, movity--}}
                                                {{--jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle--}}
                                                {{--quora plaxo ideeli hulu weebly balihoo...--}}
                                            {{--</div>--}}

                                            {{--<div class="timeline-footer">--}}
                                                {{--<a class="btn btn-primary btn-xs">Read more</a>--}}
                                                {{--<a class="btn btn-danger btn-xs">Delete</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}

                                    {{--<li>--}}
                                        {{--<i class="fa fa-user bg-aqua"></i>--}}

                                        {{--<div class="timeline-item">--}}
                                            {{--<span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>--}}

                                            {{--<h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}

                                    {{--<li>--}}
                                        {{--<i class="fa fa-comments bg-yellow"></i>--}}

                                        {{--<div class="timeline-item">--}}
                                            {{--<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>--}}

                                            {{--<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>--}}

                                            {{--<div class="timeline-body">--}}
                                                {{--Take me to your leader!--}}
                                                {{--Switzerland is small and neutral!--}}
                                                {{--We are more like Germany, ambitious and misunderstood!--}}
                                            {{--</div>--}}
                                            {{--<div class="timeline-footer">--}}
                                                {{--<a class="btn btn-warning btn-flat btn-xs">View comment</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}

                                    {{--<li class="time-label">--}}
                                        {{--<span class="bg-green">--}}
                                            {{--3 Jan. 2014--}}
                                        {{--</span>--}}
                                    {{--</li>--}}

                                    {{--<li>--}}
                                        {{--<i class="fa fa-camera bg-purple"></i>--}}

                                        {{--<div class="timeline-item">--}}
                                            {{--<span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>--}}

                                            {{--<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>--}}

                                            {{--<div class="timeline-body">--}}
                                                {{--<img src="http://placehold.it/150x100" alt="..." class="margin">--}}
                                                {{--<img src="http://placehold.it/150x100" alt="..." class="margin">--}}
                                                {{--<img src="http://placehold.it/150x100" alt="..." class="margin">--}}
                                                {{--<img src="http://placehold.it/150x100" alt="..." class="margin">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}

                                    {{--<li>--}}
                                        {{--<i class="fa fa-envelope bg-blue"></i>--}}
                                        {{--<div class="timeline-item">--}}
                                            {{--<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>--}}

                                            {{--<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>--}}

                                            {{--<div class="timeline-body">--}}
                                                {{--Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,--}}
                                                {{--weebly ning heekya handango imeem plugg dopplr jibjab, movity--}}
                                                {{--jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle--}}
                                                {{--quora plaxo ideeli hulu weebly balihoo...--}}
                                            {{--</div>--}}

                                            {{--<div class="timeline-footer">--}}
                                                {{--<a class="btn btn-primary btn-xs">Read more</a>--}}
                                                {{--<a class="btn btn-danger btn-xs">Delete</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}

                                    {{--<li>--}}
                                        {{--<i class="fa fa-user bg-aqua"></i>--}}

                                        {{--<div class="timeline-item">--}}
                                            {{--<span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>--}}

                                            {{--<h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request--}}
                                            {{--</h3>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}

                                    {{--<li>--}}
                                        {{--<i class="fa fa-comments bg-yellow"></i>--}}

                                        {{--<div class="timeline-item">--}}
                                            {{--<span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>--}}

                                            {{--<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>--}}

                                            {{--<div class="timeline-body">--}}
                                                {{--Take me to your leader!--}}
                                                {{--Switzerland is small and neutral!--}}
                                                {{--We are more like Germany, ambitious and misunderstood!--}}
                                            {{--</div>--}}
                                            {{--<div class="timeline-footer">--}}
                                                {{--<a class="btn btn-warning btn-flat btn-xs">View comment</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}

                                    {{--<li class="time-label">--}}
                                        {{--<span class="bg-green">--}}
                                            {{--3 Jan. 2014--}}
                                        {{--</span>--}}
                                    {{--</li>--}}

                                    {{--<li>--}}
                                        {{--<i class="fa fa-camera bg-purple"></i>--}}

                                        {{--<div class="timeline-item">--}}
                                            {{--<span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>--}}

                                            {{--<h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>--}}

                                            {{--<div class="timeline-body">--}}
                                                {{--<img src="http://placehold.it/150x100" alt="..." class="margin">--}}
                                                {{--<img src="http://placehold.it/150x100" alt="..." class="margin">--}}
                                                {{--<img src="http://placehold.it/150x100" alt="..." class="margin">--}}
                                                {{--<img src="http://placehold.it/150x100" alt="..." class="margin">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}

                                    {{--<li>--}}
                                        {{--<i class="fa fa-clock-o bg-gray"></i>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}

                            <div class="tab-pane fade" id="settings">
                                <div class="box-body">
                                    <h3 class="amatic bold fs30">Meus dados</h3>
                                    <div class="col-xs-12">
                                        {!! Form::model($member, ['route' => ['site.member.update', $member->id], 'data-toggle' => 'validator', 'class' => 'form-horizontal', 'id' => 'form-member-data']) !!}
                                            <div class="col-xs-12">
                                                <div class="form-group has-feedback">
                                                    {!! Form::label('name', 'Nome') !!}
                                                    {!! Form::text('name', null, ['placeholder' => 'Digite seu nome', 'class' => 'form-control', 'required']) !!}
                                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="form-group has-feedback">
                                                    {!! Form::label('email', 'Email') !!}
                                                    {!! Form::text('email', null, ['placeholder' => 'Digite seu email', 'class' => 'form-control']) !!}
                                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="form-group has-feedback">
                                                    <label for="password">Senha <small class="text-warning">(somente se quiser alterar)</small></label>
                                                    {!! Form::password('password', null, ['placeholder' => 'Digite sua senha', 'class' => 'form-control']) !!}
                                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12">
                                                <div class="form-group has-feedback text-center">
                                                    <button type="submit" class="btn btn-panel btn-sm">
                                                        <i class="fa fa-save"></i>
                                                        Gravar
                                                    </button>
                                                </div>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $(function () {
        $(window).on('resize', function(){
            setSectionWindowHeight($('section.bg-sunflower'));
        });

        setSectionWindowHeight($('section.bg-sunflower'));

        $('#btn-upload').on('click', function () {
            $('#form-meet-challenge').find('input').trigger('click');
        });

        $('#form-meet-challenge').find('input').on('change', function () {
            $('#next-challenge').find('.tab-overlay').removeClass('hide');
            $(this).closest('form').trigger('submit');
        });

        /** Show last tab on refresh **/
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            localStorage.setItem('lastTab', $(this).attr('href'));
        });

        let lastTab = localStorage.getItem('lastTab');
        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
        }
        /** Show last tab on refresh / End **/

        @if (session()->has('data'))
            notyGenerate('success', '{{ (string) Session::get('data') }}', 4000, 'fa-info-circle', 'topCenter');
        @endif
    });
</script>
@endpush