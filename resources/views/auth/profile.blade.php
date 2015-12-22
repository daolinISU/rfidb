@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Account information</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="/auth/{{$user->id}}/edit">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="first_name"
                                           value="{{ $user->first_name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="last_name"
                                           value="{{ $user->last_name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                            </div>

                            {{--<div class="form-group">--}}
                            {{--<label class="col-md-4 control-label">New Password</label>--}}
                            {{--<div class="col-md-6">--}}
                            {{--<input type="password" class="form-control" name="password">--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Organization</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="organization"
                                           value="{{ $user->organization }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Reason for applying</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="reason" value="{{ $user->reason }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="/auth/{{$user->id}}/resetPass">
                                        <button class="btn btn-primary">Reset password</button>
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
