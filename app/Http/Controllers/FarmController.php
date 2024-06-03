<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\farm;
use App\Models\CropType;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
          if ($request->ajax()) {
            $farms =Farm::with('city')->select('*');
    
            // Create custom data for each assistance
            return dataTables()->of($farms)
            ->addColumn('action', function ($farm) {
                return '   <div class="dropdown">
                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" data-name="' .$farm->name . '" href="/farms/' . $farm->id . '/edit">Edit</a></li>
                    <li><a class="dropdown-item" href="/farms/' . $farm->id . '/destroy">Delete</a></li>
                </ul>
            </div>';
            })
          ->make(true);
        }

        return view('farms/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('farms/create', ['crops'=> CropType::all(), 'cities' => City::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $validate =   $request->validate([
            'name'=> 'required',
            'city_id'=> 'required',
            'size' => 'required||numeric',
            'crop_type' => 'required'
            ]);
            Farm::create($validate);
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(farm $farm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $farm = Farm::with('city')->find($id);
        return view('farms/edit', ['farm' => $farm, 'cities' => City::all(), 'crops' => CropType::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $farm = Farm::find($id);
        $validate = $request->validate([
            'name'=> 'required',
            'location'=> 'required',
            'size' => 'required||numeric',
            'crop_type' => 'required'
        ]);
        $farm->update([
            'name' => $validate['name'],
            'location' => $validate['location'],
            'size' => $validate['size'],
            'crop_type' => $validate['crop_type']
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = Farm::find($id);
        if($id)
        {
            $id->delete();
        }
        return redirect()->back();
    }
}
