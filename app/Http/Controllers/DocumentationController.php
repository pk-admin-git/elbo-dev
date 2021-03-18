<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\documentation;

class DocumentationController extends Controller
{
    public function index($project, $cableList)
    {
        $documentation = documentation::where('CableListId', $cableList)->with('specification')->get();

        return $documentation;
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'Amount' => 'required',
            'EmployeeId' => 'required',
            'MeasurmentId' => 'required',
            'MeasurmentNumber' => 'required',
            'SpecificationId' => 'required',
            'ProjectId' => 'required',
            'ObjectId' => 'required',
            'ObjectText' => 'required',
            'FloorId' => 'required',
            'FloorText' => 'required',
            'RoomId' => 'required',
            'RoomText' => 'required',
            'CategoryId' => 'required',
            'CableListId' => 'required',
            'CableListElementId' => 'required',
            'Finished' => 'required',
        ]);

        $documentation = documentation::create($data);

        return response($documentation, 201);
    }

    public function update(Request $request, documentation $documentation)
    {
        $data = $request->validate([
            'Amount' => 'required',
            'EmployeeId' => 'required',
            'MeasurmentId' => 'required',
            'MeasurmentNumber' => 'required',
            'SpecificationId' => 'required',
            'ProjectId' => 'required',
            'ObjectId' => 'required',
            'ObjectText' => 'required',
            'FloorId' => 'required',
            'FloorText' => 'required',
            'RoomId' => 'required',
            'RoomText' => 'required',
            'CategoryId' => 'required',
            'CableListId' => 'required',
            'CableListElementId' => 'required',
            'Finished' => 'required',
        ]);
        $documentation->update($data);

        return response($documentation, 200);
    }

    public function destroy(documentation $documentation)
    {
        $documentation->delete();

        return response($documentation, 200);
    }
}
