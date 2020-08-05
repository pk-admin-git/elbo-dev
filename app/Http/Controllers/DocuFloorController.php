<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocuFloor;

class DocuFloorController extends Controller
{
    public function index($object)
    {
        $docuFloors = DocuFloor::where('DocuObjectId', $object)->get();

        return $docuFloors;     
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Floor' => 'required|string',
            'ProjectId' => 'required',
            'DocuObjectId' => 'required'
        ]);

        $docuFloor = docuFloor::create($data);

        return response($docuFloor, 201);
    }
}
