@extends('app')

@section('content')
    <div class="well text-center">
        <h2>Browse Residual Feed Intake Database</h2>
    </div>
    <div class="well">
        <h3>Tables selected:</h3>
        <?PHP $keys = array_keys($data)?>
        <p>You have selected <?PHP echo count($keys) ?> tables.</p>

        <p>{{$keys[0]}}
            @for($i = 1; $i < count($keys); $i++)
                ,{{$keys[$i]}}
            @endfor
        </p>
    </div>
    <div class="well">
        {!! Form::open(array('url' => 'browseResult'))!!}
        <h3>Select attributes you would like to include: </h3>
        @foreach($keys as $key)
            <div class="form-group">
                <p>Attributes in Table {{$key}}</p>
                @foreach($data[$key] as $attr)
                    {!! Form::checkbox('attr[]', $key.'.'.$attr, false) !!}
                    {!! Form::label($key.'.'.$attr) !!}
                    <br>
                @endforeach
            </div>
        @endforeach
        <div class="form-group">
            {!! Form::submit('Submit',array('class' => 'btn btn-primary')) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection