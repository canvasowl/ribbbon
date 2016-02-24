@extends('templates/ins/master')

@section('content')

<div id="project">
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
                <div class="pull-right">
                    <button style="position: relative; z-index: 10" class="btn btn-primary"><span class="ion-plus-circled"></span> New Task</button>
                </div>
                <div class="mega-menu mega-menu-tab">
                    <div class="links">
                        <a  data-id="tab_tasks" href="">Tasks (0)</a>
                        <a  data-id="tab_backlog" href="">Backlog (0)</a>
                        <a  data-id="tab_credentials" href="">Credentials (0)</a>
                        <a  data-id="tab_files" href="">Files (0)</a>
                        <a  data-id="tab_manage" href="">Manage (0)</a>
                    </div>
                    <div class="content">
                        <div class="item" id="tab_tasks">
                            <div class="row task-list-row">
                                <div class="col-xs-12 col-md-4">
                                    <ul class="task-list">
                                        <h5 class="title">In Progress (10)</h5>
                                        <li>
                                            <div>
                                                <div class="pull-left color-badge">w.30</div>
                                                <div class="show-on-hover pull-right">
                                                    <span class="ion-close-round"></span>
                                                    <span class="ion-edit"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div>
                                                <h5>Task Name</h5>
                                            </div>
                                            <footer>
                                                <select class="form-control show-on-hover">
                                                    <option value="backlog">backlog</option>
                                                    <option value="progress">Progress</option>
                                                    <option value="testing">Testing</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </footer>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <ul class="task-list">
                                        <h5 class="title">Testing (10)</h5>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <ul class="task-list">
                                        <h5 class="title">Completed (10)</h5>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item" id="tab_backlog">Backlog</div>
                        <div class="item" id="tab_credentials">Credentials</div>
                        <div class="item" id="tab_files">Files</div>
                        <div class="item" id="tab_manage">Manage</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-form new-task">
        <header>
            <p class="pull-left">New Task</p>
            <div class="actions pull-right">
                <i title="Minimize" class="ion-minus-round"></i>
                <i title="Close" class="ion-close-round"></i>
            </div>
            <div class="clearfix"></div>
        </header>
        <section>
            <form>
                <span class="status-msg"></span>
                <input v-model="newTask.name" placeholder="Name" type="text" class="form-control first">
                <input v-model="newTask.weight" placeholder="Weight" type="number" class="form-control first">
                <select v-model="newTask.state" class="form-control">
                    <option selected>backlog</option>
                    <option>progress</option>
                    <option>testing</option>
                    <option>complete</option>
                </select>
            </form>
        </section>
        <footer>
            <a v-on:click="createProject(true)" href="" class="btn btn-primary pull-right">Save</a>
            <div class="clearfix"></div>
        </footer>
    </div>

    <script> megaMenuInit(); </script>
</div>

<script src="{{ asset('assets/js/controllers/project.js') }}"></script>

@stop()



