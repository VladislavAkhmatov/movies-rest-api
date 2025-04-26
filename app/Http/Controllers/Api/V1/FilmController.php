<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\StoreFilmRequest;
use App\Http\Requests\Film\UpdateFilmRequest;
use App\Http\Resources\Api\V1\FilmResource;
use App\Models\Film;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FilmResource::collection(Film::all()->load('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmRequest $request)
    {
        $film = new Film();
        $data = $request->validated();
        $genres_ids = $data['genres_ids'] ?? [];
        unset($data['genres_ids']);

        try {
            DB::Transaction(function () use ($film, $data, $genres_ids) {
                $film = Film::create($data);
                if (!empty($genres_ids)) {
                    $film->genres()->sync($genres_ids);
                }
                return $film->load('genres');
            });

            return new FilmResource($film);

        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return new FilmResource($film->load('genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        $data = $request->validated();
        $genres_ids = $data['genres_ids'] ?? [];
        unset($data['genres_ids']);

        try {
            DB::Transaction(function () use ($film, $data, $genres_ids) {
                $film->update($data);
                if (!empty($genres_ids)) {
                    $film->genres()->sync($genres_ids);
                }
                return $film->load('genres');
            });

            return new FilmResource($film);

        } catch (\Exception $exception) {
            return response()->json([
                'error' => $exception->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->genres()->detach();
        $film->delete();
        return response()->json([
            'message' => 'Film successfully deleted'
        ], 204);
    }
}
