@extends('app')

@section('content')

    <div class="well text-center">
        <h2>Residual Feed Intake Database Advanced Search</h2>
    </div>

    <div class="well">
        <p>Advanced search will take MySQL script and then query the database. You may use this if:</p>
        <ol>
            <li>Familiar with the design and architecture of RFI database.
                To see what is in this database, click
                <a href="/tables"
                   onclick="window.open('/tables', 'Popup', 'resizable=1,scrollbars=yes,width=1000,height=800'); return false;" >
                    here
                </a>.
            </li>
            <li>Have some knowledge about database query language.</li>
            <li>Have very specific requirements that can not be done by basic search. </li>
            <li>SQL is a standard language for accessing databases.
                There are a lot of resouces on internet, most of them are free.
                Here is one of them. <a href="http://www.w3schools.com/sql/">http://www.w3schools.com/sql/</a></li>
            <li>We also have some common query in <a href="/faq">FAQ</a>.</li>
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