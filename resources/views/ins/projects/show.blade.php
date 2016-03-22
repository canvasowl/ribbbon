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
                                        <li v-on:click="editMode(task)" v-for="task in project.tasks | filterBy 'progress' in 'state' " class="priority-@{{ task.priority }} task-@{{ task.id }}" >
                                            <div>
                                                <div class="pull-left">w.@{{ task.weight }}</div>
                                                <div class="show-on-hover pull-right">
                                                    <span v-on:click="deleteTask(task.id, $index)" class="ion-close-round"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div>
                                                <h5>@{{ task.name }}</h5>
                                                <span v-if="task.description.length != 0" class="ion-android-textsms"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <ul class="task-list">
                                        <h5 class="title">Testing (10)</h5>
                                        <li v-on:click="editMode(task)" v-for="task in project.tasks | filterBy 'testing' in 'state' " class="priority-@{{ task.priority }} task-@{{ task.id }}" >
                                            <div>
                                                <div class="pull-left">w.@{{ task.weight }}</div>
                                                <div class="show-on-hover pull-right">
                                                    <span v-on:click="deleteTask(task.id, $index)" class="ion-close-round"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div>
                                                <h5>@{{ task.name }}</h5>
                                                <span v-if="task.description.length != 0" class="ion-android-textsms"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <ul class="task-list">
                                        <h5 class="title">Completed (10)</h5>
                                        <li v-on:click="editMode(task)" v-for="task in project.tasks | filterBy 'complete' in 'state' " class="priority-@{{ task.priority }} task-@{{ task.id }}" >
                                            <div>
                                                <div class="pull-left">w.@{{ task.weight }}</div>
                                                <div class="show-on-hover pull-right">
                                                    <span v-on:click="deleteTask(task.id, $index)" class="ion-close-round"></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div>
                                                <h5>@{{ task.name }}</h5>
                                                <span v-if="task.description.length != 0" class="ion-android-textsms"></span>
                                            </div>
                                        </li>
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
                    <label>Weight:</label>
                    <select v-model="newTask.weight" class="form-control">
                        <option selected>1</option>
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
                    <label>Priority:</label>
                    <select v-model="newTask.priority" class="form-control">
                        <option>low</option>
                        <option selected>normal</option>
                        <option>medium</option>
                        <option>high</option>
                        <option>highest</option>
                    </select>
                </div>
                <div class="col-xs-4 no-side-padding">
                    <label>State:</label>
                    <select v-model="newTask.state" class="form-control">
                        <option>backlog</option>
                        <option selected>progress</option>
                        <option>testing</option>
                        <option>complete</option>
                    </select>
                </div>
                <textarea v-model="newTask.description" rows="5" class="form-control" placeholder="Description..."></textarea>
                <br>
                <span class="count pull-right">@{{ 250 - newTask.description.length }}</span>
            </form>
        </section>
        <footer>
            <a v-on:click="createTask(project.client_id, project.id)" href="" class="btn btn-primary pull-right">Save</a>
            <div class="clearfix"></div>
        </footer>
    </div>
    <div style="z-index: 20" class="popup-form update-task">
        <header>
            <p class="pull-left">Update Task</p>
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
                    <input v-model="currentTask.name" placeholder="Name" type="text" class="form-control first">
                </div>
                <div class="col-xs-4 no-side-padding">
                    <label>Weight:</label>
                    <select v-model="currentTask.weight" class="form-control">
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
                    <label>Priority:</label>
                    <select v-model="currentTask.priority" class="form-control">
                        <option>low</option>
                        <option>normal</option>
                        <option>medium</option>
                        <option>high</option>
                        <option>highest</option>
                    </select>
                </div>
                <div class="col-xs-4 no-side-padding">
                    <label>State:</label>
                    <select v-model="currentTask.state" class="form-control">
                        <option>backlog</option>
                        <option selected>progress</option>
                        <option>testing</option>
                        <option>complete</option>
                    </select>
                </div>
                <textarea v-model="currentTask.description" rows="5" class="form-control" placeholder="Description..."></textarea>
                <br>
                <span class="count pull-right">@{{ 250 - currentTask.description.length }}</span>
            </form>
        </section>
        <footer>
            <a v-on:click="updateTask(currentTask.id)" href="" class="btn btn-primary pull-right">Update</a>
            <div class="clearfix"></div>
        </footer>
    </div>

    <script> megaMenuInit(); </script>
</div>

<script src="{{ asset('assets/js/controllers/project.js') }}"></script>

@stop()



