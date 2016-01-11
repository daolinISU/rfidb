@extends('app')

@section('content')
    <div class="well text-center">
        <h2>Browse Residual Feed Intake Database</h2>
    </div>
    <div class="well">
        <h3>Select which database you would like to search:</h3>

        <p>lps includes 3 tables: lps_rfi, lps_inventory and lps_rnaseq. The rest tables are in the other database.</p>

        <p>for help with tables and attributes description, click <a href="/pdf">here</a></p>
        {!! Form::open(array('url' => 'database'))!!}
        <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    {!! Form::select('database', array($data[0] => $data[0], $data[1] => $data[1])) !!}
                    {{--                    {!! Form::select('database', array($data[0] => $data[0], $data[1] => $data[1], '{{ $data[0] }}') !!}--}}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('NEXT',array('class' => 'btn btn-primary')) !!}
        </div>

        {!! Form::close() !!}
    </div>



@endsection
