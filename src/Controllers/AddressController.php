<?php

namespace PWWEB\Localisation\Controllers;

use App\Http\Controllers\Controller;
use Flash;
use Illuminate\Http\Request;
use PWWEB\Localisation\Repositories\Address\TypeRepository;
use PWWEB\Localisation\Repositories\AddressRepository;
use PWWEB\Localisation\Repositories\CountryRepository;
use PWWEB\Localisation\Requests\CreateAddressRequest;
use PWWEB\Localisation\Requests\UpdateAddressRequest;

/**
 * PWWEB\Localisation\Controllers\AddressController AddressController.
 *
 * The CRUD controller for Address
 * Class AddressController
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class AddressController extends Controller
{
    /**
     * Repository of addresses to be used throughout the controller.
     *
     * @var \PWWEB\Localisation\Repositories\AddressRepository
     */
    private $addressRepository;

    /**
     * Repository of addresses to be used throughout the controller.
     *
     * @var \PWWEB\Localisation\Repositories\CountryRepository
     */
    private $countryRepository;

    /**
     * Repository of address types to be used throughout the controller.
     *
     * @var \PWWEB\Localisation\Repositories\Address\TypeRepository
     */
    private $typeRepository;

    /**
     * Constructor for the Address controller.
     *
     * @param AddressRepository $addressRepo Repository of Addresses.
     * @param CountryRepository $countryRepo Repository of Countries.
     * @param TypeRepository    $typeRepo    Repository of Address types.
     */
    public function __construct(AddressRepository $addressRepo, CountryRepository $countryRepo, TypeRepository $typeRepo)
    {
        $this->addressRepository = $addressRepo;
        $this->countryRepository = $countryRepo;
        $this->typeRepository = $typeRepo;
    }

    /**
     * Display a listing of the Address.
     *
     * @param Request $request Request containing the information for filtering.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $addresses = $this->addressRepository->all();

        return view('localisation::addresses.index')
            ->with('addresses', $addresses);
    }

    /**
     * Show the form for creating a new Address.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $types = $this->typeRepository->all();

        return view('localisation::addresses.create')
            ->with('types', $types);
    }

    /**
     * Store a newly created Address in storage.
     *
     * @param CreateAddressRequest $request Request containing the information to be stored.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAddressRequest $request)
    {
        $input = $request->all();

        $address = $this->addressRepository->create($input);

        Flash::success('Address saved successfully.');

        return redirect(route('localisation.addresses.index'));
    }

    /**
     * Display the specified Address.
     *
     * @param int $id ID of the Address to be displayed. Used for retrieving currently held data.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $address = $this->addressRepository->find($id);

        if (true === empty($address)) {
            Flash::error('Address not found');

            return redirect(route('localisation.addresses.index'));
        }

        return view('localisation::addresses.show')->with('address', $address);
    }

    /**
     * Show the form for editing the specified Address.
     *
     * @param int $id ID of the Address to be edited. Used for retrieving currently held data.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $address = $this->addressRepository->find($id);
        $countries = $this->countryRepository->all();
        $types = $this->typeRepository->all();

        if (true === empty($address)) {
            Flash::error('Address not found');

            return redirect(route('localisation.addresses.index'));
        }

        return view('localisation::addresses.edit')
            ->with('address', $address)
            ->with('countries', $countries)
            ->with('types', $types);
    }

    /**
     * Update the specified Address in storage.
     *
     * @param int                  $id      ID of the Address to be updated.
     * @param UpdateAddressRequest $request Request containing the information to be updated.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateAddressRequest $request)
    {
        $address = $this->addressRepository->find($id);

        if (true === empty($address)) {
            Flash::error('Address not found');

            return redirect(route('localisation.addresses.index'));
        }

        $address = $this->addressRepository->update($request->all(), $id);

        Flash::success('Address updated successfully.');

        return redirect(route('localisation.addresses.index'));
    }

    /**
     * Remove the specified Address from storage.
     *
     * @param int $id ID of the Address to be destroyed.
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $address = $this->addressRepository->find($id);

        if (true === empty($address)) {
            Flash::error('Address not found');

            return redirect(route('localisation.addresses.index'));
        }

        $this->addressRepository->delete($id);

        Flash::success('Address deleted successfully.');

        return redirect(route('localisation.addresses.index'));
    }
}
