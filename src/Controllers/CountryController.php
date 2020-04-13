<?php

namespace PWWEB\Localisation\Controllers;

use App\Http\Controllers\Controller;
use Flash;
use Illuminate\Http\Request;
use PWWEB\Localisation\Repositories\CountryRepository;
use PWWEB\Localisation\Requests\CreateCountryRequest;
use PWWEB\Localisation\Requests\UpdateCountryRequest;

/**
 * PWWEB\Localisation\Controllers\CountryController CountryController.
 *
 * The CRUD controller for Country
 * Class CountryController
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class CountryController extends Controller
{
    /**
     * Repository of Countries to be used throughout the controller.
     *
     * @var CountryRepository
     */
    private $countryRepository;

    /**
     * Constructor for the Country controller.
     *
     * @param CountryRepository $countryRepo Repository of Countries.
     */
    public function __construct(CountryRepository $countryRepo)
    {
        $this->countryRepository = $countryRepo;
    }

    /**
     * Display a listing of Countries.
     *
     * @param Request $request Request containing the information for filtering.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $countries = $this->countryRepository->all();

        return view('localisation::countries.index')
            ->with('countries', $countries);
    }

    /**
     * Show the form for creating a new Country.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('localisation::countries.create');
    }

    /**
     * Store a newly created Country in storage.
     *
     * @param CreateCountryRequest $request Request containing the information to be stored.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCountryRequest $request)
    {
        $input = $request->all();

        $country = $this->countryRepository->create($input);

        Flash::success('Country saved successfully.');

        return redirect(route('localisation.countries.index'));
    }

    /**
     * Display the specified Country.
     *
     * @param int $id ID of the Country to be displayed. Used for retrieving currently held data.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $country = $this->countryRepository->find($id);

        if (true === empty($country)) {
            Flash::error('Country not found');

            return redirect(route('localisation.countries.index'));
        }

        return view('localisation::countries.show')->with('country', $country);
    }

    /**
     * Show the form for editing the specified Country.
     *
     * @param int $id ID of the Country to be edited. Used for retrieving currently held data.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $country = $this->countryRepository->find($id);

        if (true === empty($country)) {
            Flash::error('Country not found');

            return redirect(route('localisation.countries.index'));
        }

        return view('localisation::countries.edit')->with('country', $country);
    }

    /**
     * Update the specified Country in storage.
     *
     * @param int                  $id      ID of the Country to be updated.
     * @param UpdateCountryRequest $request Request containing the information to be updated.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateCountryRequest $request)
    {
        $country = $this->countryRepository->find($id);

        if (true === empty($country)) {
            Flash::error('Country not found');

            return redirect(route('localisation.countries.index'));
        }

        $country = $this->countryRepository->update($request->all(), $id);

        Flash::success('Country updated successfully.');

        return redirect(route('localisation.countries.index'));
    }

    /**
     * Remove the specified Country from storage.
     *
     * @param int $id ID of the Country to be destroyed.
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $country = $this->countryRepository->find($id);

        if (true === empty($country)) {
            Flash::error('Country not found');

            return redirect(route('localisation.countries.index'));
        }

        $this->countryRepository->delete($id);

        Flash::success('Country deleted successfully.');

        return redirect(route('localisation.countries.index'));
    }
}
