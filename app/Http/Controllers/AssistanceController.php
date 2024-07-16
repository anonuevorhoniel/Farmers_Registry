<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Assistance;
use App\Models\AuditTrail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $assistances = assistance::select('*');
            return datatables()->of($assistances)
            ->addColumn('action', function ($assistance) {
                return '  <div class="dropdown">
                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item editbtn" data-name="' . $assistance->name . '" href="/assistances/' . $assistance->id . '/report">View Report</a></li>
                    <li><a class="dropdown-item editbtn" data-name="' . $assistance->name . '" href="/assistances/' . $assistance->id . '/edit">Edit</a></li>
                    <li><a class="dropdown-item" href="/assistances/' . $assistance->id . '/destroy">Delete</a></li>
                </ul>
            </div>';
            })
          ->make(true);
        }
        return view('assistances.index');
    }

    public function report($id, Request $request)
    {
        $assistance = Assistance::find($id);
        if($assistance)
        {
            return view('assistances/report', ['reports' => $assistance->histories]);
        }
    }
    /**
     * Show the form for creating a new resource.s
     */
    public function create()
    {
        return view('assistances/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validate = $request->validate([
            'name'=> 'required',
            'value' => 'required'
        ]);
       $success = Assistance::create($validate);
       if($success)
       {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
        AuditTrail::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'table' => 'Assistance',
            'action' => 'Added',
            'date' => $date->format('Y-m-d H:i:s')

        ]);
       }
        return redirect()->back()->with('success', 'Assistance Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(assistance $assistance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if($assistance = Assistance::find($id))
        {
            return view('assistances/edit', ['assistance' => $assistance]);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate(['name' => 'required', 'value' => 'required' ]);
        if($assistance = Assistance::find($id))
        {
            $assistance->update([
                'name'=> $request->name,
                'value' => $request->value
            ]);
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'Assistance',
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
        if($assistance = Assistance::find($id))
        {
            $assistance->delete();
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'Assistance',
                'action' => 'Deleted',
                'date' => $date->format('Y-m-d H:i:s')

            ]);
        }
        return redirect()->back()->with('success', 'Deleted');
    }
}
