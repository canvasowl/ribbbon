<div><strong>Create new credentials</strong></div><br>
<form class="credential-form new-credential">
    <span class="status-msg"></span>
    <div class="form-group">
        <label>FTP/SSH</label> <input v-model="newCredential.type" type="radio" name="type" value="1">
        <label>Other</label> <input v-model="newCredential.type" type="radio" name="type" value="0" checked>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input v-model="newCredential.name" class="form-control" type="text" name="name" placeholder="Name">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input v-model="newCredential.username" class="form-control" type="text" name="username" placeholder="Username">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input v-model="newCredential.password" class="form-control" type="text" name="password" placeholder="Password">
    </div>
    <div class="form-group type-@{{ newCredential.type }}">
        <div class="col-xs-6 no-padding-left">
            <label>Hostname</label>
            <input v-model="newCredential.hostname" class="form-control other" type="text" name="hostname" placeholder="Hostname">
        </div>
        <div class="col-xs-6 no-padding-right">
            <label>Port</label>
            <input v-model="newCredential.port" class="form-control other" type="text" name="port" placeholder="Port">
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-group">
        <button v-on:click="createCredential(project.user_id, project.id)" class="btn btn-primary">Save</button>
    </div>
</form>
<hr>

<div class="row credential-list">
    <div v-on:click="editCredential(credential)" v-for="credential in project.credentials" class="col-xs-12 col-md-4 credential-@{{ credential.id }}">
        <div class="credential">
            <div>
                <label class="pull-left">w.@{{ credential.name }}</label>
                <div class="show-on-hover pull-right">
                    <span v-on:click="deleteCredential(credential.id)" class="ion-close-round"></span>
                </div>
                <div class="clearfix"></div>
            </div>
            <p>Username: @{{ credential.username }} </p>
            <p>Password: @{{ credential.password }}</p>
            <p v-if=" credential.hostname != '' ">Hostname: @{{ credential.hostname }}</p>
            <p v-if=" credential.port != 0 ">Port: @{{ credential.port }}</p>
        </div>
    </div>
</div>


{{--@if( count($credentials) > 0)--}}
        {{--<!-- server panel -->--}}
{{--<div>--}}
    {{--<div><strong>FTP & SSH Accounts</strong></div>--}}
    {{--<div class="ftp-panel-body">--}}
        {{--<div class="row">--}}
            {{--@foreach ($credentials as $credential)--}}
                {{--@if ($credential->type == true)--}}
                    {{--<div class="col-xs-12 col-md-6 credential-wrap" id="credential-wrap-{{ $credential->id }}"><br>--}}
                        {{--<section class="info">--}}
                            {{--<h4>{{ $credential->name }}</h4	>--}}
                            {{--<p><strong>Hostname:</strong> {{ $credential->hostname }}</p>--}}
                            {{--<p><strong>Username:</strong> {{ $credential->username }}</p>--}}
                            {{--<p><strong>Password:</strong> {{ $credential->password }}</p>--}}
                            {{--<p><strong>Port:</strong> {{ $credential->port }}</p>--}}

                            {{--@if($owner_id == Auth::id())--}}
                                {{--<div class="actions">--}}
                                    {{--<ul class="inline-list list-style-none">--}}
                                        {{--<li>--}}
                                            {{--{!! Form::open(array('action' => 'CredentialsController@destroy', 'method' => 'delete')) !!}--}}
                                            {{--<input type="hidden" name="id" value="{!! $credential->id !!}">--}}
                                            {{--<button title="delete" id="{{ $credential->id }}" type="submit" class="btn btn-default btn-delete"><i class="fa fa-trash"></i></button>--}}
                                            {{--{!! Form::close() !!}--}}
                                        {{--</li>--}}
                                        {{--<?php /*<li>--}}
                                            {{--<button title="edit" class="btn btn-default"><a href=""><i class="fa fa-pencil"></i></a></button>--}}
                                        {{--</li>*/ ?>--}}
                                        {{--<div class="clearfix"></div>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        {{--</section>--}}
                    {{--</div>--}}
                {{--@endif--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div><br>--}}

{{--<!-- other panel -->--}}
{{--<div>--}}
    {{--<div><strong>Other Credentials</strong></div>--}}
    {{--<div class="other-panel-body">--}}
        {{--<div class="row">--}}
            {{--@foreach ($credentials as $credential)--}}
                {{--@if ($credential->type == false)--}}
                    {{--<div class="col-xs-12 col-md-6 credential-wrap" id="credential-wrap-{{ $credential->id }}"><br>--}}
                        {{--<section class="info">--}}
                            {{--<h4>{{ $credential->name }}</h4	>--}}
                            {{--<p><strong>Username:</strong> {{ $credential->username }}</p>--}}
                            {{--<p><strong>Password:</strong> {{ $credential->password }}</p>--}}

                            {{--@if($owner_id == Auth::id())--}}
                                {{--<div class="actions">--}}
                                    {{--<ul class="inline-list list-style-none">--}}
                                        {{--<li>--}}
                                            {{--{!! Form::open(array('action' => 'CredentialsController@destroy', 'method' => 'delete')) !!}--}}
                                            {{--<input type="hidden" name="id" value="{{ $credential->id }}">--}}
                                            {{--<button title="delete" id="{{ $credential->id }}" type="submit" class="btn btn-default btn-delete"><i class="fa fa-trash"></i></button>--}}
                                            {{--{!! Form::close() !!}--}}
                                        {{--</li>--}}
                                        {{--<div class="clearfix"></div>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        {{--</section>--}}
                    {{--</div>--}}
                {{--@endif--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endif--}}