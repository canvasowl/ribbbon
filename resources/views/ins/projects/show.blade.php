@extends('templates/ins/master')

@section('content')
    <div class="row" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="col-xs-12 page-title-section">
            <h1 class="pull-left">Project Name</h1>
            <div class="clearfix"></div>
            <p class="dim">Progress</p>
            <div class="col-xs-10 no-padding-left">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                         aria-valuemin="0" aria-valuemax="100" style="width:70%">
                        <span class="sr-only">70% Complete</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-2 no-margin-right">
                <span class="weight">w.10</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="main-section">
                <div class="mega-menu mega-menu-tab">
                    <div class="links">
                        <a  data-id="tab_tasks" href="">Tasks (0)</a>
                        <a  data-id="tab_backlog" href="">Backlog (0)</a>
                        <a  data-id="tab_credentials" href="">Credentials (0)</a>
                        <a  data-id="tab_files" href="">Files (0)</a>
                        <a  data-id="tab_manage" href="">Manage (0)</a>
                    </div>
                    <div class="content">
                        <div class="item" id="tab_tasks">Tasks</div>
                        <div class="item" id="tab_backlog">Backlog</div>
                        <div class="item" id="tab_credentials">Credentials</div>
                        <div class="item" id="tab_files">Files</div>
                        <div class="item" id="tab_manage">Manage</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script> megaMenuInit(); </script>
@stop()



