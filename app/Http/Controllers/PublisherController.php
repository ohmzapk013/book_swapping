<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use Validator;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view('admin.publisher.manage_publisher', ['publishers' => $publishers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.publisher.add_edit_publisher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
            [
                'name' => 'required|unique:publishers',
            ],
            [
                'name.required' => 'the Name field is required',
                'name.unique'   => 'Publisher Name has exist'
            ]
        );

        if ($validate->fails()) {
            return redirect()->route('add_publisher')
                             ->withErrors($validate)
                             ->withInput();
        } else {
            $publisher = new Publisher;
            $publisher->name        = $request->name;
            $publisher->phone       = $request->phone;
            $publisher->address     = $request->address;
            $publisher->description = $request->description;
            $publisher->save();
            return redirect()->route('publishers')->with('success', 'The Publisher create successfull');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
