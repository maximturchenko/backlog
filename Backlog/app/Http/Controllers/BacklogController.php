<?php

namespace App\Http\Controllers;

use App\Backlog;
use App\Sprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BacklogController extends Controller
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
        $backlog = new Backlog;
        $backlog->Title = $request->Title;
        $backlog->Description = $request->Description;
        if (Auth::check())
        {
            $backlog->user_id = Auth::id();
        }         
        if ($request->has('sprint')) { 
            $sprint = Sprint::where('name', $request->name)->first();
            $backlog->sprint_id = $sprint->id;
        }
       $backlog->save(); 
        $backlog->name = "TASK-".$backlog->id; 
        $backlog->save();
        //unit test сюда
        return response()->json([
            'id' => $backlog->name , 
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Backlog  $backlog
     * @return \Illuminate\Http\Response
     */
    public function show(Backlog $backlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Backlog  $backlog
     * @return \Illuminate\Http\Response
     */
    public function edit(Backlog $backlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Backlog  $backlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Backlog $backlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Backlog  $backlog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Backlog $backlog)
    {
        //
    }
}
