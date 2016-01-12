@extends('app')

@section('content')

    <div class="well text-center">
        <h2>Residual Feed Intake Database Advanced Search</h2>
    </div>

    <div class="well">
        <p>Advanced search will take MySQL script and then query the database. You may use this if:</p>
        <ol>
            <li>Familiar with the design and architecture of RFI database.</li>
            <li>Have some knowledge about database query language.</li>
            <li>Have very specific requirements that can not be done by basic search.</li>
        </ol>
    </div>

    <div class="well">
        {!! Form::open(array('url' => 'advancedSearch')) !!}


    <div class="form-group">
        <div><h3>MySQL script</h3></div>
        <br>
        {!! Form::textarea('sqlScript',null,
            array('required'=>'required',
                    'class' => 'form-control',
                    'placeholder' => 'write down your sql script strats from \'SELECT\''
                   )
            )
        !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit',array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}
    </div>
@endsection