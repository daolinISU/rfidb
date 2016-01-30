@extends('app')

@section('content')
    <div class="well">
        <h2>Tables in RFI database and their description</h2>
    </div>
    <div class="well">
        <h2>Table name: id</h2>
        <p>Description of table</p>
        <div class="bs-example">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Attribute name</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>name</td>
                    <td>blabla</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="well">
        <h2>Table name: id</h2>
        <p>Description of table</p>
        <div class="bs-example">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="col-sm-4">Attribute name</th>
                    <th class="col-sm-8">Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>name</td>
                    <td>blabla</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

