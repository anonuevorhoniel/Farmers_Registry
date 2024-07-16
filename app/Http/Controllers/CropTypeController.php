<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\CropType;
use App\Models\AuditTrail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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
        $success = CropType::create($validate);
        if($success){
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'Crop Type',
                'action' => 'Added',
                'date' => $date->format('Y-m-d H:i:s')
            ]);
            return redirect()->back()->with('success', 'Added Successfully');
        }
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
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'Crop Type',
                'action' => 'Updated',
                'date' => $date->format('Y-m-d H:i:s')

            ]);
            $type->update($validate);
        }
        return redirect()->back()->with('edited', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if($type = CropType::find($id))
        {
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'Crop Type',
                'action' => 'Deleted',
                'date' => $date->format('Y-m-d H:i:s')

            ]);
            $type->delete();
        }
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
