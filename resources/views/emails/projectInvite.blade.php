@extends('emails.layouts.master')

@section('title')
    You are now a member of the project {{ $project_name }}.
@stop

@section('content')
    You have been invited to {{ $project_name }} making you a new member of this project. As a new member you can create,
    delete, tasks and credentials.
    <br><br>
    <a style="text-decoration: none; background-color: #74cd9e;color: #fff;border-radius: 4px;display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height:1.42857143;text-align: center;white-space: nowrap;" target="_blank" href="{{ $project_url }}">Go To Project</a>
@stop
