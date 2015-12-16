@extends('app')

@section('content')

    <div class="col-lg-10 col-lg-offset-1">

        <h1><i class="fa fa-users"></i> User Administration <a href="/auth/logout" class="btn btn-default pull-right">Logout</a>
        </h1>
        <br>
        <a href="/user/create" class="btn btn-success">Add User</a>
        <br><br>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Organization</th>
                    <th>Status</th>
                    {{--<th>Apply Reason</th>
                    <th>Date/Time Added</th>
                    <th>Date/Time Updated</th>--}}
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->first_name." ".$user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->organization }}</td>
                        <td><?php
                            if ($user->status == 1)
                                echo "active";
                            else
                                echo "inactive";
                            ?>

                        </td>
                        <td>
                            <a href="/user/{{ $user->id }}/edit" class="btn btn-info pull-left"
                               style="margin-right: 3px;">Edit</a>

                            <form method="POST" action="/user/{{ $user->id }}/delete">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input type="hidden" name="_method" value="DELETE"/>
                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete the user: {{ $user->first_name." ".$user->last_name }}? The deletion is permanent.')">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>


@endsection
