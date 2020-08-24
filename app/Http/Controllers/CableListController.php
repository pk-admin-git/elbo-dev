<?php

namespace App\Http\Controllers;

use App\cableList;
use Illuminate\Http\Request;

class CableListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project)
    {
        $cableListElements = cableList::where('ProjectId', $project)->get();

        return $cableListElements;
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
            'ProjectId' => 'required',
            'ObjectId' => 'required',
            'FloorId' => 'required',
            'CategoryId' => 'required',
            'ConnectionStart' => 'integer',
            'ConnectionEnd' => 'integer'
        ]);

        $cableList = cablelist::create($data);

        return response($cableList, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cablelist  $cablelist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cablelist $cablelist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cablelist  $cablelist
     * @return \Illuminate\Http\Response
     */
    public function destroy(cablelist $cablelist)
    {
        //
    }
}
