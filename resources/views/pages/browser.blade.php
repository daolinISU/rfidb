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
                    <div class="col-sm-3">
                        {!! Form::checkbox('table[]', $table, false) !!}
                        {!! Form::label($table) !!}
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
