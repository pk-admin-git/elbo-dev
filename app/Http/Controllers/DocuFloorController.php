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
}
