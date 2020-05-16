<?php

namespace PWWEB\Localisation\Controllers\Tax;

use App\Http\Controllers\Controller;
use Flash;
use Illuminate\Http\Request;
use PWWEB\Localisation\Enums\Tax\Type;
use PWWEB\Localisation\Repositories\Tax\RateRepository;
use PWWEB\Localisation\Requests\Tax\CreateRateRequest;
use PWWEB\Localisation\Requests\Tax\UpdateRateRequest;

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
class RateController extends Controller
{
    /**
     * Repository of rates to be used throughout the controller.
     *
     * @var \PWWEB\Localisation\Repositories\Tax\RateRepository
     */
    private $rateRepository;

    /**
     * Constructor for the Rate controller.
     *
     * @param RateRepository $rateRepo Repository of Rates.
     */
    public function __construct(RateRepository $rateRepo)
    {
        $this->rateRepository = $rateRepo;
    }

    /**
     * Display a listing of the Rate.
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $rates = $this->rateRepository->paginate(15);

        return view('localisation::tax.rates.index')
            ->with('rates', $rates);
    }

    /**
     * Show the form for creating a new Rate.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $types = Type::getAll();
        return view('localisation::tax.rates.create', compact('types'));
    }

    /**
     * Store a newly created Rate in storage.
     *
     * @param CreateRateRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function store(CreateRateRequest $request)
    {
        $input = $request->all();

        $rate = $this->rateRepository->create($input);

        Flash::success(__('pwweb::localisation.tax.rates.saved'));

        return redirect(route('localisation.tax.rates.index'));
    }

    /**
     * Display the specified Rate.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $rate = $this->rateRepository->find($id);
        $rate->type = Type::make($rate->type);

        if (empty($rate)) {
            Flash::error(__('pwweb::localisation.tax.rates.not_found'));

            return redirect(route('localisation.tax.rates.index'));
        }

        return view('localisation::tax.rates.show')->with('rate', $rate);
    }

    /**
     * Show the form for editing the specified Rate.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $rate = $this->rateRepository->find($id);
        $types = Type::getAll();

        if (empty($rate)) {
            Flash::error(__('pwweb::localisation.tax.rates.not_found'));

            return redirect(route('localisation.tax.rates.index'));
        }

        return view('localisation::tax.rates.edit', compact('rate', 'types'));
    }

    /**
     * Update the specified Rate in storage.
     *
     * @param int $id
     * @param UpdateRateRequest $request
     *
     * @return \Illuminate\View\View
     */
    public function update($id, UpdateRateRequest $request)
    {
        $rate = $this->rateRepository->find($id);

        if (empty($rate)) {
            Flash::error(__('pwweb::localisation.tax.rates.not_found'));

            return redirect(route('localisation.tax.rates.index'));
        }

        $rate = $this->rateRepository->update($request->all(), $id);

        Flash::success(__('pwweb::localisation.tax.rates.updated'));

        return redirect(route('localisation.tax.rates.index'));
    }

    /**
     * Remove the specified Rate from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $rate = $this->rateRepository->find($id);

        if (empty($rate)) {
            Flash::error(__('pwweb::localisation.tax.rates.not_found'));

            return redirect(route('localisation.tax.rates.index'));
        }

        $this->rateRepository->delete($id);

        Flash::success(__('pwweb::localisation.tax.rates.deleted'));

        return redirect(route('localisation.tax.rates.index'));
    }
}
