<?php

namespace App\Http\Controllers;

use App\Sprint;
use App\Backlog; 


use App\Http\Requests\StoreSprintRequest;
use App\Http\Requests\StartSprintRequest;


use Illuminate\Http\Request;
use Carbon\Carbon;


class SprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {         
        $sprint = Sprint::find(1);   

        //unit test 
        return response()->json([
            'sprint' => $sprint,
            'tasks' => $sprint->tasks,
        ]);
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
    public function store(StoreSprintRequest $request)
    {
        $sprint = new Sprint; 
        $year = Carbon::createFromFormat('Y', $request->Year)->format('y'); 
        $week = $request->Week;
        $tt =  $year.'-'.$week;          
         $sprint->name = $tt;
        $sprint->save(); 

        //unit test 
        return response()->json([
            'Id' =>  $sprint->name 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_task(Request $request)
    { 
        $sprint = Sprint::firstOrCreate(['name' => $request->sprintId]);         
        $backlog = Backlog::where('name', '=', $request->taskId)->firstOrFail();  
        $backlog->sprint_id = $sprint->id;
        $backlog->save();         
        //unit test 
        return response()->json([
            'Задача '. $backlog->name.' добавлена в спринт' =>  $sprint->name 
        ]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StartSprintRequest $request
     * @return \Illuminate\Http\Response
     */
    public function start_sprint(StartSprintRequest $request)
    { 
        $sprint = Sprint::where('name', '=', $request->sprintId)->firstOrFail();  
        $sprint->status_id = 1; //Запущен, в работе
        $sprint->save();
         return response()->json([
          'Запущен '. $sprint->name.'' => 'true' , 
         ]);
    }
  

    /**
     * Display the specified resource.
     *
     * @param  \App\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function show(Sprint $sprint)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function edit(Sprint $sprint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sprint $sprint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sprint $sprint)
    {
        //
    } 
}
