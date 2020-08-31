<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocuRoom;

class DocuRoomController extends Controller
{
    public function index($project)
    {
        $docuRooms = DocuRoom::where('ProjectId', $project)->get();

        return $docuRooms;     
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Room' => 'required|string',
            'ProjectId' => 'required',
            'DocuFloorId' => 'required'
        ]);

        $docuRoom = DocuRoom::create($data);

        return response($docuRoom, 201);
    }
}
