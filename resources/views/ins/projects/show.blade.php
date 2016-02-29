@extends('templates/ins/master')

@section('content')

<div id="project">
    <div class="row" xmlns:v-on="http://www.w3.org/1999/xhtml" xmlns:v-on="http://www.w3.org/1999/xhtml">
        <div class="col-xs-12 page-title-section">
            <h1 class="pull-left">@{{ project.name }}</h1>

            <div class="clearfix"></div>
            <p class="dim">Progress</p>
            <div class="col-xs-11 no-padding-left">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70"
                         aria-valuemin="0" aria-valuemax="100" style="width:70%">
                        <span class="sr-only">70% Complete</span>
                    </div>
                </div>
            </div>
            <div class="col-xs-1 no-margin-right">
                <div class="pull-right"><span class="weight">w.10</span></div>
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
                                        <li class="priority-a">
                                            <div>
                                                <div class="pull-left">w.30</div>
                                                <div class="show-on-hover pull-right">
                                                    <span class="ion-close-round"></span>
                                                    <span class="ion-edit"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div>
                                                <h5>Task Name</h5>
                                            </div>
                                        </li>
                                        <li class="priority-b">
                                            <div>
                                                <div class="pull-left">w.30</div>
                                                <div class="show-on-hover pull-right">
                                                    <span class="ion-close-round"></span>
                                                    <span class="ion-edit"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div>
                                                <h5>Task Name</h5>
                                            </div>
                                        </li>
                                        <li class="priority-c">
                                            <div>
                                                <div class="pull-left">w.30</div>
                                                <div class="show-on-hover pull-right">
                                                    <span class="ion-close-round"></span>
                                                    <span class="ion-edit"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div>
                                                <h5>Task Name</h5>
                                            </div>
                                        </li>
                                        <li class="priority-d">
                                            <div>
                                                <div class="pull-left">w.30</div>
                                                <div class="show-on-hover pull-right">
                                                    <span class="ion-close-round"></span>
                                                    <span class="ion-edit"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div>
                                                <h5>Task Name</h5>
                                            </div>
                                        </li>
                                        <li class="priority-e">
                                            <div>
                                                <div class="pull-left">w.30</div>
                                                <div class="show-on-hover pull-right">
                                                    <span class="ion-close-round"></span>
                                                    <span class="ion-edit"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div>
                                                <h5>Task Name</h5>
                                            </div>
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

    <div style="z-index: 20" class="popup-form new-task">
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
                <div class="col-xs-12 no-side-padding">
                    <input v-model="newTask.name" placeholder="Name" type="text" class="form-control first">
                </div>
                <div class="col-xs-4 no-side-padding">
                    <select v-model="newTask.weight" class="form-control">
                        <option selected>Weight</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                </div>
                <div class="col-xs-4">
                    <select v-model="newTask.priority" class="form-control">
                        <option selected>Priority</option>
                        <option>Low Priority</option>
                        <option>Normal Priority</option>
                        <option>Medium Priority</option>
                        <option>High Priority</option>
                        <option>Highest Priority</option>
                    </select>
                </div>
                <div class="col-xs-4 no-side-padding">
                    <select v-model="newTask.state" class="form-control">
                        <option selected>backlog</option>
                        <option>progress</option>
                        <option>testing</option>
                        <option>complete</option>
                    </select>
                </div>
            </form>
        </section>
        <footer>
            <a v-on:click="createProject(client_id)" href="" class="btn btn-primary pull-right">Save</a>
            <div class="clearfix"></div>
        </footer>
    </div>

    <script> megaMenuInit(); </script>
</div>

<script src="{{ asset('assets/js/controllers/project.js') }}"></script>

@stop()



