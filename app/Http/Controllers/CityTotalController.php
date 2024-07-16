<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityTotalController extends Controller
{
    public function farms(Request $request, $id)
    {
       $cities = City::find($id);
       if ( $cities ) {
        $cities->with("farms.farm_crops")->select('*');
        return view("totalcities/farmstotal/index", ["cities"=> $cities ]);
       }
       else
       {
        return redirect()->route('dashboard');
       }
    }
    public function farmers(Request $request, $id)
    {
        $cities = City::with("farms")->find($id);
        return view("totalcities/farmerstotal/farmers", ["cities"=> $cities ]);

    }
    public function histories(Request $request, $id)
    {
        $cities = City::with("farms")->find($id);
        return view("totalcities/historiestotal/histories", ["cities"=> $cities ]);

    }
}
