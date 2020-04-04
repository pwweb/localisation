<?php

namespace PWWEB\Localisation\Controllers;

use App\Http\Controllers\Controller;
use PWWEB\Localisation\Models\Address\Type;
use PWWEB\Localisation\Models\Country;

class AddressController extends Controller
{
    /**
     * Show the localisation dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    }

    public function create()
    {
        $types = Type::all();
        $countries = Country::all();

        return view('localisation::address.add', compact('types', 'countries'));
    }

    public function store()
    {
    }
}
