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
            <a v-on:click="inviteUser(project.id)" href="" class="btn btn-primary pull-right">Send Invite</a>
            <div class="clearfix"></div>
        </footer>
    </div>
    <div class="col-xs-12 col-md-6">
        <h3>Members</h3>
        <hr>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td><a href="">@{{ owner.full_name }}</a></td>
            </tr>
            <tr v-for="member in members ">
                <td>@{{ $index + 2 }}</td>
                <td><a href="">@{{ member.full_name }}</a></td>
            </tr>

            {{--<tr v-for="project in projects">--}}
                {{--<td>@{{ $index + 1 }}</td>--}}
                {{--<td><a href="/projects/@{{ project.id }}">@{{ project.name }}</a></td>--}}
                {{--<td>--}}
                    {{--<div class="progress">--}}
                        {{--<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:@{{ project.completedWeight / project.totalWeight * 100 }}%;">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</td>--}}
            {{--</tr>--}}
            </tbody>
        </table>
    </div>
</div>