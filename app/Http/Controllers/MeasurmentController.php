<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\measurment;

class MeasurmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project)
    {
        $measurments = measurment::where('ProjectId', $project)->get();

        return $measurments;
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
            'Number' => 'integer|required',
            'ProjectId' => 'required',
            'Closed' => 'required',
            'Current' => 'required',
        ]);

        $measurments = measurment::create($data);

        return response($measurments, 201);
    }

    public function update(Request $request, measurment $measurment)
    {
        $data = $request->validate([
            'Number' => 'integer',
            'ProjectId' => 'integer',
            'Closed' => 'boolean',
            'Current' => 'boolean',
        ]);
        $measurment->update($data);

        return response($measurment, 200);
    }
}
