<?php

namespace PWWEB\Localisation\Controllers;

use App\Http\Controllers\AppBaseController;
use Flash;
use Illuminate\Http\Request;
use PWWEB\Localisation\Repositories\Address\TypeRepository;
use PWWEB\Localisation\Repositories\AddressRepository;
use PWWEB\Localisation\Requests\CreateAddressRequest;
use PWWEB\Localisation\Requests\UpdateAddressRequest;
use Response;

/**
 * PWWEB\Localisation\Controllers\AddressController AddressController.
 *
 * The CRUD controller for Address
 * Class AddressController
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class AddressController extends AppBaseController
{
    /**
     * [private description].
     *
     * @var [type]
     */
    private $addressRepository;

    public function __construct(AddressRepository $addressRepo, TypeRepository $typeRepo)
    {
        $this->addressRepository = $addressRepo;
        $this->typeRepository = $typeRepo;
    }

    /**
     * Display a listing of the Address.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $addresses = $this->addressRepository->all();

        return view('localisation::address.index')
            ->with('addresses', $addresses);
    }

    /**
     * Show the form for creating a new Address.
     *
     * @return Response
     */
    public function create()
    {
        $types = $this->typeRepository->all();

        return view('localisation::address.create')
            ->with('types', $types);
    }

    /**
     * Store a newly created Address in storage.
     *
     * @param CreateAddressRequest $request
     *
     * @return Response
     */
    public function store(CreateAddressRequest $request)
    {
        $input = $request->all();

        $address = $this->addressRepository->create($input);

        Flash::success('Address saved successfully.');

        return redirect(route('localisation.address.index'));
    }

    /**
     * Display the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('localisation.address.index'));
        }

        return view('localisation::address.show')->with('address', $address);
    }

    /**
     * Show the form for editing the specified Address.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $address = $this->addressRepository->find($id);
        $types = $this->typeRepository->all();


        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('localisation.address.index'));
        }

        return view('localisation::address.edit')
            ->with('address', $address)
            ->with('types', $types);
    }

    /**
     * Update the specified Address in storage.
     *
     * @param int                  $id
     * @param UpdateAddressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAddressRequest $request)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('localisation.address.index'));
        }

        $address = $this->addressRepository->update($request->all(), $id);

        Flash::success('Address updated successfully.');

        return redirect(route('localisation.address.index'));
    }

    /**
     * Remove the specified Address from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $address = $this->addressRepository->find($id);

        if (empty($address)) {
            Flash::error('Address not found');

            return redirect(route('localisation.address.index'));
        }

        $this->addressRepository->delete($id);

        Flash::success('Address deleted successfully.');

        return redirect(route('localisation.address.index'));
    }
}
