<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adverts = Advert::all();
        return response()->json($adverts);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'advert_name' => 'required|max:150',
            'img' => 'required|max:150',
            'author' => 'required|max:50',
            'advert_description' => 'required',
            'selling_price' => 'required',

        ]);
        $advert = Advert::create($request->all());
        return response()->json([
            'status' => 'Success',
            'data' => $advert,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Advert $advert)
    {
        return response()->json($advert);
    }

    public function search(Request $request)
    {

        $adverts = Advert::query()
            ->when(
                $request->search,
                function (Builder $builder) use ($request) {
                    $builder->where('advert_name', 'like', "%{$request->search}%")
                        ->orWhere('img', 'like', "%{$request->search}%")
                        ->orWhere('advert_description', 'like', "%{$request->search}%");
                }
            )->get();

        return response()->json($adverts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advert $advert)
    {
        $request->validate($request, [
            'advert_name' => 'required|max:150',
            'img' => 'required|max:150',
            'author' => 'required|max:50',
            'advert_description' => 'required',
            'selling_price' => 'required',
        ]);

        $advert->update($request->all());
        return response()->json([
            'status' => 'Mise à jour avec succès'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advert $advert)
    {
        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
