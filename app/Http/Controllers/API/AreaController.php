<?php

namespace App\Http\Controllers\API;

//use App\Http\Requests\AreaPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Area;
//use Validator;
//use Carbon\Carbon;

class AreaController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index','mobile']]);
    }

    public function mobile()
    {
        $areas = Area::all();

        return $this->sendResponse($areas->toArray(), 'Areas retrieved successfully.');
    }

    public function index()
    {
        //$areas = Area::all();

        $areas = DB::table('areas')
                ->select('areas.AreaId','areas.AreaName','areas.AreaPhone', DB::raw('COUNT(*) as AreaTotal'))
                ->join('brnzones', 'areas.AreaId', '=', 'brnzones.AreaId')    
                ->groupBy('areas.AreaId','areas.AreaName','areas.AreaPhone')
                ->get();
        return $areas;

        //return $this->sendResponse($areas->toArray(), 'Areas retrieved successfully.');
    }

    public function show($AreaId)
    {
        $product = Area::find($AreaId);


        if (is_null($product)) {
            return $this->sendError('Area not found.');
        }


        return $this->sendResponse($product->toArray(), 'Get AreaId '.$AreaId.' successfully.');
    }    

    public function store(AreaPost $request)
    {

    }

    public function getUpdate(Request $request)
    {

    }

    public function getDelete($AreaId)
    {

    }
    
}                