<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // all cars
    public function index()
    {
        $car = Car::all()->toArray();
        return array_reverse($cars);
    }

    // add cars
    public function add(Request $request)
    {
        $car = new Car([
            'name' => $request->name,
            'status' => $request->status,
            'driver' => $request->driver
        ]);
        $car->save();

        return response()->json('The car successfully added');
    }

    // edit car
    public function edit($id)
    {
        $car = Car::find($id);
        return response()->json($car);
    }

    // update car
    public function update($id, Request $request)
    {
        $car = Car::find($id);
        $car->update($request->all());

        return response()->json('The car successfully updated');
    }

    // delete car
    public function delete($id)
    {
        $car = Car::find($id);
        $car->delete();

        return response()->json('The car successfully deleted');
    }
}
