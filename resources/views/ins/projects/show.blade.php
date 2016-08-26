@extends('templates/ins/master')

@section('content')

<div id="project">
    <div class="row" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="col-xs-12 page-title-section">
            <h1 class="pull-left">@{{ project.name }} <a v-on:click="startProjectEditMode()" class="show-on-hover btn btn-default" title="Edit Project"><i class="ion-edit"></i></a></h1>
            <div class="clearfix"></div>
            <div v-if="project.description != '' " class="col-sm-12 col-md-6 no-side-padding">
                <p><span class="dim">Description:</span> @{{ project.description }}</p>
            </div>
            <div class="col-sm-12 col-md-6 no-side-padding">
                    <a v-if="project.production != '' " href="@{{ project.production }} " target="_blank" class="pull-right"><span class="label label-default"><i class="ion-ios-world-outline"></i> Production</span></a>
                    <a v-if="project.dev != '' " href="@{{ project.dev }}" target="_blank" class="pull-right"><span class="label label-default"><i class="ion-ios-world-outline"></i> Development</span></a>
                    <a v-if="project.github != '' " href="@{{ project.github }}" target="_blank" class="pull-right"><span class="label label-default"><i class="ion-fork-repo"></i> Version Control</span></a>
            </div>
            <div class="clearfix"></div>
            <p>
                <hr>
                <span class="dim">Progress</span>
                <span>
                    <span class="dim">| Low</span> <span class="priority-circle priority-low"></span>
                    <span class="dim">Normal</span> <span class="priority-circle priority-normal"></span>
                    <span class="dim">Medium</span> <span class="priority-circle priority-medium"></span>
                    <span class="dim">High</span> <span class="priority-circle priority-high"></span>
                    <span class="dim">Highest</span> <span class="priority-circle priority-highest"></span>
                </span>
            </p>
            <div class="col-xs-11 no-padding-left">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                         aria-valuemin="0" aria-valuemax="100" style="width:@{{ projectProgress }}%">
                    </div>
                </div>
            </div>
            <div class="col-xs-1 no-margin-right">
                <div class="pull-right"><span class="weight">w.@{{ projectWeight }}</span></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="main-section">
                <div class="pull-right">
                    <button v-on:click="showTaskCreateForm()" style="position: relative; z-index: 10" class="btn btn-primary"><span class="ion-plus-circled"></span> New Task</button>
                </div>
                <div class="mega-menu mega-menu-tab">
                    <div class="links">
                        <a  data-id="tab_tasks" href="">Tasks (@{{ numTasks }})</a>
                        <a  data-id="tab_backlog" href="">Backlog (@{{ numBacklogTasks }})</a>
                        <a  data-id="tab_credentials" href="">Credentials (@{{ numCredentials }})</a>
                        <a  data-id="tab_members" href="">Members</a>
                    </div>
                    <div class="content">
                        <div class="item" id="tab_tasks">
                            @include('ins.projects.partials.tasks')
                        </div>
                        <div class="item" id="tab_backlog">
                            @include('ins.projects.partials.backlog')
                        </div>
                        <div class="item" id="tab_credentials">
                            @include('ins.projects.partials.credentials')
                        </div>
                        <div class="item" id="tab_members">
                            @include('ins.projects.partials.members')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('ins.projects.partials.forms')

    <script> megaMenuInit(); </script>
</div>

<script src="{{ asset('assets/js/controllers/project.js') }}"></script>

@stop()



