@extends('templates/ins/master')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h1>Admin</h1>
            <p>Number of users: <span class="badge">{{ $n  }}</span></p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop()