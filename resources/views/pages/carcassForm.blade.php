@extends('app')

@section('content')
    <h1>Carcass Table Query Page</h1>
    <h2>Table query demo</h2>
    <h3>For each attribute, you may use operators like: "=", "!=", ">"</h3>

    {!! Form::open(array('url' => 'carcassQuery'))!!}
    <div class="form-group">
        <div><h3>idpig</h3></div>
        {!! Form::label('name', 'operator') !!}
        {!! Form::input('text', 'idpig_op', null, null) !!}
        {!! Form::label('name', 'value') !!}
        {!! Form::input('text', 'idpig', null, null) !!}
    </div>

    <div class="form-group">
        <div><h3>slaughter_date</h3></div>
        {!! Form::label('name', 'operator') !!}
        {!! Form::input('text', 'slaughter_date_op', null, null) !!}
        {!! Form::label('name', 'value') !!}
        {!! Form::input('text', 'slaughter_date', null, null) !!}
    </div>

    <div class="form-group">
        <div><h3>weight</h3></div>
        {!! Form::label('name', 'operator') !!}
        {!! Form::input('text', 'weight_op', null, null) !!}
        {!! Form::label('name', 'value') !!}
        {!! Form::input('text', 'weight', null, null) !!}
    </div>

    <div class="form-group">
        <div><h3>length</h3></div>
        {!! Form::label('name', 'operator') !!}
        {!! Form::input('text', 'length_op', null, null) !!}
        {!! Form::label('name', 'value') !!}
        {!! Form::input('text', 'length', null, null) !!}
    </div>

    <div class="form-group">
        <div><h3>bf_10</h3></div>
        {!! Form::label('name', 'operator') !!}
        {!! Form::input('text', 'bf_10_op', null, null) !!}
        {!! Form::label('name', 'value') !!}
        {!! Form::input('text', 'bf_10', null, null) !!}
    </div>

    <div class="form-group">
        <div><h3>bf_last_rib</h3></div>
        {!! Form::label('name', 'operator') !!}
        {!! Form::input('text', 'bf_last_rib_op', null, null) !!}
        {!! Form::label('name', 'value') !!}
        {!! Form::input('text', 'bf_last_rib', null, null) !!}
    </div>

    <div class="form-group">
        <div><h3>bf_last_lum</h3></div>
        {!! Form::label('name', 'operator') !!}
        {!! Form::input('text', 'bf_last_lum_op', null, null) !!}
        {!! Form::label('name', 'value') !!}
        {!! Form::input('text', 'bf_last_lum', null, null) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('carcassQuery',array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}

    {{--<th>{{ $record->idpig }}</th>--}}
    {{--<th>{{ $record->slaughter_date }}</th>--}}
    {{--<th>{{ $record->weight }}</th>--}}
    {{--<th>{{ $record->length }}</th>--}}
    {{--<th>{{ $record->bf_10 }}</th>--}}
    {{--<th>{{ $record->bf_last_rib }}</th>--}}
    {{--<th>{{ $record->bf_last_lum }}</th>--}}
@endsection