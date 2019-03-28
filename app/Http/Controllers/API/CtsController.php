<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CtsController extends Controller
{
    // public function indexCount() 
    // {
    //     $cts = DB::table('cts')
    //             ->select('cts.CtsId','cts.CtsName','cts.CtsPhone', DB::raw('COUNT(*) as CtsTotal'))
    //             ->join('brnzone', 'cts.CtsId', '=', 'brnzone.CtsId')    
    //             ->groupBy('cts.CtsId','cts.CtsName','cts.CtsPhone')
    //             ->get();
    //     return $cts;
    // }

    public function index()
    {
        $cts = DB::table('cts')->get();
        $response = [
            'getCts' => $cts
        ];
        //return $cts;
        return response()->json($response);
    }

    public function indexArea()
    {
        $cts = DB::table('area')->get();
        $response = [
            'getArea' => $cts
        ];
        //return $cts;
        return response()->json($response);
    }    

    public function indexZone()
    {
        $cts = DB::table('brnzones')->get();
        // $cts = DB::table('brnzone')
        //         ->join('area', 'brnzone.AreaId', '=', 'area.AreaId')
        //         ->join('setup', 'brnzone.SetupId', '=', 'setup.SetupId')
        //         ->join('cts', 'brnzone.CtsId', '=', 'cts.CtsId')
        //         ->join('branch', 'brnzone.BrnCode', '=', 'branch.BrnCode')
        //         ->select('brnzone.BrnCode', 'branch.BrnName', 'brnzone.CtsId', 'brnzone.SetupId', 'brnzone.AreaId')
        //         ->where('brnzone.CtsId', $CtsId)
        //         ->get();

        $response = [
            'getZone' => $cts
        ];
        //return $cts;
        return response()->json($response);
    }      

}
