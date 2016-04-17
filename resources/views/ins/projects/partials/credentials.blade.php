<form class="credential-form new-credential">
    <span v-if="msg.success != null" class="status-msg success-msg">@{{ msg.success }}</span>
    <span v-if="msg.error != null" class="status-msg error-msg">@{{ msg.error }}</span>
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
                <label class="pull-left">@{{ credential.name }}</label>
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