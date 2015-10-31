
@extends('app')

@section('content')

    {{--<style>
        table {
            table-layout: auto;
            border-collapse: collapse;
            width: 100%;
        }
        table td {
            border: 1px solid #ccc;
        }
        table td.absorbing-column {
            width: 50%;
        }
    </style>--}}


    <h1>Query Results</h1>
    <?PHP
        $keys = array_keys(get_object_vars($results[0]));
        echo "<table class=\"table table-bordered table-condensed\"><tr><th>No.</th><th>".implode("</th><th>", $keys)."</th></tr>";
        $i = 1;
    ?>

        @foreach ($results as $result)
            <tr>
                <td>
                    {{$i}}
                </td>
                @foreach ($keys as $key)
                    <td>
                        {{$result->$key}}
                    </td>
                @endforeach
                <?php ++$i; ?>
            </tr>
        @endforeach
    </table>
@endsection