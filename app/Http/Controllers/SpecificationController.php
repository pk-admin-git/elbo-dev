<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\specification;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project)
    {
        $specifications = specification::where('ProjectId', $project)->get();

        return $specifications;
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
            'PositionText' => 'required',
            'PositionNumber' => 'required|integer',
            'ProjectId' => 'required',
            'ShortText' => 'required|string',
            'LongText' => 'required|string',
            'Quantity' => 'integer',
            'Unit' => 'string',
            'UnitPrice' => 'integer',
            'TotalPrice' => 'integer'
        ]);

        $specifications = specification::create($data);

        return response($specifications, 201);
    }

}
