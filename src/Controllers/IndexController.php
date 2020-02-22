<?php
namespace PWWeb\Localisation\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use PWWeb\Localisation\Models\Country;
use PWWeb\Localisation\Models\Currency;
use PWWeb\Localisation\Models\Language;

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
