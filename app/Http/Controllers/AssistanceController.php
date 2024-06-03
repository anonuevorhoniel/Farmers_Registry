<?php

namespace App\Http\Controllers;

use App\Models\assistance;
use Illuminate\Http\Request;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $assistances = assistance::select('*');
    
            // Create custom data for each assistance
            return datatables()->of($assistances)
            ->addColumn('action', function ($assistance) {
                return '  <div class="dropdown">
                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item editbtn" data-name="' . $assistance->name . '" href="/assistances/' . $assistance->id . '/edit">Edit</a></li>
                    <li><a class="dropdown-item" href="/assistances/' . $assistance->id . '/destroy">Delete</a></li>
                </ul>
            </div>';
            })
          ->make(true);
        }
        return view('assistances.index');
    }
    

    /**
     * Show the form for creating a new resource.
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
        ]);
        Assistance::create($validate);
        return redirect()->back();
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
        $validate = $request->validate(['name' => 'required' ]);
        if($assistance = Assistance::find($id))
        {
            $assistance->update([
                'name'=> $request->name,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if($assistance = Assistance::find($id))
        {
            $assistance->delete();
        }
        return redirect()->back();
    }
}
