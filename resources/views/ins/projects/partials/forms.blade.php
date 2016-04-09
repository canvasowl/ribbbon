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

<div style="z-index: 20" class="popup-form update-credential">
    <header>
        <p class="pull-left">Update Credential</p>
        <div class="actions pull-right">
            <i title="Minimize" class="ion-minus-round"></i>
            <i title="Close" class="ion-close-round"></i>
        </div>
        <div class="clearfix"></div>
    </header>
    <section>
        <form>
            <span class="status-msg"></span>
            <div class="form-group">
                <input v-model="currentCredential.name" placeholder="Name" type="text" class="form-control first">
            </div>
            <div class="form-group">
                <input v-model="currentCredential.username" placeholder="Username" type="text" class="form-control">
            </div>
            <div class="form-group">
                <input v-model="currentCredential.password" placeholder="Password" type="text" class="form-control">
            </div>
            <div v-if="currentCredential.type == 1" class="form-group">
                <input v-model="currentCredential.hostname" placeholder="Hostname" type="text" class="form-control">
            </div>
            <div v-if="currentCredential.type == 1" class="form-group">
                <input v-model="currentCredential.port" placeholder="Port" type="text" class="form-control">
            </div>
            <br>
        </form>
    </section>
    <footer>
        <a v-on:click="updateCredential(currentCredential.id)" href="" class="btn btn-primary pull-right">Update</a>
        <div class="clearfix"></div>
    </footer>
</div>