<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\farmer;
use App\Models\FarmerType;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $farmers = Farmer::with('farm', 'farmerType')->select('*');
    
            // Create custom data for each assistance
            return dataTables()->of($farmers)
            ->addColumn('action', function ($farmer) {
                return '   <div class="dropdown">
                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/farmers/' . $farmer->id . '/show">View</a></li>
                    <li><a class="dropdown-item" href="/farmers/' . $farmer->id . '/edit">Edit</a></li>
                    <li><a class="dropdown-item" href="/farmers/' . $farmer->id . '/destroy">Delete</a></li>
                </ul>
            </div>';
            })
          ->make(true);
        }
        // Load the view with data as usual
        return view('farmers.index');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = FarmerType::all();
        $farm = Farm::all();
        return view('farmers/create',['types' => $type, 'farms' => $farm]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'middle_name' => 'required',
            'birth_date'=> 'required',
            'birth_place'=> 'required',
            'sex'=> 'required',
            'contact_number'=> 'required||numeric',
        ]);
        Farmer::create([
            ...$validation,
            'other_information' => $request->input('other_information'),
            'farm_id' => $request->input('farm_id'),
            'farmer_type_id' => $request->input('farmer_type_id'),
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $farmer = Farmer::find($id);
        return view('/farmers/show', ['farmer'=> $farmer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $type = FarmerType::all();
        $farm = Farm::all();
        $farmer = Farmer::with('farm', 'farmerType')->find($id);
        return view('/farmers/edit', ['farmer'=> $farmer, 'types' => $type, 'farms'=> $farm]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'middle_name' => 'required',
            'birth_date'=> 'required',
            'birth_place'=> 'required',
            'sex'=> 'required',
            'contact_number'=> 'required||numeric',
            'farm_id' => 'required',
            'farmer_type_id' => 'required'
        ]);
        $farmer = Farmer::find($id);
        $farmer->update(
            [
                'first_name'=> $validation['first_name'],
                'last_name'=> $validation['last_name'],
                'middle_name'=> $validation['middle_name'],
                'name_extension'=>  $request->input('name_extension'),
                'birth_date'=> $validation['birth_date'],
                'birth_place'=> $validation['birth_place'],
                'sex'=> $validation['sex'],
                'contact_number'=> $validation['contact_number'],
                'other_information'=> $request->input('other_information'),
                'farm_id' => $request->input('farm_id'),
                'farmer_type_id'=> $request->input('farmer_type_id')
            ]
            );
            
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $farmer = Farmer::find($id);
       if ($farmer)
       {
        $farmer->delete();
        return redirect()->back();
       }
       else
       {
        return redirect()->back()->with('error','Cannot Delete this row');
       }
    }
}
