<?php

namespace App\Http\Controllers\API;

use App\Models\City;
use App\Models\Province;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionalController extends Controller
{
    public function provinces()
    {
        $province = Province::all();

        return $province;
    }

    public function city(Request $request)
    {
        $city = Province::find($request->province_id)->city;

        return $city;
    }

    public function subdistrict(Request $request)
    {
        $subdistrict = Province::find($request->province_id)->city->subdistrict;

        return $subdistrict;
    }

    public function cities()
    {
        $cities = City::all();

        return $cities;
    }

    public function subdistricts()
    {
        $subdistricts = Subdistrict::all();

        return $subdistricts;
    }
}
