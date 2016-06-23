@extends('templates.outs.auth')

@section('content')

    <div class="special-form">
        <a href="/"><img src="{{ \App\Helpers\Helpers::logoUrl()  }}" alt=""></a>
        <h3 class="text-center">REGISTER</h3>
        @if ($errors->first())
            <span class="status-msg error-msg">{{ $errors->first() }}</span>
        @endif
        <hr>
        {!! Form::open(array('action' => 'UsersController@register')) !!}
        <div class="form-group">
            {!! Form::text('fullName', null, array('class' => 'form-control', "placeholder" => "Full name", "autofocus" => "true" )) !!}
        </div>
        <div class="form-group">
            {!! Form::text('email', null, array('class' => 'form-control', "placeholder" => "Email" )) !!}
        </div>
        <div class="form-group">
            {!! Form::password('password', array('class' => 'form-control', "placeholder" => "Password" )) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Register', array('class' => 'btn btn-primary btn-wide' )) !!}
        </div>
        {!! Form::close() !!}
        <p>Have an account? <a href="/login">login</a></p>
    </div>

@stop


