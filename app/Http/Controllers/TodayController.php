<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Today;
use App\Http\Resources\TodayTaskResource as TodayTaskResource;

class TodayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today_data=Today::all();
        return TodayTaskResource::collection($today_data);
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
        $rules=array(
            'title' => 'required',
            'completed' => 'required'
        );
        $this->validate($request,$rules);
        return Today::create([
            'title' => $request->input('title'),
            'completed' => $request->completed,
            'approved' => $request->approved,
            'taskId' =>request->taskId
        ]);
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
        $today_task= Today::FindOrFail($id);
        $rules=array(
            'title' => 'required',
            'completed' => 'required'
        );
        $today_task->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $today_task = Today::FindOrFail($id);
        $today_task->delete();
    }
}
