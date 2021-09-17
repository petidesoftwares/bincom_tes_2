<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Announced_lga_results;
use App\Models\Announced_pu_results;
use App\Models\Party;
use App\Models\Polling_unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnouncedLgaResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['lga-result'=>Announced_lga_results::all()]);
    }

    public function sumTotalLgaResult($id){
        $sum = DB::table('announced_lga_results')->where('lga_name',$id)->sum('party_score');
        return response()->json(['sum'=>$sum]);
    }

    /**
     * @param $id = lga id
     * @return \Illuminate\Http\JsonResponse
     */
    public function sumLgaResult($id){
        $uniqueID = Polling_unit::where('lga_id',$id)->get();
        $resultArray =[];
        $partiesArray = [];
        $parties = Party::all();
        for ($i = 0; $i<count($parties); $i++){
            $partiesArray[$i] = $parties[$i]->partyid;
        }
        $index = 0;
        foreach ($uniqueID as $key=>$value){
           $resultObj = Announced_pu_results::where('polling_unit_uniqueid',$value->uniqueid)->get();
            $partyScore = 0;
           foreach ($resultObj as $key2=>$score){
                if($partiesArray[$index] === $score->party_abbreviation){
                    $partyScore +=$score->party_score;
                    $resultArray[$score->party_abbreviation] += $partyScore;
                }
               $index++;
           }
        }

        return response()->json(['lga_result'=>$partiesArray]);
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
        //
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
