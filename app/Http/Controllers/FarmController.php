<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\City;
use App\Models\farm;
use App\Models\CropType;
use App\Models\AuditTrail;
use App\Models\FarmCrop;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $farms = Farm::with(['city', 'farm_crops.crop'])->select('*');
            return datatables()->of($farms)
                ->addColumn('action', function ($farm) {
                    return '<div class="dropdown">
                        <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" data-name="' . $farm->name . '" href="/farms/' . $farm->id . '/edit">Edit</a></li>
                            <li><a class="dropdown-item" href="/farms/' . $farm->id . '/destroy">Delete</a></li>
                        </ul>
                    </div>';
                })
                ->addColumn('crop_type', function ($farm) {
                    $arr = [];
                    foreach ($farm->farm_crops as $farm_crops) {
                        $arr[] = $farm_crops->crop->name;
                    }
                    return implode(', ', $arr);
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
        return view('farms/create', ['crops' => CropType::all(), 'cities' => City::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate =   $request->validate([
            'name' => 'required',
            'city_id' => 'required',
            'size' => 'required||numeric'
        ]);
        $success =  Farm::create($validate);
        foreach ($request->input('crop_type') as $crop) {
            FarmCrop::create([
                'farm_id' => $success->id,
                'crop_id' => $crop,
            ]);
        }
        if ($success) {
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'Farm',
                'action' => 'Added',
                'date' => $date->format('Y-m-d H:i:s')

            ]);
        }
        return redirect()->back()->with('success', 'Added Successfully');
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
        return view('farms/edit', ['farm' => $farm, 'cities' => City::all(), 'crops' => CropType::all(), 'crop_select' => $farm->farm_crops]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $farm = Farm::find($id);
        $validate = $request->validate([
            'name' => 'required',
            'location' => 'required',
            'size' => 'required||numeric',
            'crop_type' => 'required'
        ]);
        if ($farm) {
            $farm->update([
                'name' => $validate['name'],
                'location' => $validate['location'],
                'size' => $validate['size']
            ]);
            $arr = [];
            $id_farm_crop = $farm->farm_crops->pluck('crop_id');
            if ($id_farm_crop->isEmpty()) {
                foreach ($request->input('crop_type') as $croptypes) {
                    FarmCrop::create([
                        'farm_id' => $id,
                        'crop_id' => $croptypes
                    ]);
                }
            } else {
                foreach ($request->input('crop_type') as $input) {
                    if (!$id_farm_crop->contains($input)) {
                        FarmCrop::create([
                            'farm_id' => $id,
                            'crop_id' => $input
                        ]);
                    }
                    $collection = collect($request->input('crop_type'));
                    foreach ($id_farm_crop as $crop_types) {
                        if (!$collection->contains($crop_types)) {
                            FarmCrop::where('farm_id', $id)->where('crop_id', $crop_types)->delete();
                        }
                    }
                }
            }
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'Farm',
                'action' => 'Updated',
                'date' => $date->format('Y-m-d H:i:s')

            ]);
        }

        return redirect()->back()->with('edited', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = Farm::find($id);
        if ($id) {
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'Farm',
                'action' => 'Deleted',
                'date' => $date->format('Y-m-d H:i:s')

            ]);
            $id->delete();
        }
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
