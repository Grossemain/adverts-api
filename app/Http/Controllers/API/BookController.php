<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'author' => 'required|max:50',
            'description' => 'required',
            'edition' => 'required|max:50',
            'purchase_price' => 'required|max:50',
            'is_for_sale' => 'required',

        ]);
        $book = Book::create($request->all());
        return response()->json([
            'status' => 'Success',
            'data' => $book,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json($book);
    }

    public function search(Request $request)
    {

        $books = Book::query()
            ->when(
                $request->search,
                function (Builder $builder) use ($request) {
                    $builder->where('title', 'like', "%{$request->search}%")
                        ->orWhere('author', 'like', "%{$request->search}%")
                        ->orWhere('edition', 'like', "%{$request->search}%");
                }
            )->get();
        // dd($books);
        return response()->json($books);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate($request, [
            'title' => 'required|max:150',
            'author' => 'required|max:50',
            'description' => 'required',
            'edition' => 'required|max:50',
            'purchase_price' => 'required|max:50',
            'is_for_sale' => 'required',
        ]);

        $book->update($request->all());
        return response()->json([
            'status' => 'Mise à jour avec succès'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        return response()->json([
            'status' => 'Supprimer avec succès'
        ]);
    }
}
