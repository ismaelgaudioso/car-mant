<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\Car;
use App\Http\Requests\Insurance\StoreRequest;
use App\Http\Requests\Insurance\PutRequest;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$insurances = Insurance::paginate(10);

        $insurances = Insurance::join('cars', 'cars.id', '=', 'insurances.car_id')
            ->select("insurances.*","cars.name as car_name","cars.car_license as car_license")
            ->paginate(10);

        return view('insurance.list', compact('insurances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        return view('insurance.create',compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Insurance::create($request->validated());
        return to_route('insurance.index')->with('status','Insurance added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function show(Insurance $insurance)
    {
        $documents = Insurance::find($insurance->id)->documents;
        $car = Car::find($insurance->car_id);
        return view("insurance.show",compact('documents','insurance','car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function edit(Insurance $insurance)
    {
        $documents = Insurance::find($insurance->id)->documents;
        $car = Car::find($insurance->car_id);
        $cars = Car::all();
        return view("insurance.edit",compact('documents','insurance','car','cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Insurance $insurance)
    {
        $insurance->update($request->validated());
        return to_route("insurance.show",compact('insurance'))->with('status','Insurance updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insurance $insurance)
    {
        $insurance->delete();
        return to_route("insurance.index")->with('status','Insurance deleted.');
    }
}
