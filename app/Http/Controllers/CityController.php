<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\City;
use App\Models\AuditTrail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
       $success = City::create($validate);
       if($success)
       {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
        AuditTrail::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'table' => 'City',
            'action' => 'Added',
            'date' => $date->format('Y-m-d H:i:s')

        ]);
       }
        return redirect()->back()->with('success', 'Added Successfully');
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
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'City',
                'action' => 'Updated',
                'date' => $date->format('Y-m-d H:i:s')

            ]);
            $id->update(
                [
                    'name' => $request->name,
                    'area_code' => $request->area_code,
                ]
            );
        }
        return redirect()->back()->with('edited', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = City::find($id);
        if ($id) {
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'City',
                'action' => 'Delete',
                'date' => $date->format('Y-m-d H:i:s')
            ]);
            $id->delete();
        }
            return redirect()->back()->with('success', 'City Deleted');
    }
}
