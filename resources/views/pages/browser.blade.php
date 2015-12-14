@extends('app')

@section('content')
    <div class="well text-center">
        <h2>Browse Residual Feed Intake Database</h2>
    </div>
    <div class="well">
        <h3>Select tables:</h3>
        {!! Form::open(array('url' => 'browseTable'))!!}
        <div class="form-group">
            @foreach ($tables as $table)
                <?PHP if (($table->Tables_in_rfidb) === "users"
                        || ($table->Tables_in_rfidb) === "password_resets"
                        || ($table->Tables_in_rfidb) === "migrations"
                )
                    continue;
                ?>
                    {!! Form::checkbox('table[]', $table->Tables_in_rfidb, false) !!}
                    {!! Form::label($table->Tables_in_rfidb) !!}
                    <br>

            @endforeach
        </div>
        <div class="form-group">
            {!! Form::submit('NEXT',array('class' => 'btn btn-primary')) !!}
        </div>

        {!! Form::close() !!}
    </div>



@endsection
