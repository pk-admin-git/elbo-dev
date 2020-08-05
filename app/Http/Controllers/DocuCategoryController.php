<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocuCategory;

class DocuCategoryController extends Controller
{
    public function index($project, $docuObject, $docuFloor)
    {
        $docuCategories = DocuCategory::where('DocuFloorId', $docuFloor)->get();

        return $docuCategories;     
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Category' => 'required|string',
            'ProjectId' => 'required',
            'DocuObjectId' => 'required',
            'DocuFloorId' => 'required'
        ]);

        $docuCategory = docuCategory::create($data);

        return response($docuCategory, 201);
    }
}
