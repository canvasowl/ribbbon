<div class="row ">
    <div class="col-xs-12 col-md-6">
        <section>
            <form>
                <span v-if="msg.success != null" class="status-msg success-msg">@{{ msg.success }}</span>
                <span v-if="msg.error != null" class="status-msg error-msg">@{{ msg.error }}</span>
                <div class="form-group">
                    <label>Email:</label>
                    <input v-model="invited.email" type="text" class="form-control first">
                </div>
                <br>
            </form>
        </section>
        <footer>
            <a v-on:click="inviteUser(project.id)" class="btn btn-primary pull-right">Send Invite</a>
            <div class="clearfix"></div>
        </footer>
    </div>
    <div class="col-xs-12 col-md-6">
        <label>Members</label>
        <hr>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>@{{ owner.full_name }}</td>
                <td><i class="ion-flag"></i></td>
            </tr>
            <tr v-for="member in members ">
                <td>@{{ $index + 2 }}</td>
                <td><a href="">@{{ member.full_name }}</a></td>
                <td style="font-size: 1.5em">
                    <a title="Delete" v-on:click="removeMember(project.id, member)"><i class="ion-ios-close-outline"></i></a>
                </td>
            </tr>
            </tbody>
        </table>
        <p></p>
    </div>
</div>