<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GenderAPI;
use App\Services\CountriesAPI;

class HomeController extends Controller
{

    public function index(CountriesAPI $countries)
    {
        return view('home', ['countries' => $countries->getCountries()]);
    }

    public function create(GenderAPI $gender, Request $request)
    {
        return $gender->getGender($request->all());
    }
}
