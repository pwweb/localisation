<?php

namespace PWWEB\Localisation\Controllers\Address;

use App\Http\Controllers\AppBaseController;
use Flash;
use Illuminate\Http\Request;
use PWWEB\Localisation\Repositories\Address\TypeRepository;
use PWWEB\Localisation\Requests\Address\CreateTypeRequest;
use PWWEB\Localisation\Requests\Address\UpdateTypeRequest;
use Response;

/**
 * App\Http\Controllers\Pwweb\Localisation\Models\Address\TypeController TypeController.
 *
 * The CRUD controller for Type
 * Class TypeController
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
*/
class TypeController extends AppBaseController
{
    /** @var  TypeRepository */
    private $typeRepository;

    public function __construct(TypeRepository $typeRepo)
    {
        $this->typeRepository = $typeRepo;
    }

    /**
     * Display a listing of the Type.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $types = $this->typeRepository->all();

        return view('localisation::address.type.index')
            ->with('types', $types);
    }

    /**
     * Show the form for creating a new Type.
     *
     * @return Response
     */
    public function create()
    {
        return view('localisation::address.type.create');
    }

    /**
     * Store a newly created Type in storage.
     *
     * @param CreateTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeRequest $request)
    {
        $input = $request->all();

        $type = $this->typeRepository->create($input);

        Flash::success('Type saved successfully.');

        return redirect(route('localisation.address.type.index'));
    }

    /**
     * Display the specified Type.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $type = $this->typeRepository->find($id);

        if (empty($type)) {
            Flash::error('Type not found');

            return redirect(route('localisation.address.type.index'));
        }

        return view('localisation::address.type.show')->with('type', $type);
    }

    /**
     * Show the form for editing the specified Type.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $type = $this->typeRepository->find($id);

        if (empty($type)) {
            Flash::error('Type not found');

            return redirect(route('localisation.address.type.index'));
        }

        return view('localisation::address.type.edit')->with('type', $type);
    }

    /**
     * Update the specified Type in storage.
     *
     * @param int $id
     * @param UpdateTypeRequest $request
     *
     * @return Response
     */
    public function update(UpdateTypeRequest $request, $id)
    {
        $type = $this->typeRepository->find($id);

        if (empty($type)) {
            Flash::error('Type not found');

            return redirect(route('localisation.address.type.index'));
        }

        $type = $this->typeRepository->update($request->all(), $id);

        Flash::success('Type updated successfully.');

        return redirect(route('localisation.address.type.index'));
    }

    /**
     * Remove the specified Type from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $type = $this->typeRepository->find($id);

        if (empty($type)) {
            Flash::error('Type not found');

            return redirect(route('localisation.address.type.index'));
        }

        $this->typeRepository->delete($id);

        Flash::success('Type deleted successfully.');

        return redirect(route('localisation.address.type.index'));
    }
}
