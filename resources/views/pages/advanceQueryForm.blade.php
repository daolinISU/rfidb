@extends('app')

@section('content')
    <script src="js/script.js"></script>

    <h1 xmlns="http://www.w3.org/1999/html">Advance Query Page</h1>
    <ol>
        <li>This query will query whole database, 22 tables in total.</li>
        <li>You can select any attribute from any table. But you will need to know their names.</li>
        <li>Designate attribute like this (user real name with single quotation mark):</li>
        <p>'table_name'.'attribute'</p>

        <p>If yo would like to select 'idpig' attribute in 'id' table, then it would be: id.idpig</p>
        <li>Example query will be like this:</li>
        <table class="table table-bordered">
            <thead>
            <th>Example</th>
            </thead>
            <tbody>
            <tr>
                <td>{!! HTML::image('img/queryExample.png', 'query example',array('class' => 'bg-primary')) !!}</td>
            </tr>
            </tbody>
        </table>

    </ol>

    {!! Form::open(array('url' => 'queryResults'))!!}
    <div class="form-group">
        <div><h3>Table list</h3></div><br>
        {!! Form::label('name', 'Tables to query') !!}<br>
        {!! Form::input('text','table_list', null, array('required'=>'required', 'class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        <div><h3>Attribute list</h3></div>
        {!! Form::label('name', 'Show attributes') !!} <br>
        {!! Form::input('text', 'attribute_list', null, array('class' => 'form-control',
                                                            'placeholder'=>'put attributes you wish to include in results')) !!}
    </div>

    <div class="form-group">
        <div><h3>Search criteria</h3></div>


        <table id="conTable" class="form" border="0">
            <tbody>
                <tr>
                    <p>
                        <td>
                            {!! Form::label('name', 'Logic') !!}<br>
                            {!! Form::input('text', 'logic[]', null,
                                                array('required'=>'required',
                                                        'class' => 'form-control',
                                                        'placeholder'=>'input \'AND\', \'OR\'')) !!}
                        </td>
                        <td>
                            {!! Form::label('name', 'Expression') !!}<br>
                            {!! Form::input('text', 'expr[]', null, array('required'=>'required', 'class' => 'form-control')) !!}
                        </td>
                    </p>
                </tr>
            </tbody>
        </table>
        <p>
            <input type="button" class="btn btn-default" value="Add Condition" onClick="addRow('conTable')" />
            <input type="button" class="btn btn-default" value="Remove Condition" onClick="deleteRow('conTable')"  />
        <p>

    </div>

    <div class="form-group">
        {!! Form::submit('Submit',array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}

@endsection