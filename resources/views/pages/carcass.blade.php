@extends('app')

@section('content')
    <h2>
        Carcass Table Content

    </h2>
    <style>
        table, th, td {
            border: 1px solid black;
            font-weight: normal;
        }
    </style>


    <table style="width:100%">
        <caption style="font-weight: bold">Carcass info</caption>
        <tr>
            <th style="font-weight: bold">IDPIG</th>
            <th style="font-weight: bold">SLAUGHTER_DATE</th>
            <th style="font-weight: bold">WEIGHT</th>
            <th style="font-weight: bold">LENGTH</th>
            <th style="font-weight: bold">BF_10</th>
            <th style="font-weight: bold">BF_LAST_RIB</th>
            <th style="font-weight: bold">BF_LAST_LUM</th>
        </tr>

        @foreach ($carcass as $record)
            <tr>
                <th>{{ $record->idpig }}</th>
                <th>{{ $record->slaughter_date }}</th>
                <th>{{ $record->weight }}</th>
                <th>{{ $record->length }}</th>
                <th>{{ $record->bf_10 }}</th>
                <th>{{ $record->bf_last_rib }}</th>
                <th>{{ $record->bf_last_lum }}</th>
            </tr>
        @endforeach
    </table>



@endsection
