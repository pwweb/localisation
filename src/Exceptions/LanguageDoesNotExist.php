<?php

/**
 * PWWeb\Localisation\Exceptions.
 *
 * Language does not exist exception.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation\Exceptions;

use InvalidArgumentException;

class LanguageDoesNotExist extends InvalidArgumentException
{
    /**
     * Creates an exception with an error message based on the language name or locale.
     *
     * @param string $languageName the language name or locale
     *
     * @return static
     */
    public static function create(string $languageName)
    {
        return new static("There is no language named `{$languageName}`.");
    }

    /**
     * Creates an exception with an error message based on the language ID.
     *
     * @param int $languageId the language ID which does not exist in the database
     *
     * @return static
     */
    public static function withId(int $languageId)
    {
        return new static("There is no [language] with id `{$languageId}`.");
    }
}
