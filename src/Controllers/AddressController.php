<?php

namespace PWWEB\Localisation\Controllers;

use App\Http\Controllers\Controller;
use PWWEB\Localisation\Models\Address\Type;
use PWWEB\Localisation\Models\Country;

class AddressController extends Controller
{
    /**
     * Show a list of addresses.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    }

    /**
     * Show the address form for creation.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $types = Type::all();
        $countries = Country::all();

        return view('localisation::address.add', compact('types', 'countries'));
    }

    /**
     * Store an address.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store()
    {
    }
}
