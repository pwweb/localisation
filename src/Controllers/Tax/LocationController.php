<?php

namespace PWWEB\Localisation\Controllers\Tax;

use App\Http\Controllers\Controller;
use Flash;
use Illuminate\Http\Request;
use PWWEB\Localisation\Repositories\CountryRepository;
use PWWEB\Localisation\Repositories\Tax\LocationRepository;
use PWWEB\Localisation\Repositories\Tax\RateRepository;
use PWWEB\Localisation\Requests\Tax\CreateLocationRequest;
use PWWEB\Localisation\Requests\Tax\UpdateLocationRequest;
use Response;

/**
 * PWWEB\Localisation\Controllers\Tax\RateController RateController.
 *
 * The CRUD controller for Rate
 * Class RateController
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class LocationController extends Controller
{
    /**
     * Repository of locations to be used throughout the controller.
     *
     * @var \PWWEB\Localisation\Repositories\Tax\LocationRepository
     */
    private $locationRepository;

    /**
     * Repository of rates to be used throughout the controller.
     *
     * @var \PWWEB\Localisation\Repositories\Tax\RateRepository
     */
    private $rateRepository;

    /**
     * Repository of addresses to be used throughout the controller.
     *
     * @var \PWWEB\Localisation\Repositories\CountryRepository
     */
    private $countryRepository;

    /**
     * Constructor for the Location controller.
     *
     * @param LocationRepository $locationRepo Repository of Locations.
     */
    public function __construct(LocationRepository $locationRepo, CountryRepository $countryRepo, RateRepository $rateRepo)
    {
        $this->locationRepository = $locationRepo;
        $this->rateRepository = $rateRepo;
        $this->countryRepository = $countryRepo;
    }

    /**
     * Display a listing of the Location.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $locations = $this->locationRepository->paginate(15);

        return view('localisation::tax.locations.index')
            ->with('locations', $locations);
    }

    /**
     * Show the form for creating a new Location.
     *
     * @return Response
     */
    public function create()
    {
        $countries = $this->countryRepository->all();
        $rates = $this->rateRepository->all();
        return view('localisation::tax.locations.create', compact('countries', 'rates'));
    }

    /**
     * Store a newly created Location in storage.
     *
     * @param CreateLocationRequest $request
     *
     * @return Response
     */
    public function store(CreateLocationRequest $request)
    {
        $input = $request->all();

        $location = $this->locationRepository->create($input);

        Flash::success(__('pwweb::localisation.tax.locations.saved'));

        return redirect(route('localisation.tax.locations.index'));
    }

    /**
     * Display the specified Location.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $location = $this->locationRepository->find($id);

        if (empty($location)) {
            Flash::error(__('pwweb::localisation.tax.locations.not_found'));

            return redirect(route('localisation.tax.locations.index'));
        }

        return view('localisation::tax.locations.show')->with('location', $location);
    }

    /**
     * Show the form for editing the specified Location.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $location = $this->locationRepository->find($id);
        $countries = $this->countryRepository->all();
        $rates = $this->rateRepository->all();

        if (empty($location)) {
            Flash::error(__('pwweb::localisation.tax.locations.not_found'));

            return redirect(route('localisation.tax.locations.index'));
        }

        return view('localisation::tax.locations.edit', compact('location', 'countries', 'rates'));
    }

    /**
     * Update the specified Location in storage.
     *
     * @param int $id
     * @param UpdateLocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLocationRequest $request)
    {
        $location = $this->locationRepository->find($id);

        if (empty($location)) {
            Flash::error(__('pwweb::localisation.tax.locations.not_found'));

            return redirect(route('localisation.tax.locations.index'));
        }

        $location = $this->locationRepository->update($request->all(), $id);

        Flash::success(__('pwweb::localisation.tax.locations.updated'));

        return redirect(route('localisation.tax.locations.index'));
    }

    /**
     * Remove the specified Location from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $location = $this->locationRepository->find($id);

        if (empty($location)) {
            Flash::error(__('pwweb::localisation.tax.locations.not_found'));

            return redirect(route('localisation.tax.locations.index'));
        }

        $this->locationRepository->delete($id);

        Flash::success(__('pwweb::localisation.tax.locations.deleted'));

        return redirect(route('localisation.tax.locations.index'));
    }
}
