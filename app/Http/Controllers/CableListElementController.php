<?php

namespace App\Http\Controllers;

use App\cableListElement;
use Illuminate\Http\Request;

class CableListElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project, $cableList)
    {
        $cableListElements = cableListElement::where('CableListId', $cableList)
            ->orderBy('Position')->get();
        

        return $cableListElements;
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
            'Device' => 'required|string',
            'DeviceNumber' => 'required|string',
            'CableListId' => 'required',
            'Position' => 'required',
        ]);

        $cableListElement = cableListElement::create($data);

        return response($cableListElement, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cableListElement  $cableListElement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cableListElement $cableListElement)
    {
        $data = $request->validate([
            'Device' => 'required|string',
            'DeviceNumber' => 'required|string',
            'CableListId' => 'required',
            'Position' => 'required',
        ]);
        $cableListElement->update($data);
        
        return response($cableListElement, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cableListElement  $cableListElement
     * @return \Illuminate\Http\Response
     */
    public function destroy(cableListElement $cableListElement)
    {
        $cableListElement->delete();

        return response($cableListElement, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cableListElement  $cableListElement
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request, $cableList)
    {
        $cableListElements = cableListElement::where('CableListId', $cableList)->get();

        foreach ($cableListElements as $cableListElement) {
            $id = $cableListElement->id;
            foreach ($request->elements as $elementNew) {
                if ($elementNew['id'] == $id) {
                    $cableListElement->update(['Position' => $elementNew['Position']]);
                }
            }
        }
        $cableListElementsNew = cableListElement::where('CableListId', $cableList)
            ->orderBy('Position')->get();        
        return response($cableListElementsNew, 200);
    }
}
