<?php

/**
 * PWWeb\Localisation\Models\Language Model
 *
 * Standard Language Model.
 *
 * @package   PWWeb\Localisation
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use PWWeb\Localisation\LocalisationRegistrar;
use PWWeb\Localisation\Contracts\Language as LanguageContract;
use PWWeb\Localisation\Exceptions\LanguageDoesNotExist;

class Language extends Model implements LanguageContract
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('localisation.table_names.languages'));
    }

    /**
     * A language can be applied to countries.
     */
    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(
            config('localisation.models.countries'),
            config('localisation.table_names.country_has_language'),
            'language_id',
            'country_id'
        );
    }

    /**
     * Find a language by its name.
     *
     * @param string $name
     *
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return \PWWeb\Localisation\Contracts\Language
     */
    public static function findByName(string $name): LanguageContract
    {
        $language = static::getLanguages(['name' => $name])->first();

        if ($language === null) {
            throw LanguageDoesNotExist::create($name);
        }

        return $language;
    }

    /**
     * Find a language by its id.
     *
     * @param int $id
     *
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return \PWWeb\Localisation\Contracts\Language
     */
    public static function findById(int $id): LanguageContract
    {
        $language = static::getLanguages(['id' => $id])->first();

        if ($language === null) {
            throw LanguageDoesNotExist::withId($id);
        }

        return $language;
    }

    /**
     * Find a language by its locale, e.g. en-gb.
     *
     * @param int $id
     *
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return \PWWeb\Localisation\Contracts\Language
     */
    public static function findByLocale(string $locale): LanguageContract
    {
        $locale = strtolower($locale);

        $language = static::getLanguages(['locale' => $locale])->first();

        if ($language === null) {
            throw LanguageDoesNotExist::create($locale);
        }

        return $language;
    }

    /**
     * Find or create language by its name.
     *
     * @param string $name
     *
     * @return \PWWeb\Localisation\Contracts\Language
     */
    public static function findOrCreate(string $name): LanguageContract
    {
        $language = static::getLanguages(['name' => $name])->first();

        if ($language === null) {
            return static::query()->create(['name' => $name]);
        }

        return $language;
    }

    /**
     * Get the current cached languages.
     */
    protected static function getLanguages(array $params = []): Collection
    {
        return app(LocalisationRegistrar::class)
            ->setLanguageClass(static::class)
            ->getLanguages($params);
    }
}
