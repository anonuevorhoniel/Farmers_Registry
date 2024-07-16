<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Farm;
use App\Models\farmer;
use App\Models\AuditTrail;
use App\Models\FarmerType;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $farmers = Farmer::with('farm', 'farmerType')->select('*');

            return dataTables()->of($farmers)
                ->addColumn('action', function ($farmer) {
                    return '   <div class="dropdown">
                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/farmers/' . $farmer->id . '/report">View Report</a></li>
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
    public function report($id)
    {
        $farmer = Farmer::find($id);
        if($farmer){
            return view('farmers/report', ['farmers' => $farmer->assistanceHistory, 'id' => $id, 'name' => $farmer->first_name, 'farmer_info' => $farmer]);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = FarmerType::all();
        $farm = Farm::all();
        return view('farmers/create', ['types' => $type, 'farms' => $farm]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function pdf($id)
    {
        $dates = new DateTime();
        $faes = "faes.png";
        $capital = "laguna.png";
        $date = $dates->format('F j, Y');
        $farmer = Farmer::find($id);
        $farmer_as = Farmer::find($id)->assistanceHistory()->orderBy('given_date', 'desc')->get();
        $pdf = Pdf::loadView('farmers/pdfs/pdf', ['farmers' => $farmer_as, 'id' => $id, 'farmer' => $farmer, 'date' => $date, 'faes' => $faes, 'laguna' => $capital, 'farm' => $farmer->farm]);
        $pdf->setPaper([0, 0, 612, 936], 'portrait'); // 612 points = 8.5 inches, 936 points = 13 inches
        return $pdf->stream($farmer->first_name . '_' . $farmer->middle_name . '_' . $farmer->last_name .'_report.pdf');
    }
    public function store(Request $request)
    {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
        $validation = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'sex' => 'required',
            'contact_number' => 'required||numeric',
        ]);
        Farmer::create([
            ...$validation,
            'other_information' => $request->input('other_information'),
            'farm_id' => $request->input('farm_id'),
            'farmer_type_id' => $request->input('farmer_type_id'),
        ]);
        AuditTrail::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'table' => 'Farmers',
            'action' => 'Added',
            'date' => $date->format('Y-m-d H:i:s')

        ]);
        return redirect()->back()->with('success', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $type = FarmerType::all();
        $farm = Farm::all();
        $farmer = Farmer::with('farm', 'farmerType')->find($id);
        return view('/farmers/edit', ['farmer' => $farmer, 'types' => $type, 'farms' => $farm]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'birth_date' => 'required',
            'birth_place' => 'required',
            'sex' => 'required',
            'contact_number' => 'required||numeric',
            'farm_id' => 'required',
            'farmer_type_id' => 'required'
        ]);
        $farmer = Farmer::find($id);
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
        AuditTrail::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'table' => 'Farmers',
            'action' => 'Updated',
            'date' => $date->format('Y-m-d H:i:s')

        ]);
        $farmer->update(
            [
                'first_name' => $validation['first_name'],
                'last_name' => $validation['last_name'],
                'middle_name' => $validation['middle_name'],
                'name_extension' =>  $request->input('name_extension'),
                'birth_date' => $validation['birth_date'],
                'birth_place' => $validation['birth_place'],
                'sex' => $validation['sex'],
                'contact_number' => $validation['contact_number'],
                'other_information' => $request->input('other_information'),
                'farm_id' => $request->input('farm_id'),
                'farmer_type_id' => $request->input('farmer_type_id')
            ]
        );


        return redirect()->back()->with('edited', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $farmer = Farmer::find($id);
        if ($farmer) {
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'Farmers',
                'action' => 'Deleted',
                'date' => $date->format('Y-m-d H:i:s')

            ]);
            $farmer->delete();
            return redirect()->back()->with('success', 'Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Cannot Delete this row');
        }
    }
}
