<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocuFloorController extends Controller
{
    public function index($object)
    {
        $docuFloors = docuFloor::where('DocuObjectId', $object)->get();

        return $docuObjects;     
    }
}
