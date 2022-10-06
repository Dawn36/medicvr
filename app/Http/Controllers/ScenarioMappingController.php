<?php

namespace App\Http\Controllers;

use App\Models\ScenarioMapping;
use App\Models\Scenario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScenarioMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $hospitalId=$request->hospitalId;
        $scenariosId=ScenarioMapping::where('hospital_id',$hospitalId)->pluck('scenarios_id')->toArray();
        $scenario=Scenario::whereNotIn('id',$scenariosId)->get();
        return view('scenario-mapping/scenario_mapping_create',compact('scenario','hospitalId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId=Auth::user()->id;
        $request->validate([
            'scenario_id' => ['required'],
            'hospital_id' => ['required'],
            
        ]);
        $data = ScenarioMapping::create([
            'hospital_id' => $request->hospital_id,
            'scenarios_id' => $request->scenario_id,
            'user_id' => $userId,
            'created_at' => date("Y-m-d h:i:s"),
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScenarioMapping  $scenarioMapping
     * @return \Illuminate\Http\Response
     */
    public function show(ScenarioMapping $scenarioMapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScenarioMapping  $scenarioMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $mappingId =$request->mappingId;
        $scenarioId=$request->scenarioId;
        $hospitalId=$request->hospitalId;
        $scenariosId=ScenarioMapping::where('hospital_id',$hospitalId)->where('scenarios_id','!=',$scenarioId)->pluck('scenarios_id')->toArray();
        $scenario=Scenario::whereNotIn('id',$scenariosId)->get();

        return view('scenario-mapping/scenario_mapping_edit',compact('scenario','scenarioId','mappingId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScenarioMapping  $scenarioMapping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $hospital = ScenarioMapping::find($id);
        $request->validate([
            'scenario_id' => ['required'],
        ]);
        $hospital['scenarios_id'] = $request->scenario_id;
        $hospital->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScenarioMapping  $scenarioMapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = ScenarioMapping::find($id);
        $data->delete();
        return redirect()->back();
    }
}
