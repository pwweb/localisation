<?php

namespace PWWEB\Localisation\Controllers;

use App\Http\Controllers\AppBaseController;
use Flash;
use Illuminate\Http\Request;
use PWWEB\Localisation\Repositories\LanguageRepository;
use PWWEB\Localisation\Requests\CreateLanguageRequest;
use PWWEB\Localisation\Requests\UpdateLanguageRequest;
use Response;

/**
 * App\Http\Controllers\Pwweb\Localisation\Models\LanguageController LanguageController.
 *
 * The CRUD controller for Language
 * Class LanguageController
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
*/
class LanguageController extends AppBaseController
{
    /**
     * Repository of languages to be used throughout the controller.
     *
     * @var \PWWEB\Localisation\Repositories\LanguageRepository
     */
    private $languageRepository;

    /**
     * Constructor for the language controller.
     *
     * @param \PWWEB\Localisation\Repositories\LanguageRepository $languageRepo Repository of languages
     */
    public function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepository = $languageRepo;
    }

    /**
     * Display a listing of the Language.
     *
     * @param Request $request
     *
     * @return Response
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
     * @return Response
     */
    public function create()
    {
        return view('localisation::languages.create');
    }

    /**
     * Store a newly created Language in storage.
     *
     * @param CreateLanguageRequest $request
     *
     * @return Response
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
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            Flash::error('Language not found');

            return redirect(route('localisation.languages.index'));
        }

        return view('localisation::languages.show')
            ->with('language', $language);
    }

    /**
     * Show the form for editing the specified Language.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            Flash::error('Language not found');

            return redirect(route('localisation.languages.index'));
        }

        return view('localisation::languages.edit')->with('language', $language);
    }

    /**
     * Update the specified Language in storage.
     *
     * @param int $id
     * @param UpdateLanguageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLanguageRequest $request)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
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
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $language = $this->languageRepository->find($id);

        if (empty($language)) {
            Flash::error('Language not found');

            return redirect(route('localisation.languages.index'));
        }

        $this->languageRepository->delete($id);

        Flash::success('Language deleted successfully.');

        return redirect(route('localisation.languages.index'));
    }
}
