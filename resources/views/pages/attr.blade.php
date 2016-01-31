@extends('app')

@section('content')
    <script src="js/script.js"></script>
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
    <?php $example = ""; $exampleGot = false;?>
    <div class="well">
        {!! Form::open(array('url' => 'browseResult'))!!}
        <h3>Select attributes you would like to include: </h3>
        @foreach($keys as $key)
            <div class="form-group">
                <div class="row">
                    <h4>Attributes in Table {{$key}}</h4>
                    <p>{!! Form::checkbox('selectAll', null, false ,array('onClick'=> 'toggle(this,\''.$key.'\')')) !!}
                    <label>select all in this table</label></p>
                    @foreach($data[$key] as $attr)
                        <div class="col-sm-4">
                            {{-- //add id field for select all
                            {!! Form::checkbox('attr[]', $key.'.'.$attr, false) !!}--}}
                            {!! Form::checkbox('attr[]', $key.'.'.$attr, false ,array('class'=>$key)) !!}
{{--                            {!! Form::label($key.'.'.$attr) !!} //this lable auto formats text --}}
                            <label>{{$key}}.{{$attr}}</label>
                            <?php if (!$exampleGot) {
                                $example = $key.".".$attr;
                                $exampleGot = true;
                            }
                                ?>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="form-group">
            <div><h3>Filters</h3>{!! Form::checkbox('filter', 'yes') !!}
                {!! Form::label('check this box if you want to apply filters') !!}</div>
<p> Expression should be: attribute operator value. for example: <b>{{$example}} >= 200</b> </p>

            <table id="conTable" class="form" border="0">
                <tbody>
                <tr>
                    <td >
                        {!! Form::label('name', 'Logic') !!}<br>
                        {!! Form::input('text', 'logic[]', null,
                                            array(
                                                    'class' => 'form-control',
                                                    'placeholder'=>'input \'AND\', \'OR\'')) !!}
                    </td>
                    <td >
                        {!! Form::label('name', 'Expression') !!}<br>
                        {!! Form::input('text', 'expr[]', null, array( 'class' => 'form-control')) !!}
                    </td>
                    <td >

                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <table id="buttonTable" class="form" border="0">
                <tbody>
                    <tr>
                        <td >
                            <input type="button" class="btn btn-default" value="Add Condition"
                                   onClick="addRow('conTable')"/>
                        </td>
                        <td >
                            &nbsp<input type="button" class="btn btn-default" value="Remove Condition"
                                   onClick="deleteRow('conTable')"/>
                        </td>
                        <td>

                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="form-group">
            {!! Form::submit('Submit',array('class' => 'btn btn-primary')) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection
