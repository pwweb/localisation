<?php

namespace PWWEB\Localisation\Controllers;

use App\Http\Controllers\Controller;
use PWWEB\Localisation\Models\Country;
use PWWEB\Localisation\Models\Currency;
use PWWEB\Localisation\Models\Language;

class IndexController extends Controller
{
    /**
     * Show the localisation dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countries = Country::all();
        $currencies = Currency::all();
        $languages = Language::all();

        return view('localisation::dashboard', compact('countries', 'currencies', 'languages'));
    }
}
