<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\AuditTrail;
use App\Models\FarmerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       $success =  FarmerType::create($validate);
       if($success)
       {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
        AuditTrail::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'table' => 'Farmer Type',
            'action' => 'Added',
            'date' => $date->format('Y-m-d H:i:s')

        ]);
       }
        return redirect()->back()->with('success', 'Added Successfully');
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
         $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
        AuditTrail::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'table' => 'Farmer Type',
            'action' => 'Updated',
            'date' => $date->format('Y-m-d H:i:s')

        ]);
            $type->update([
                'name' => $validate['name']
            ]);
           return redirect()->back()->with('edited', 'Edited Successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if($type = FarmerType::find($id))
        {
         $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
        AuditTrail::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'table' => 'Farmer Type',
            'action' => 'Deleted',
            'date' => $date->format('Y-m-d H:i:s')

        ]);
            $type->delete();
        }
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
