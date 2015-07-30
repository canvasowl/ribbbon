@extends('templates.master')


@section('content')


  <div class="special-form">
      <div class="panel panel-default">
        <div class="panel-heading">Register For Free!</div>
            <div class="panel-body">
                {{ Form::open(array('action' => 'UsersController@register')) }}
                    <div class="form-group">
                        {{ Form::text('fullName', null, array('class' => 'form-control', "placeholder" => "full name", "autofocus" => "true" )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('email', null, array('class' => 'form-control', "placeholder" => "email" )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password('password', array('class' => 'form-control', "placeholder" => "password" )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Signup', array('class' => 'btn btn-primary btn-wide' )); }}
                    </div>
                {{ Form::close() }}
            </div>
      </div>
  </div>


@stop