@extends('templates.master')

@section('content')


  <div class="special-form">
      <div class="panel panel-default">
        <div class="panel-heading">Login</div>
            <div class="panel-body">
                {{ Form::open(array('action' => 'UsersController@login')) }}
                    <div class="form-group">
                        {{ Form::text( 'email', null, array('class' => 'form-control', "placeholder" => "email","autofocus" => "true" )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::password( 'password', array('class' => 'form-control', "placeholder" => "password" )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit( 'Login', array('class' => 'btn btn-primary btn-wide')) }}
                    </div>
                {{ Form::close() }}
            </div>
      </div>
  </div>


@stop