<?php

namespace App\Http\Controllers;

use App\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = project::with('customer')->get();
        
        return $projects;

        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'CustomerId' => 'required',
            'OrderIdInternal' => 'string',
            'OrderIdCustomer' => 'string',

        ]);

        $project = project::create($data);

        return response($project, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'CustomerId' => 'required',
            'OrderIdInternal' => 'string',
            'OrderIdCustomer' => 'string',

        ]);

        $project->update($data);

        return response($project, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        $project->delete();

        return response('Projekt wurde gelöscht', 200);
    }
}
