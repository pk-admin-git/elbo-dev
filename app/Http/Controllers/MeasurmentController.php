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
        $measurments = measurments::where('ProjectId', $project)->get();

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

        $measurments = measurments::create($data);

        return response($measurments, 201);
    }
}
