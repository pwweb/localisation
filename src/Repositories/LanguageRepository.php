<?php

namespace PWWEB\Localisation\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use PWWEB\Localisation\Contracts\LanguageContract;
use PWWEB\Localisation\LocalisationRegistrar;
use PWWEB\Localisation\Models\Language;

/**
 * PWWEB\Localisation\Repositories\LanguageRepository LanguageRepository.
 *
 * The repository for Language.
 * Class LanguageRepository
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class LanguageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'locale',
        'abbreviation',
        'installed',
        'active',
        'standard'
    ];

    /**
     * Return searchable fields.
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model.
     **/
    public function model()
    {
        return Language::class;
    }

    /**
     * Retrieve all active languages.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllActive()
    {
        return Language::where('active', 1)->get();
    }

    /**
     * Find a language by its name.
     *
     * @param string $name language name to be used to retrieve the language
     *
     * @throws \PWWEB\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return \PWWEB\Localisation\Contracts\Language
     */
    public static function findByName(string $name): LanguageContract
    {
        $language = static::getLanguages(['name' => $name])->first();

        if (null === $language) {
            throw LanguageDoesNotExist::create($name);
        }

        return $language;
    }

    /**
     * Find a language by its id.
     *
     * @param int $id ID to be used to retrieve the language
     *
     * @throws \PWWEB\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return \PWWEB\Localisation\Contracts\Language
     */
    public static function findById(int $id): LanguageContract
    {
        $language = static::getLanguages(['id' => $id])->first();

        if (null === $language) {
            throw LanguageDoesNotExist::withId($id);
        }

        return $language;
    }

    /**
     * Find a language by its locale, e.g. en-gb.
     *
     * @param string $locale locale to be used to retrieve the language
     *
     * @throws \PWWEB\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return \PWWEB\Localisation\Contracts\Language
     */
    public static function findByLocale(string $locale): LanguageContract
    {
        $language = static::getLanguages(['locale' => $locale])->first();

        if (null === $language) {
            throw LanguageDoesNotExist::create($locale);
        }

        return $language;
    }

    /**
     * Get the current cached languages.
     *
     * @param array $params additional parameters for the database query
     *
     * @return \Illuminate\Database\Eloquent\Collection collection of languages
     */
    protected static function getLanguages(array $params = []): Collection
    {
        return app(LocalisationRegistrar::class)
            ->setLanguageClass(static::class)
            ->getLanguages($params);
    }

    /**
     * Obtain the available locales.
     *
     * @param array $params Set of additional params for querying.
     *
     * @return array
     */
    protected static function getLocales(array $params = []): array
    {
        $locales = [];
        $languages = self::getLanguages($params);

        foreach ($languages as $language) {
            $locales[] = $language->locale;
        }

        return $locales;
    }
}
