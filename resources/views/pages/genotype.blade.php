@extends('app')

@section('content')
    <h2>
        Getting Genotyping Table from RFIDB database

    </h2>

    <style>
        table, th, td {
            border: 1px solid black;
            font-weight: normal;
        }
    </style>


    <table style="width:100%">
        <caption style="font-weight: bold">Genotyping info</caption>
        <tr>
            <th style="font-weight: bold">IDPIG</th>
            <th style="font-weight: bold">DATASET</th>
            <th style="font-weight: bold">SAMPLE_ID</th>
        </tr>

        @foreach ($genotyped as $record)
            <tr>
                <th>{{ $record->idpig }}</th>
                <th>{{ $record->dataset }}</th>
                <th>{{ $record->sample_id }}</th>
            </tr>
        @endforeach
    </table>


@endsection
