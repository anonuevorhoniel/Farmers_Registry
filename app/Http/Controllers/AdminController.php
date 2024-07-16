<?php

namespace App\Http\Controllers;

use App\Models\AuditTrail;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
         if ($request->ajax()) {
            $audit = AuditTrail::orderBy('date', 'desc')->select('*');

            // Create custom data for each assistance
            return datatables()->of($audit)
          ->make(true);
        }
        return view('superadmin/dashboard', ['trails' => AuditTrail::orderBy('date', 'desc')->get()]);
    }
}
