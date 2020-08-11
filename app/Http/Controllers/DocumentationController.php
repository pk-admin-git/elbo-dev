<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\documentation;

class DocumentationController extends Controller
{
    public function index($project, $cablelist)
    {
        $documentation = documentation::where('CableListId', $cablelist)->get();

        return $documentation;
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|double(8,2)',
            'EmplyeeId' => 'required',
            'MeasurmentId' => 'required',
            'SpecificationId' => 'required',
            'ProjectId' => 'required',
            'ObjectId' => 'required',
            'FloorId' => 'required',
            'RoomId' => 'required',
            'CategoryId' => 'required',
        ]);

        $documentation = documentation::create($data);

        return response($documentation, 201);
    }
}
