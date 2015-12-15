@extends('app')

@section('content')
    <script src="js/excellentexport.js"></script>
    <br/>
    <?PHP
    if (count($results) == 0) {
        echo("<h2>No record matches your query.</h2>");
        die();
    } ?>

    <h1>Query Results</h1>
    <br/>
    <a download="queryResults.xls" href="#" onclick="return ExcellentExport.excel(this, 'datatable', 'Query Results');">
        <button type="button" class="btn btn-info">Export to Excel</button>
    </a>
    <a download="queryResults.csv" href="#" onclick="return ExcellentExport.csv(this, 'datatable');">
        <button type="button" class="btn btn-info">Export to CSV</button>
    </a>
    <br/><br/>

    <?PHP
    $keys = array_keys(get_object_vars($results[0]));
    echo "<table id=\"datatable\" class=\"table table-bordered table-condensed\"><tr><th>No.</th><th>" . implode("</th><th>", $keys) . "</th></tr>";
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