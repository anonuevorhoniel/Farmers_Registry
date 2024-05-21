<?php

namespace App\Http\Controllers;

use App\Models\FarmerType;
use Illuminate\Http\Request;

class FarmerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('farmertypes/index', ['types'=> FarmerType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('farmertypes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(['name' => 'required']);
        FarmerType::create($validate);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(FarmerType $farmerType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alltype = FarmerType::all();
        if($type = FarmerType::find($id))
        {
            return view('farmertypes/edit', ['type'=> $type, 'alltype' => $alltype ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $validate = $request->validate([
            'name'=> 'required'
        ]);
        if($type = FarmerType::find($id))
        {
            $type->update([
                'name' => $validate['name']
            ]);
           return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if($type = FarmerType::find($id))
        {
            $type->delete();
        }
        return redirect()->back();
    }
}
