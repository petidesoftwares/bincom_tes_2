<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Announced_pu_results;
use App\Models\Polling_unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class AnnouncedPollingUnitResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([Polling_unit::all()]);
    }

    public function getStatePullingUnits($id){
        return response()->json([]);
    }

    public function pullingUnitResult($id){
        $result = Announced_pu_results::where('polling_unit_uniqueid',$id)->get();
        return response()->json(['result'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pollUnitNumber = $request->input("unitNumber");
        $agentName = $request->input('agentName');
        $dataKeys = $request->get("dataKey");
        $result = $request->get("result");
        $validate =Validator::make([
            'unitNumber'=>'required|unique',
            'agentName'=>'required'
        ],[
            'unitNumber.required'=>'Polling unit number cannot be empty',
            'unitNumber.unique'=>'Another polling Unit already have that number',
            'agentName.requred'=>'Agent name cannot be empty'
        ]);
        $validate->validate();

        //get polling unit uniqueid
        $unitUniqueID = Polling_unit::where('polling_unit_number',$pollUnitNumber)->get('uniqueid');
        for ($i=0; $i<count($dataKeys);$i++){
            $date = Carbon::now();
            $storageData =['polling_unit_uniqueid'=>$unitUniqueID->uniqueid,
                'entered_by_user'=>$agentName,
                'party_abbreviation'=>$dataKeys[$i],
                'party_score'=>$result[$i],
                'date_entered'=>$date->toDateTimeString(),
                'user_ip_address'=>$request->getClientIp()
            ];

            Announced_pu_results::create($storageData);
        }
        return response()->json(['message'=>'Result uploaded successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
