<?php

namespace PWWEB\Localisation\Repositories;

use PWWEB\Core\Repositories\BaseRepository;
use PWWEB\Localisation\Contracts\Language as LanguageContract;
use PWWEB\Localisation\Exceptions\LanguageDoesNotExist;
use PWWEB\Localisation\Models\Language;

/**
 * PWWEB\Localisation\Repositories\LanguageRepository LanguageRepository.
 *
 * The repository for Language.
 * Class LanguageRepository
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class LanguageRepository extends BaseRepository
{
    /**
     * Fields that can be searched by.
     *
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'locale',
        'abbreviation',
        'installed',
        'active',
        'standard',
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
     *
     * @return string
     **/
    public function model()
    {
        return config('pwweb.localisation.models.language');
    }

    //
    // /**
    //  * Get the current cached languages.
    //  *
    //  * @param array $params additional parameters for the database query
    //  *
    //  * @return \Illuminate\Database\Eloquent\Collection collection of languages
    //  */
    // protected static function get(array $params = []): Collection
    // {
    //     returrn parent::get($params);
    //     // Cached: return app(LocalisationRegistrar::class)->setLanguageClass(static::class)->getLanguages($params);
    // }
    //

    /**
     * Retrieve all active languages.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllActive()
    {
        return $this->model->where('active', 1)->get();
    }

    /**
     * Retrieve active language based on locale.
     *
     * @param string $locale The locale to check.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function isLocaleActive(string $locale)
    {
        return $this->model->where('active', 1)->where('locale', $locale)->first();
    }

    /**
     * Retrieve active language based on lang.
     *
     * @param string $lang The language to check.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function isLangActive(string $lang)
    {
        return $this->model->where('active', 1)->where('abbreviation', $lang)->first();
    }

    //
    // /**
    //  * Find a language by its name.
    //  *
    //  * @param string $name language name to be used to retrieve the language
    //  *
    //  * @throws \PWWEB\Localisation\Exceptions\LanguageDoesNotExist
    //  *
    //  * @return \PWWEB\Localisation\Contracts\Language
    //  */
    // public static function findByName(string $name): LanguageContract
    // {
    //     $language = static::getLanguages(['name' => $name])->first();
    //
    //     if (null === $language) {
    //         throw LanguageDoesNotExist::create($name);
    //     }
    //
    //     return $language;
    // }
    //
    // /**
    //  * Find a language by its id.
    //  *
    //  * @param int $id ID to be used to retrieve the language
    //  *
    //  * @throws \PWWEB\Localisation\Exceptions\LanguageDoesNotExist
    //  *
    //  * @return \PWWEB\Localisation\Contracts\Language
    //  */
    // public static function findById(int $id): LanguageContract
    // {
    //     $language = static::getLanguages(['id' => $id])->first();
    //
    //     if (null === $language) {
    //         throw LanguageDoesNotExist::withId($id);
    //     }
    //
    //     return $language;
    // }
    //

    /**
     * Find a language by its locale, e.g. en-gb.
     *
     * @param string $locale locale to be used to retrieve the language
     *
     * @throws \PWWEB\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findByLocale(string $locale)
    {
        $language = $this->model->where(['locale' => $locale])->first();

        if (null === $language) {
            throw LanguageDoesNotExist::create($locale);
        }

        return $language;
    }

    //
    // /**
    //  * Obtain the available locales.
    //  *
    //  * @param array $params Set of additional params for querying.
    //  *
    //  * @return array
    //  */
    // protected static function getLocales(array $params = []): array
    // {
    //     $locales = [];
    //     $languages = self::getLanguages($params);
    //
    //     foreach ($languages as $language) {
    //         $locales[] = $language->locale;
    //     }
    //
    //     return $locales;
    // }
}
