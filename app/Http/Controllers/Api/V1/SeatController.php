<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seat\StoreSeatRequest;
use App\Http\Requests\Seat\UpdateSeatRequest;
use App\Http\Resources\Api\V1\SeatResource;
use App\Models\Seat;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SeatResource::collection(Seat::paginate(20)->load('hall'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSeatRequest $request)
    {
        $seat = Seat::create($request->validated());
        return new SeatResource($seat->load('hall'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Seat $seat)
    {
        return new SeatResource($seat->load('hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeatRequest $request, Seat $seat)
    {
        $seat->update($request->validated());
        return new SeatResource($seat->load('hall'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seat $seat)
    {
        $seat->delete();
        return response()->json(null, 204);
    }
}
