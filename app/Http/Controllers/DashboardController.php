<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Farm;
use App\Models\Farmer;
use App\Models\CropType;
use App\Models\Assistance;
use App\Models\FarmerType;
use Illuminate\Http\Request;
use App\Models\AssistanceHistory;

class DashboardController extends Controller
{
  public function dashboard()
  {
    $assistances = Assistance::pluck('id')->count();
    $crops = CropType::pluck('id')->count();
    $farms = Farm::pluck('id')->count();
    $farmers = Farmer::pluck('id')->count();
    $farmerType = FarmerType::pluck('id')->count();
    $histories = AssistanceHistory::pluck('id')->count();
    $cities = City::with('farms')->withCount('farmers')->get();
    $cities->each(function ($city) {
      $city->total_assistance_history = $city->farmers()->withCount('assistanceHistory')->get()->sum('assistance_history_count');
    });
    return view("dashboard", [
      'assistances' => $assistances,
      'crops' => $crops,
      'farms' => $farms,
      'farmers' => $farmers,
      'farmerTypes' => $farmerType,
      'histories' => $histories,
      'cities' => $cities,
      'total' => City::count(),
    ]);
  }


}
