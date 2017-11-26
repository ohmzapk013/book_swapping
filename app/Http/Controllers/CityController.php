<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\City;
use App\District;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $city = $cities->first();
        return view('admin.city.manage_city', ['cities' => $cities]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
            [
                'name' => 'required|unique:cities'
            ],
            [
                'name.required' => 'the Name field is required',
                'name.unique'   => 'City Name has exist'
            ]
        );

        if ($validate->fails()) {
            return redirect()->route('cities')
                             ->withErrors($validate)
                             ->withInput();
        } else {
            $city = new City;
            $city->name = $request->name;
            $city->save();
            return redirect()->route('cities')
                             ->with('success', 'Add City successfull');
        }
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),
            [
                'city_name' => 'required'
            ],
            [
                'city_name.required' => 'the Name field is required',
            ]
        );

        if ($validate->fails()) {
            return redirect()->route('cities')
                             ->withErrors($validate)
                             ->withInput();
        }else {
            $city = City::findOrFail($id);
            $city->name = $request->city_name;
            $city->save();
            return redirect()->route('cities')
                             ->with('success', 'update city successfull');
        }
    }

    public function delete($id)
    {
        $city = City::findOrFail($id);
        foreach ($city->districts as $district) {
            $district->delete();
        }
        $city->delete();
        return redirect()->route('cities')->with('success', 'delete city successfull !!!');
    }

}
