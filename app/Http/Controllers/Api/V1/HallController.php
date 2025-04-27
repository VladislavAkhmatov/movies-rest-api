<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hall\StoreHallRequest;
use App\Http\Requests\Hall\UpdateHallRequest;
use App\Http\Resources\Api\V1\HallResource;
use App\Models\Hall;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HallResource::collection(Hall::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHallRequest $request)
    {
        return new HallResource(Hall::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        return new HallResource($hall);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $hall->update($request->validated());
        return new HallResource($hall);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        $hall->delete();
        return response()->json(null, 204);
    }
}
