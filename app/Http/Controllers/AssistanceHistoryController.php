<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\Farmer;
use App\Models\Assistance;
use App\Models\AuditTrail;
use Illuminate\Http\Request;
use App\Models\AssistanceHistory;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AssistanceHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $histories = AssistanceHistory::with('farmer', 'assistance')->select('*');
            return dataTables()->of($histories)
            ->addColumn( 'action', function ($history) {
                return ' <div class="dropdown">
                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/histories/' . $history->id . '/edit"> Edit </a></li>
                    <li><a class="dropdown-item" href="/histories/' . $history->id . '/destroy">Delete</a>
                    </li>
                </ul>
            </div>';
            })
            ->make(true);
        }
        return view('histories/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $farmers = Farmer::all();
        $assistances = Assistance::all();
        return view('histories/create', ['farmers'=> $farmers, 'assistances'=> $assistances]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'farmer_id'=> 'required',
            'assistance_id'=> 'required',
            'given_date'=> 'required'
        ]);
        $success = AssistanceHistory::create([
           'farmer_id' => $validate['farmer_id'],
           'assistance_id' => $validate['assistance_id'],
           'given_date' => $validate['given_date']

        ]);
        if($success)
        {
            $date = new DateTime();
            $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
            AuditTrail::create([
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'table' => 'Assistance History',
                'action' => 'Added',
                'date' => $date->format('Y-m-d H:i:s')

            ]);
        return redirect()->back()->with('success', 'Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AssistanceHistory $assistanceHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $histories = AssistanceHistory::find($id);
        return view('histories/edit',['histories' => $histories, 'farmers' => Farmer::all(), 'assistances' => Assistance::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $history = AssistanceHistory::find($id);
        $validate = $request->validate([
            'farmer_id'=> 'required',
            'assistance_id'=> 'required',
            'given_date'=> 'required'
            ]);
            if($history)
            {
        $history->update([
            'farmer_id'=> $validate['farmer_id'],
            'assistance_id'=> $validate['assistance_id'],
            'given_date'=> $validate['given_date']
        ]);
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
        AuditTrail::create([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'table' => 'Assistance History',
            'action' => 'Updated',
            'date' => $date->format('Y-m-d H:i:s')

        ]);
        return redirect()->back()->with('edited', 'Edited Successfully');

            }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $history = AssistanceHistory::find($id);
        if($history)
        {
          $history->delete();
          $date = new DateTime();
          $date->setTimezone(new DateTimeZone('Asia/Shanghai'));
          AuditTrail::create([
              'user_id' => Auth::user()->id,
              'user_name' => Auth::user()->name,
              'table' => 'Assistance History',
              'action' => 'Deleted',
              'date' => $date->format('Y-m-d H:i:s')

          ]);
          return redirect()->back()->with('success', 'Deleted Successfully');

        }

    }
}
