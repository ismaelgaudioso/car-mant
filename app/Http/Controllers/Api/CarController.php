<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Http\Requests\Car\StoreRequest;
use App\Http\Requests\Car\PutRequest;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Car::paginate(10));
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return response()->json(Car::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\JsonResponseponse
     */
    public function show(Car $car): JsonResponse
    {
        return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PutRequest $request, Car $car): JsonResponse
    {
        $car->update($request->validated());
        return response()->json($car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Car $car): JsonResponse
    {
        $car->delete();
        return response()->json("ok");
    }
}
