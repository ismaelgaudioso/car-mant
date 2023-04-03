<?php

namespace App\Http\Controllers;

use App\Http\Requests\Car\StoreRequest;
use App\Http\Requests\Car\PutRequest;
use App\Models\Car;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(10);
        return view('dashboard',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
    }

    public function store(StoreRequest $request)
    {
        Car::create($request->validated());
        return to_route('car.index')->with('status','Car added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {      
        $documents = Car::find($car->id)->documents;  
        return view("car.show",compact('documents','car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $documents = Car::find($car->id)->documents; 
        return view("car.edit",compact('documents','car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Car $car)
    {
        $car->update($request->validated());
        return to_route("car.show",compact('car'))->with('status','Car updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return to_route("car.index")->with('status',"Car deleted.");
    }
}
