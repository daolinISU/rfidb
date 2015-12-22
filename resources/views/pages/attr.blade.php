@extends('app')

@section('content')
    <div class="well text-center">
        <h2>Browse Residual Feed Intake Database</h2>
    </div>
    <div class="well">
        <h3>Tables selected:</h3>
        <?PHP $keys = array_keys($data)?>
        <p>You have selected <?PHP echo count($keys) ?> tables.</p>

        <p><b>{{$keys[0]}}
                @for($i = 1; $i < count($keys); $i++)
                    ,{{$keys[$i]}}
                @endfor
            </b>
        </p>

        <p>for help with tables and attributes description, click <a href="/pdf">here</a></p>
    </div>
    <div class="well">
        {!! Form::open(array('url' => 'browseResult'))!!}
        <h3>Select attributes you would like to include: </h3>
        @foreach($keys as $key)
            <div class="form-group">
                <div class="row">
                    <h4>Attributes in Table {{$key}}</h4>
                    @foreach($data[$key] as $attr)
                        <div class="col-sm-4">
                            {!! Form::checkbox('attr[]', $key.'.'.$attr, false) !!}
                            {!! Form::label($key.'.'.$attr) !!}
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        <div class="form-group">
            {!! Form::submit('Submit',array('class' => 'btn btn-primary')) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
