<?php

/**
 * PWWEB\Localisation\Models\Language Model.
 *
 * Standard Language Model.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PWWEB\Localisation\Contracts\Language as LanguageContract;
use PWWEB\Localisation\Exceptions\LanguageDoesNotExist;
use PWWEB\Localisation\LocalisationRegistrar;

class Language extends Model implements LanguageContract
{
    /**
     * Constructor.
     *
     * @param array $attributes additional attributes for model initialisation
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('pwweb.localisation.table_names.languages'));
    }

    /**
     * A language can be applied to countries.
     *
     * @return BelongsToMany countries the language belongs to
     */
    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(
            config('pwweb.localisation.models.countries'),
            config('pwweb.localisation.table_names.country_has_language'),
            'language_id',
            'country_id'
        );
    }

    /**
     * Find a language by its name.
     *
     * @param string $name language name to be used to retrieve the language
     *
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
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
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
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
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
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
     * @return Collection collection of languages
     */
    protected static function getLanguages(array $params = []): Collection
    {
        return app(LocalisationRegistrar::class)
            ->setLanguageClass(static::class)
            ->getLanguages($params);
    }

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
