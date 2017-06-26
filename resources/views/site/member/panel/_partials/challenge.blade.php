@if(!empty($next_challenge))
    <h3 class="amatic bold fs30">{{ $next_challenge->name }}</h3>
    <div>
        {!! $next_challenge->description !!}
    </div>

    <div class="box-send text-center">
        <div class="btn transition03" id="btn-upload">
            <i class="fa fa-cloud-upload"></i><br>
            <span>Clique aqui para enviar a foto</span>
        </div>

        {!! Form::open(['route' => ['site.member.meetChallenge'], 'files' => true, 'id' => 'form-meet-challenge', 'class' => 'hide']) !!}
        <div class="form-group col-xs-4">
            <label>&nbsp;</label>
            {!! Form::label('') !!}
            {!! Form::file('picture', ['id' => 'picture']) !!}
            {!! Form::hidden('challenge_id', $next_challenge->id) !!}
        </div>
        {!! Form::close() !!}
    </div>
@else
    <h3 class="amatic bold fs30">Você está radiando!</h3>
    <div class="text-center">
        <br>
        <h4>Parabéns, você cumpriu todos os desafios lançados até o momento.</h4>
        <p>Mas não pense que acabou, logo lançaremos novos desafios, fique atento.</p>
    </div>
@endif