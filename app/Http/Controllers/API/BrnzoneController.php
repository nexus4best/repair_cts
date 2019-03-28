<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
//use App\brnzones;

class brnzoneController extends BaseController
{
    
    public function cts()
    {
        $cts = DB::table('cts')
                ->select('cts.CtsId','cts.CtsName','cts.CtsPhone', DB::raw('COUNT(*) as CtsTotal'))
                ->join('brnzones', 'cts.CtsId', '=', 'brnzones.CtsId')    
                ->groupBy('cts.CtsId','cts.CtsName','cts.CtsPhone')
                ->get();
        return $cts;        
    }   

    public function ctsZone($CtsId)
    {
        $cts = DB::table('brnzones')
                ->join('areas', 'brnzones.areaId', '=', 'areas.areaId')
                ->join('setups', 'brnzones.setupId', '=', 'setups.setupId')
                ->join('branch', 'brnzones.BrnCode', '=', 'branch.BrnCode')
                ->select('brnzones.BrnCode', 'branch.BrnName', 'branch.BrnTel', 'areas.areaName', 'setups.setupName')
                ->where('brnzones.CtsId', $CtsId)
                ->get();

        return $cts;

    }    

    public function area()
    {
        $area = DB::table('areas')
                ->select('areas.areaId','areas.areaName','areas.areaPhone', DB::raw('COUNT(*) as areaTotal'))
                ->join('brnzones', 'areas.areaId', '=', 'brnzones.areaId')    
                ->groupBy('areas.areaId','areas.areaName','areas.areaPhone')
                ->get();
        return $area;        
    }     

    public function areaZone($areaId)
    {
        $area = DB::table('brnzones')
                ->join('cts', 'brnzones.CtsId', '=', 'cts.CtsId')
                ->join('setups', 'brnzones.setupId', '=', 'setups.setupId')
                ->join('branch', 'brnzones.BrnCode', '=', 'branch.BrnCode')
                ->select('brnzones.BrnCode', 'branch.BrnName', 'branch.BrnTel', 'cts.CtsName', 'setups.setupName')
                ->where('brnzones.areaId', $areaId)
                ->get();

        return $area;

    }     

    public function setup()
    {
        $setup = DB::table('setups')
                ->select('setups.setupId','setups.setupName','setups.setupPhone', DB::raw('COUNT(*) as setupTotal'))
                ->join('brnzones', 'setups.setupId', '=', 'brnzones.setupId')    
                ->groupBy('setups.setupId','setups.setupName','setups.setupPhone')
                ->get();
        return $setup;        
    } 
    
    public function setupZone($setupId)
    {
        $setup = DB::table('brnzones')
                ->join('areas', 'brnzones.areaId', '=', 'areas.areaId')
                ->join('cts', 'brnzones.CtsId', '=', 'cts.CtsId')
                ->join('branch', 'brnzones.BrnCode', '=', 'branch.BrnCode')
                ->select('brnzones.BrnCode', 'branch.BrnName', 'branch.BrnTel' ,'areas.areaName', 'cts.CtsName')
                ->where('brnzones.SetupId', $setupId)
                ->get();

        return $setup;

    } 
    
}                