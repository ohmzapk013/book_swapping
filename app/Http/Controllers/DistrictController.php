<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use Validator;

class DistrictController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validate = Validator::make($request->all(),
            [
                'name' => 'required|unique:districts',
                'city_id' => 'required'
            ],
            [
                'name.required' => 'the District field is required',
                'name.unique'   => 'District Name has exist'
            ]
        );

        if ($validate->fails()) {
            return redirect()->route('cities')
                             ->withErrors($validate)
                             ->withInput();
        } else {
            $district = new District;
            $district->city_id = $request->city_id;
            $district->name = $request->name;
            $district->save();
            return redirect()->route('cities')->with('success', 'add District successfull');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'the District Name field is required',
            ]
        );

        if ($validate->fails()) {
            return redirect()->route('cities')
                             ->withErrors($validate)
                             ->withInput();
        }else {
            $district = District::findOrFail($id);
            $district->name = $request->name;
            $district->save();
            return redirect()->route('cities')
                             ->with('success', 'update district successfull');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $district = District::findOrFail($id);
        $district->delete();
        return redirect()->route('cities')->with('success', 'delete district successfull !!!');
    }
}
