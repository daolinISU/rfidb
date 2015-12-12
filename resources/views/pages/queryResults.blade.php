
@extends('app')

@section('content')
    <script src="js/excellentexport.js"></script>
    <br/>


    <h1>Query Results</h1>
    <a download="queryResults.xls" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Query Results');">Export to Excel</a>
    <br/>
    <a download="queryResults.csv" href="#" onclick="return ExcellentExport.csv(this, 'datatable');">Export to CSV</a>
    <br/>

    <?PHP
        $keys = array_keys(get_object_vars($results[0]));
        echo "<table id=\"datatable\" class=\"table table-bordered table-condensed\"><tr><th>No.</th><th>".implode("</th><th>", $keys)."</th></tr>";
        $i = 1;
    ?>
        @foreach ($results as $result)
            <tr>
                <td>{{$i}}</td>
                @foreach ($keys as $key)
                    <td>{{$result->$key}}</td>
                @endforeach
                <?php ++$i; ?>
            </tr>
        @endforeach
    </table>
@endsection