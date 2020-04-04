<?php

/**
 * PWWEB\Localisation\Contracts.
 *
 * Localisation Contract for Language Model.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface Language
{
    /**
     * A language can be applied to countries.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function countries(): BelongsToMany;

    /**
     * Find a Language by its name.
     *
     * @param string $name language name to be used to retrieve the language
     *
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return Language
     */
    public static function findByName(string $name): self;

    /**
     * Find a Language by its id.
     *
     * @param int $id ID to be used to retrieve the language
     *
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return Language
     */
    public static function findById(int $id): self;

    /**
     * Find a Language by its locale, e.g. en-gb.
     *
     * @param int $locale locale to be used to retrieve the language
     *
     * @throws \PWWeb\Localisation\Exceptions\LanguageDoesNotExist
     *
     * @return Language
     */
    public static function findByLocale(string $locale): self;
}
