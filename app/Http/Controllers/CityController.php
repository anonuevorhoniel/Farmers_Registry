<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("cities/index", ['cities' => City::orderBy('created_at', 'asc')->with('farms')->get(), 'total' => City::count()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cities/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'area_code' => 'required||numeric'
        ]);
        City::create($validate);
        Alert::success('Success', 'Created Successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        return view('cities/edit', ['city' => City::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'area_code' => 'required||numeric'
        ]);
        $id = City::find($id);
        if ($id) {
            $id->update(
                [
                    'name' => $request->name,
                    'area_code' => $request->area_code,
                ]
            );
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = City::find($id);
        if ($id) {
            $id->delete();
        }
        Alert::success('Success', 'Deleted Successfully');
        return redirect()->back();
    }
}
