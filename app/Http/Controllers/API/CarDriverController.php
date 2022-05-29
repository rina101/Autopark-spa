<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarDriverController extends Controller
{
    // all carDriver
    public function index()
    {
        $cardriver = CarDriver::all()->toArray();
        return array_reverse($cardrivers);
    }

    // add car drivers
    public function add(Request $request)
    {
        $cardriver = new CarDriver([
            'name' => $request->name,
        ]);
        $cardriver->save();

        return response()->json('The car driver successfully added');
    }

    // edit car driver
    public function edit($id)
    {
        $cardriver = CarDriver::find($id);
        return response()->json($cardriver);
    }

    // update car driver
    public function update($id, Request $request)
    {
        $cardriver = CarDriver::find($id);
        $cardriver->update($request->all());

        return response()->json('The car driver successfully updated');
    }

    // delete car driver
    public function delete($id)
    {
        $cardriver = CarDriver::find($id);
        $cardriver->delete();

        return response()->json('The car driver successfully deleted');
    }
}
