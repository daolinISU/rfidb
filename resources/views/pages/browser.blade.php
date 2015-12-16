@extends('app')

@section('content')
    <div class="well text-center">
        <h2>Browse Residual Feed Intake Database</h2>
    </div>
    <div class="well">
        <h3>Select tables:</h3>

        <p>for help with tables and attributes description, click <a href="/pdf">here</a></p>
        {!! Form::open(array('url' => 'browseTable'))!!}
        <div class="form-group">
            <div class="row">

                @foreach ($tables as $table)
                    <?PHP if (($table->Tables_in_rfidb) === "users"
                            || ($table->Tables_in_rfidb) === "password_resets"
                            || ($table->Tables_in_rfidb) === "migrations"
                    )
                        continue;
                    ?>
                    <div class="col-sm-3">
                        {!! Form::checkbox('table[]', $table->Tables_in_rfidb, false) !!}
                        {!! Form::label($table->Tables_in_rfidb) !!}
                    </div>

                @endforeach
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('NEXT',array('class' => 'btn btn-primary')) !!}
        </div>

        {!! Form::close() !!}
    </div>



@endsection
