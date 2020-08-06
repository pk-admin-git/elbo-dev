<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DocuCategory;

class DocuCategoryController extends Controller
{
    public function index($project)
    {
        $docuCategories = DocuCategory::where('ProjectId', $project)->get();

        return $docuCategories;     
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Category' => 'required|string',
            'color' => 'required',
            'ProjectId' => 'required',
        ]);

        $docuCategory = docuCategory::create($data);

        return response($docuCategory, 201);
    }
}
