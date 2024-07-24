<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vinyl;
use Illuminate\Http\Request;

class VinylController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vinyls = Vinyl::all();
        return response()->json($vinyls);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'album' => 'required|max:150',
            'artist' => 'required|max:50',
            'information' => 'required',
            'label'=> 'required|max:50',
            'purchase_price'=> 'required|max:50',
            'is_for_sale'=> 'required',

            ]);
            $vinyl = Vinyl::create($request->all());
            return response()->json([
            'status' => 'Success',
            'data' => $vinyl,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vinyl $vinyl)
    {
        return response()->json($vinyl);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vinyl $vinyl)
    {
        $request->validate($request, [
            'album' => 'required|max:150',
            'artist' => 'required|max:50',
            'information' => 'required',
            'label'=> 'required|max:50',
            'purchase_price'=> 'required|max:50',
            'is_for_sale'=> 'required',
            ]);

            $vinyl->update($request->all());
            return response()->json([
            'status' => 'Mise à jour avec succès'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vinyl $vinyl)
    {
        return response()->json([
            'status' => 'Supprimer avec succès'
            ]);
    }
}
