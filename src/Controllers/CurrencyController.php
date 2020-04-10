<?php

namespace PWWEB\Localisation\Controllers;

use App\Http\Controllers\Controller;
use Flash;
use Illuminate\Http\Request;
use PWWEB\Localisation\Repositories\CurrencyRepository;
use PWWEB\Localisation\Requests\CreateCurrencyRequest;
use PWWEB\Localisation\Requests\UpdateCurrencyRequest;

/**
 * PWWEB\Localisation\Controllers\CurrencyController CurrencyController.
 *
 * The CRUD controller for Currency
 * Class CurrencyController
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
*/
class CurrencyController extends Controller
{
    /** @var  CurrencyRepository */
    private $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepo)
    {
        $this->currencyRepository = $currencyRepo;
    }

    /**
     * Display a listing of the Currency.
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $currencies = $this->currencyRepository->all();

        return view('localisation::currencies.index')
            ->with('currencies', $currencies);
    }

    /**
     * Show the form for creating a new Currency.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('localisation::currencies.create');
    }

    /**
     * Store a newly created Currency in storage.
     *
     * @param CreateCurrencyRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCurrencyRequest $request)
    {
        $input = $request->all();

        $currency = $this->currencyRepository->create($input);

        Flash::success('Currency saved successfully.');

        return redirect(route('localisation.currencies.index'));
    }

    /**
     * Display the specified Currency.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $currency = $this->currencyRepository->find($id);

        if (empty($currency)) {
            Flash::error('Currency not found');

            return redirect(route('localisation.currencies.index'));
        }

        return view('localisation::currencies.show')->with('currency', $currency);
    }

    /**
     * Show the form for editing the specified Currency.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $currency = $this->currencyRepository->find($id);

        if (empty($currency)) {
            Flash::error('Currency not found');

            return redirect(route('localisation.currencies.index'));
        }

        return view('localisation::currencies.edit')->with('currency', $currency);
    }

    /**
     * Update the specified Currency in storage.
     *
     * @param int $id
     * @param UpdateCurrencyRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateCurrencyRequest $request)
    {
        $currency = $this->currencyRepository->find($id);

        if (empty($currency)) {
            Flash::error('Currency not found');

            return redirect(route('localisation.currencies.index'));
        }

        $currency = $this->currencyRepository->update($request->all(), $id);

        Flash::success('Currency updated successfully.');

        return redirect(route('localisation.currencies.index'));
    }

    /**
     * Remove the specified Currency from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $currency = $this->currencyRepository->find($id);

        if (empty($currency)) {
            Flash::error('Currency not found');

            return redirect(route('localisation.currencies.index'));
        }

        $this->currencyRepository->delete($id);

        Flash::success('Currency deleted successfully.');

        return redirect(route('localisation.currencies.index'));
    }
}
