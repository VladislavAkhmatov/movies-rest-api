<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Screening\StoreScreeningRequest;
use App\Http\Requests\Screening\UpdateScreeningRequest;
use App\Http\Resources\Api\V1\ScreeningResource;
use App\Models\Screening;

class ScreeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ScreeningResource::collection(Screening::with('film', 'hall')->paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScreeningRequest $request)
    {
        $screening = Screening::create($request->validated());
        return new ScreeningResource($screening->load('film', 'hall'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Screening $screening)
    {
        return new ScreeningResource($screening->load('film', 'hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScreeningRequest $request, Screening $screening)
    {
        $screening->update($request->validated());
        return new ScreeningResource($screening->load('film', 'hall'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Screening $screening)
    {
        $screening->delete();
        return response()->json(null, 204);
    }
}
