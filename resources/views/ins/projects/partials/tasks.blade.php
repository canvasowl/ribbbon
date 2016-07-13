<div class="row task-list-row">
    <div class="col-xs-12 col-md-4">
        <ul class="task-list">
            <h5 class="title">In Progress (@{{ numProgressTasks }})</h5>
            <li v-on:click="editMode(task)" v-for="task in project.tasks | filterBy 'progress' in 'state' " class="task-@{{ task.id }}" >
                <div>
                    <div class="pull-left">w.@{{ task.weight }}</div>
                    <div class="show-on-hover pull-right">
                        <span v-on:click="deleteTask(task.id, $index)" class="ion-close-round"></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div>
                    <h5>@{{ task.name }}</h5>
                    <span class="priority-circle priority-@{{ task.priority }}"></span>
                    <span v-if="task.description.length != 0" class="ion-android-textsms"></span>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-xs-12 col-md-4">
        <ul class="task-list">
            <h5 class="title">Testing (@{{ numTestingTasks }})</h5>
            <li v-on:click="editMode(task)" v-for="task in project.tasks | filterBy 'testing' in 'state' " class="task-@{{ task.id }}" >
                <div>
                    <div class="pull-left">w.@{{ task.weight }}</div>
                    <div class="show-on-hover pull-right">
                        <span v-on:click="deleteTask(task.id, $index)" class="ion-close-round"></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div>
                    <h5>@{{ task.name }}</h5>
                    <span class="priority-circle priority-@{{ task.priority }}"></span>
                    <span v-if="task.description.length != 0" class="ion-android-textsms"></span>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-xs-12 col-md-4">
        <ul class="task-list">
            <h5 class="title">Completed (@{{ numCompleteTasks }})</h5>
            <li v-on:click="editMode(task)" v-for="task in project.tasks | filterBy 'complete' in 'state' " class="task-@{{ task.id }}" >
                <div>
                    <div class="pull-left">w.@{{ task.weight }}</div>
                    <div class="show-on-hover pull-right">
                        <span v-on:click="deleteTask(task.id, $index)" class="ion-close-round"></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div>
                    <h5>@{{ task.name }}</h5>
                    <span class="priority-circle priority-@{{ task.priority }}"></span>
                    <span v-if="task.description.length != 0" class="ion-android-textsms"></span>
                </div>
            </li>
        </ul>
    </div>
</div>