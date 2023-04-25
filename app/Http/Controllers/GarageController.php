<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class GarageController extends Controller
{

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cars = Car::all();
        return view('garage.index',compact('cars'));
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function viewCar(Car $car)
    {
        $cars = Car::all();
        $events = array("kk");
        return view('garage.viewCar',compact('cars','car','events'));
    }

}
