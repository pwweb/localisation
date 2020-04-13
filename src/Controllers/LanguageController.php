<?php

namespace PWWEB\Localisation\Controllers;

use App\Http\Controllers\Controller;
use Flash;
use Illuminate\Http\Request;
use PWWeb\Localisation\Middleware\Locale;
use PWWEB\Localisation\Repositories\LanguageRepository;
use PWWEB\Localisation\Requests\CreateLanguageRequest;
use PWWEB\Localisation\Requests\UpdateLanguageRequest;

/**
 * PWWEB\Localisation\Controllers\LanguageController LanguageController.
 *
 * The CRUD controller for Language
 * Class LanguageController
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class LanguageController extends Controller
{
    /**
     * Repository of Languages to be used throughout the controller.
     *
     * @var \PWWEB\Localisation\Repositories\LanguageRepository
     */
    private $languageRepository;

    /**
     * Constructor for the Language controller.
     *
     * @param \PWWEB\Localisation\Repositories\LanguageRepository $languageRepo Repository of Languages
     */
    public function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepository = $languageRepo;
    }

    /**
     * Display a listing of the Language.
     *
     * @param Request $request Request containing the information for filtering.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $languages = $this->languageRepository->all();

        return view('localisation::languages.index')
            ->with('languages', $languages);
    }

    /**
     * Show the form for creating a new Language.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('localisation::languages.create');
    }

    /**
     * Store a newly created Language in storage.
     *
     * @param CreateLanguageRequest $request Request containing the information to be stored.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateLanguageRequest $request)
    {
        $input = $request->all();

        $language = $this->languageRepository->create($input);

        Flash::success('Language saved successfully.');

        return redirect(route('localisation.languages.index'));
    }

    /**
     * Display the specified Language.
     *
     * @param int $id ID of the Language to be displayed. Used for retrieving currently held data.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $language = $this->languageRepository->find($id);

        if (true === empty($language)) {
            Flash::error('Language not found');

            return redirect(route('localisation.languages.index'));
        }

        return view('localisation::languages.show')
            ->with('language', $language);
    }

    /**
     * Show the form for editing the specified Language.
     *
     * @param int $id ID of the Language to be edited. Used for retrieving currently held data.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $language = $this->languageRepository->find($id);

        if (true === empty($language)) {
            Flash::error('Language not found');

            return redirect(route('localisation.languages.index'));
        }

        return view('localisation::languages.edit')->with('language', $language);
    }

    /**
     * Update the specified Language in storage.
     *
     * @param int                   $id      ID of the Language to be updated.
     * @param UpdateLanguageRequest $request Request containing the information to be updated.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UpdateLanguageRequest $request)
    {
        $language = $this->languageRepository->find($id);

        if (true === empty($language)) {
            Flash::error('Language not found');

            return redirect(route('localisation.languages.index'));
        }

        $language = $this->languageRepository->update($request->all(), $id);

        Flash::success('Language updated successfully.');

        return redirect(route('localisation.languages.index'));
    }

    /**
     * Remove the specified Language from storage.
     *
     * @param int $id ID of the Language to be destroyed.
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $language = $this->languageRepository->find($id);

        if (true === empty($language)) {
            Flash::error('Language not found');

            return redirect(route('localisation.languages.index'));
        }

        $this->languageRepository->delete($id);

        Flash::success('Language deleted successfully.');

        return redirect(route('localisation.languages.index'));
    }

    /**
     * Switch the locale.
     *
     * @param string $locale Locale to change to.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLocale($locale)
    {
        $locales = (array) $this->languageRepository->getAllActive();

        // If a locale does not match any of the ones allowed, go back without doing anything.
        if (false === in_array($locale, $locales)) {
            return redirect()->back();
        }

        // Set the right sessions.
        session([Locale::SESSION_KEY => $locale]);
        app()->setLocale($locale);
        // \LangCountry::setAllSessions($lang_country);

        // If a user is logged in and it has a lang_country property, set the new lang_country.
        /*
         * Todo Set language to user options
         * if (Auth::user() && array_key_exists('lang_country', Auth::user()->getAttributes())) {
         *
            try {
                \Auth::user()->lang_country = $lang_country;
                \Auth::user()->save();
            } catch (\Exception $e) {
                \Log::error(get_class($this).' at '.__LINE__.': '.$e->getMessage());
            }
        }*/

        return redirect()->back();
    }
}
