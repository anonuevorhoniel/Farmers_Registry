<?php

namespace App\Http\Controllers;

use App\Models\assistance;
use App\Models\AssistanceHistory;
use App\Models\farmer;
use Illuminate\Http\Request;

class AssistanceHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = AssistanceHistory::with('farmer', 'assistance')->get();
        return view('histories/index', ['histories' =>$histories]);
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
        AssistanceHistory::create([
           'farmer_id' => $validate['farmer_id'],
           'assistance_id' => $validate['assistance_id'],
           'given_date' => $validate['given_date']

        ]);
        return redirect()->back();
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
        $history->update([
            'farmer_id'=> $validate['farmer_id'],
            'assistance_id'=> $validate['assistance_id'],
            'given_date'=> $validate['given_date']
        ]);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $history = AssistanceHistory::find($id);
        $history->delete();
        return redirect()->back();
    }
}
