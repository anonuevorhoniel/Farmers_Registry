<?php

namespace App\Http\Controllers;

use App\Models\CropType;
use Illuminate\Http\Request;

class CropTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = CropType::all();
        return view('croptypes/index', ['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('croptypes/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(['name'=>'required']);
        CropType::create($validate);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CropType $cropType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if($type = CropType::find($id))
        {
            return view('/croptypes/edit', ['type' => $type]);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate(['name'=> 'required']);
        if($type = CropType::find($id))
        {
            $type->update($validate);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if($type = CropType::find($id))
        {
            $type->delete();
        }
        return redirect()->back();
    }
}
