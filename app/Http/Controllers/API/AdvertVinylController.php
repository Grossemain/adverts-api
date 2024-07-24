<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AdvertVinyl;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class AdvertVinylController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertVinyls = AdvertVinyl::all();
        return response()->json($advertVinyls);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'advert_name'=> 'required|max:150',
            'img' => 'required|max:150',
            'author' => 'required|max:50',
            'advert_description' => 'required',
            'selling_price'=> 'required',

            ]);
            $advertVinyl = AdvertVinyl::create($request->all());
            return response()->json([
            'status' => 'Success',
            'data' => $advertVinyl,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(AdvertVinyl $advertVinyl)
    {
        return response()->json($advertVinyl);
    }

    public function search(Request $request)
    {

        $advertVinyls = AdvertVinyl::query()
                 ->when(
                    $request->search,
                    function(Builder $builder) use ($request){
                        $builder->where('advert_name', 'like', "%{$request->search}%");
                    }
                 )->get();
// dd($adverts);
        return response()->json($advertVinyls);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdvertVinyl $advertVinyl)
    {
        $request->validate($request, [
            'advert_name'=> 'required|max:150',
            'img' => 'required|max:150',
            'author' => 'required|max:50',
            'advert_description' => 'required',
            'selling_price'=> 'required',
            ]);

            $advertVinyl->update($request->all());
            return response()->json([
            'status' => 'Mise à jour avec succès'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdvertVinyl $advertVinyl)
    {
        return response()->json([
            'status' => 'Supprimer avec succès'
            ]);
    }
}
