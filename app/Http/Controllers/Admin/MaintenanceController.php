<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maintenance;
use App\Models\Car;
use App\Http\Requests\Maintenance\StoreRequest;
use App\Http\Requests\Maintenance\PutRequest;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances = Maintenance::join('cars', 'cars.id', '=', 'maintenances.car_id')
        ->select("maintenances.*","cars.name as car")
        ->orderBy("maintenances.maintenance_date","desc")
        ->paginate(10);
        return view('admin.maintenance.list',compact('maintenances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        return view('admin.maintenance.create',compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Maintenance::create($request->validated());
        return to_route("admin/maintenance.index")->with('status','Maintenance added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        $car = Car::find($maintenance->car_id);
        $documents = Maintenance::find($maintenance->id)->documents; 
        return view("admin.maintenance.show",compact('maintenance','car','documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        $cars = Car::all();
        $documents = Maintenance::find($maintenance->id)->documents; 
        return view("admin.maintenance.edit",compact('maintenance','cars','documents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Maintenance $maintenance)
    {
        $maintenance->update($request->validated());
        return to_route("admin/maintenance.show",compact('maintenance'))->with('status','Maintenance updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return to_route("admin/maintenance.index")->with('status',"Maintenance deleted.");
    }
}
