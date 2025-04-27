<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\Api\V1\GenreResource;
use App\Models\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\StoreGenreRequest;
use App\Http\Requests\Genre\UpdateGenreRequest;

class GenreConrtoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GenreResource::collection(Genre::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        return new GenreResource(Genre::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return new GenreResource($genre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());
        return new GenreResource($genre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->json([
            'message' => 'Genre deleted'
        ], 204);

    }
}
