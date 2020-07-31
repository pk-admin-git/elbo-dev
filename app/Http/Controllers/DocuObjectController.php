<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocuObject;

class DocuObjectController extends Controller
{
    public function index($project)
    {
        $docuObjects = docuObject::all();

        $docuObjectsFiltered = $docuObjects->where('ProjectId', $project);
        
        return $docuObjectsFiltered;

        
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
            'Object' => 'required|string',
            'ProjectId' => 'required',
        ]);

        $docuObject = docuObject::create($data);

        return response($docuObject, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\docuProject  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, docuProject $docuProject)
    {
        $data = $request->validate([
            'Object' => 'required|string',
            'ProjectId' => 'required',

        ]);

        $docuProject->update($data);

        return response($docuProject, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\docuProject  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $docuProject)
    {
        $project->delete();

        return response('Objekt wurde gelöscht', 200);
    }
}

