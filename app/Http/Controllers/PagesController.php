<?php

namespace App\Http\Controllers;

use App\Carcass;
use App\Genotyping;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Schema;

class PagesController extends Controller
{


    public function genotyping()
    {
        $query = DB::table('genotyping');
        $results = $query->get();
        return view('pages.queryResults', compact('results'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function carcass()
    {
        $query = DB::table('carcass');
        $results = $query->get();
        return view('pages.queryResults', compact('results'));
    }

    public function carcassForm()
    {
        return view('pages.carcassForm');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function carcassQuery()
    {

        //        $tblName = 'carcass';
        //        $columns = Schema::getColumnListing($tblName);
        //
        //        dd($columns);


        $idpig_op = $_POST["idpig_op"];
        $idpig = $_POST["idpig"];
        $slaughter_date_op = $_POST["slaughter_date_op"];
        $slaughter_date = $_POST["slaughter_date"];
        $weight_op = $_POST["weight_op"];
        $weight = $_POST["weight"];
        $length_op = $_POST["length_op"];
        $length = $_POST["length"];
        $bf_10_op = $_POST["bf_10_op"];
        $bf_10 = $_POST["bf_10"];
        $bf_last_rib_op = $_POST["bf_last_rib_op"];
        $bf_last_rib = $_POST["bf_last_rib"];
        $bf_last_lum_op = $_POST["bf_last_lum_op"];
        $bf_last_lum = $_POST["bf_last_lum"];


        $query = DB::table('carcass');

        //        if (Input::has('idpig'))
        //            dd('sucess');

        if ($idpig != null && $idpig_op != null)
            $query->where('idpig', $idpig_op, $idpig);

        if ($slaughter_date_op != null && $slaughter_date != null)
            $query->where('slaughter_date', $slaughter_date_op, $slaughter_date);

        if ($weight_op != null && $weight != null)
            $query->where('weight', $weight_op, $weight);

        if ($length_op != null && $length != null)
            $query->where('length', $length_op, $length);

        if ($bf_10_op != null && $bf_10 != null)
            $query->where('bf_10', $bf_10_op, $bf_10);

        if ($bf_last_rib != null && $bf_last_rib_op != null)
            $query->where('bf_last_rib', $bf_last_rib_op, $bf_last_rib);

        if ($bf_last_lum != null && $bf_last_lum_op != null)
            $query->where('bf_last_lum', $bf_last_lum_op, $bf_last_lum);


        $results = $query->get();
        return view('pages.queryResults', compact('results'));
    }


    public function index()
    {
        return view('welcome');
    }

    public function advanceQueryForm()
    {
        return view('pages.advanceQueryForm');
    }

    public function queryResults(Request $resuest)
    {
        //gell all input name and value except token
        $inputs = $resuest->except("_token");
//        dd($inputs["logic"][0]);
//        dd($inputs);
        $table_list = ($inputs["table_list"]);
        //put table names in an array
        $tables = preg_split('/[\ \,]+/', $table_list);

        $query = DB::table($tables[0]);
        //inner join tables
        for ($i = 1; $i < count($tables); ++$i)
        {
            $query->join($tables[$i], $tables[0].".idpig", "=", $tables[$i].".idpig");
        }
        //Select attribute list
        if ($inputs["attribute_list"] != null)
        {
            $query->selectRaw($inputs["attribute_list"]);
        }
        //add where clause
        for ($i = 0; $i < count($inputs["expr"]); ++$i)
        {
            $logic = strtolower(preg_replace('/\s+/', '', $inputs["logic"][$i]));
            //dd($logic);
            if ($logic === "and")
            {
                $query ->whereRaw($inputs["expr"][$i]);
            } elseif ($logic === "or")
            {
                $query ->orWhereRaw($inputs["expr"][$i]);
            }
        }
        $results = $query->get();
        return view('pages.queryResults', compact('results'));
    }

}
